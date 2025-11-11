<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class LocalOCRController extends Controller
{
    private $geminiApiKey;
    private $http;

    public function __construct()
    {
        $this->geminiApiKey = env('GEMINI_API_OCR');
        $this->http = new Client();
    }

    public function index()
    {
        return view('/localMasts/Manage Events/add-localM-events'); // your upload + output page
    }

    public function visionExtract(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);

        $file = $request->file('file');
        $mimeType = $file->getMimeType();
        $contents = base64_encode(file_get_contents($file->getRealPath()));

        try {
            $response = $this->http->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$this->geminiApiKey}",
                [
                    'json' => [
                        'contents' => [
                            [
                                'parts' => [
                                    [
                                        'inline_data' => [
                                            'mime_type' => $mimeType,
                                            'data' => $contents,
                                        ]
                                    ],
                                    [
                                        'text' => "Extract all event names, categories and event descriptions from this document or image.
                                                   Return only valid JSON in the format:
                                                   { \"events\": [ { \"event_name\": \"...\", \"category\": \"...\", \"description\": \"...\" }, ... ] }"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            );

            $data = json_decode($response->getBody(), true);
            $answer = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

            // Clean markdown fences if any
            $answer = trim($answer);
            $answer = preg_replace('/^```(?:json)?|```$/m', '', $answer);
            $answer = trim($answer);

            $parsed = json_decode($answer, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($parsed['events'])) {
                return response()->json([
                    'events' => $parsed['events'],
                    'raw' => $answer,
                ]);
            } else {
                return response()->json([
                    'raw' => $answer,
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Gemini Vision error: " . $e->getMessage());
            return response()->json([
                'error' => 'Vision extraction failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
