<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagisan | Ask IsAI</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-poppins">

    {{-- Header --}}
    @include('layout.intramurals.intra-header')

    {{-- Chat Section --}}
    <main class="flex flex-col justify-center items-center min-h-[80vh] px-6 md:px-10 pt-28">
        <div class="w-full max-w-2xl text-center mb-8">
            <h1 class="text-2xl md:text-3xl font-bold mb-6">What question do you have in mind today?</h1>

            {{-- Input Box --}}
            <form method="POST" action="#" class="relative">
                @csrf
                <input type="text" name="question" 
                       placeholder="Who is the governor of the CITE department?" 
                       class="input input-bordered w-full rounded-full py-3 px-5 pr-14 text-gray-800 shadow-md focus:outline-none focus:ring-2 focus:ring-amber-400 border-none" />
                <button type="submit" 
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-amber-400 hover:bg-amber-500 text-white rounded-full p-3 shadow-md transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-5.197-3.028A1 1 0 008 9.028v5.944a1 1 0 001.555.832l5.197-3.028a1 1 0 000-1.664z" />
                    </svg>
                </button>
            </form>

            <p class="mt-3 text-sm text-gray-500">IsAI can make mistakes. Always double check.</p>
        </div>
    </main>

    @include('layout.intramurals.intra-footer')

</body>
</html>
