<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Add Event | TagisanAI</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
    @include('localMasts.localMasts-sidepanel')

    <div class="min-h-screen pl-28 pt-12 pr-28 flex justify-center">
        <div class="bg-white dark:bg-zinc-800 shadow-md shadow-black/25 rounded-xl p-10 w-full max-w-4xl">
            <h2 class="text-2xl md:text-4xl font-semibold text-center text-dark dark:text-light mb-16">Add New Event</h2>

            <!-- To intraEvent Controller 'store' -->
            <form action="{{ route('localM-events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex gap-10">
                    <!-- Event Name -->
                    <div class=" flex-[40%] mb-6">
                        <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Event Name</label>
                        <input type="text" name="event_name" placeholder="Badminton" 
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                    </div>

                    <!-- Event Icon -->
                    <div class="flex-[30%] mb-6">
                        <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Event Icon</label>
                       
                        <div class="flex flex-row gap-3 justify-start items-center">
                            <div class=" flex items-center justify-center">
                                <div class="flex-[40%] rounded-full bg-[hsl(31,49%,49%)] p-3">
                                    <img id="iconPreview" src="{{ asset('icons/arnis.png') }}" 
                                    alt="Icon Preview" class=" w-7 h-7 object-contain">
                                </div>
                                
                            </div>

                            <select name="icon" id="iconSelect" class="flex-[60%] select select-bordered w-full px-2 text-sm p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light h-full">
                                <option value="">--Select Icon--</option>
                                @foreach($icons as $icon)
                                    <option value="{{ $icon }}">{{ pathinfo($icon, PATHINFO_FILENAME) }}</option>
                                @endforeach
                            </select>
                        </div>   
                    </div>

                    <script>
                        const ICONS_PATH = "{{ asset('icons') }}/";
                        <?php
                            if (isset($icons) && is_object($icons) && method_exists($icons, 'map')) {
                                $__icons_for_js = $icons->map(fn($i) => basename($i))->values()->all();
                            } else {
                                $__icons_for_js = [];
                            }
                        ?>
                        window.ICONS = @json($__icons_for_js);
                    </script>
                    <template id="icon-options-template">
                        <option value="">--Select Icon--</option>
                        @foreach($__icons_for_js as $filename)
                            <option value="{{ $filename }}">{{ pathinfo($filename, PATHINFO_FILENAME) }}</option>
                        @endforeach
                    </template>
                    @vite('resources/js/intramurals/manage-events/add-events.js')
                </div>

                <!-- Category -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Category</label>
                    <input type="text" name="category" placeholder="Sports" 
                           class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Description</label>
                    <textarea name="description" placeholder="Type a short description here..." rows="4"
                           class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light resize-none"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-[#00b300] transition">Save Event</button>
                    <a href="{{ route('localM-events.index') }}" class="px-6 py-2 bg-gray-200 text-gray-800 hover:bg-gray-300 rounded-lg transition">Cancel</a>
                </div>
            </form>

            <div class="flex items-center my-6">
                    <hr class="flex-grow border-gray-300 dark:border-gray-600">
                    <span class="mx-3 text-dark/50 dark:text-light/50">or</span>
                    <hr class="flex-grow border-gray-300 dark:border-gray-600">
                </div>

                <!-- This is the OCR Section. To be enhanced... -->
                <!-- OCR Section -->
                 <form id="ocrForm" enctype="multipart/form-data" class="space-y-4" data-action="{{ route('localMasts.ocr.extract') }}">
                    <div class="mb-6">
                        <label class="block text-gray-800 dark:text-gray-200 font-semibold mb-2">
                            Extract Text from Image or File
                        </label>

                        <!-- Upload Container -->
                        <div 
                            id="ocrDropZone"
                            class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center cursor-pointer hover:bg-gray-50 dark:hover:bg-zinc-700 transition relative">
                            <!-- Upload Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v12m0 0l-4-4m4 4l4-4" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                            </svg>

                            <!-- Instructions -->
                            <p class="text-gray-500 dark:text-gray-300 font-medium">Drag and drop your file here</p>
                            <p class="my-2 text-gray-400">or</p>

                            <input type="file" name="file" id="ocrFileInput" class="hidden" accept="image/*,.pdf" />
                            <label for="ocrFileInput" class="inline-block px-6 py-2 border border-orange-500 text-orange-500 rounded-lg cursor-pointer hover:bg-orange-50 dark:hover:bg-orange-700 transition">
                            Browse Files
                            </label>

                            <p class="text-gray-400 text-xs mt-2">Supported formats: JPG, PNG, PDF</p>

                            <!-- Preview Container -->
                            <div id="ocrPreview" class="mt-4 flex flex-wrap justify-center items-center overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-zinc-800 p-2">
                                <p class="text-gray-400 text-sm">No file selected</p>
                            </div>

                            <button 
                                type="submit" 
                                id="extractButton"
                                class="px-6 py-2 bg-[#ffc86237] text-black rounded-full hover:bg-[#ffc062be] transition mt-10 w-2/3 border-2 border-black/10">
                                Extract Now
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Loader -->
                <div id="loading" class="text-center hidden">
                <span class="loading loading-spinner loading-lg text-primary"></span>
                <p class="text-gray-600 mt-2">Processing your file...</p>
                </div>

                <!-- Extracted Output -->
                <div id="result" class="hidden space-y-4">
                    <h3 class="text-2xl font-semibold text-green-600">Extracted Events</h3>
                    <div id="eventsContainer" class="space-y-3"></div>
                    <div class="flex gap-2 justify-end">
                        <button id="saveExtractedBtn" class="px-6 py-2 bg-green-600 text-white rounded-lg  hover:bg-[#00b300]  transition">Save All Events</button>
                        <button id="clearExtractedBtn" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Clear</button>
                    </div>
                </div>

                <div id="ocrSuccess"
                    class="hidden fixed top-6 right-6 bg-green-500 text-white px-5 py-3 rounded-lg shadow-lg z-50 transform translate-x-10 opacity-0 transition-all duration-300">
                </div>

                <div id="ocrWarning"
                    class="hidden fixed top-6 right-6 bg-red-500 text-white px-5 py-3 rounded-lg shadow-lg z-50 transform translate-x-10 opacity-0 transition-all duration-300">
                </div>
        </div>
    </div>

    @include('layout.footer')
    @vite('resources/js/localMasts/drag-drop-file.js')
</body>
</html>
