<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Create Tryout Event | TagisanAI</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">

    <!-- Header -->
    @include('layout.header')

    <div class="min-h-screen pl-28 pt-36 pr-28 flex justify-center">
        <div class="bg-white dark:bg-zinc-800 shadow-md shadow-black/25 rounded-xl p-10 w-full max-w-4xl">
            <h2 class="text-2xl md:text-4xl font-semibold text-center text-dark dark:text-light mb-16">Create a Tryout Event</h2>

            <form action="{{ route('tryouts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Tryout Name -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Tryout Name</label>
                    <input type="text" name="tryout_name" placeholder="Enter tryout name"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light" required>
                </div>

                <!-- Coach Name -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Coach Name</label>
                    <input type="text" name="coach_name" placeholder="Enter coach name"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                </div>

                <!-- Tryout Description -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Description</label>
                    <textarea name="tryout_description" placeholder="Describe the tryout..." rows="4"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light resize-none"></textarea>
                </div>

                <!-- Tryout Requirements -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Requirements</label>
                    <textarea name="tryout_requirements" placeholder="Enter requirements..." rows="4"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light resize-none"></textarea>
                </div>

                <!-- Tryout Schedule -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Schedule</label>
                    <input type="datetime-local" name="tryout_schedule"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                </div>

                <!-- Tryout Link -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Link</label>
                    <input type="url" name="tryout_link" placeholder="Enter related link"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                </div>

                <!-- Event Image -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Event Image</label>
                    <input type="file" name="image_path" accept="image/*"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                </div>

                <!-- Buttons -->
                <div class="flex justify-center gap-2 mt-10">
                    <a href="{{ route('tryouts.index') }}" class="px-10 py-2 border-2 border-black text-gray-800 hover:bg-black hover:text-white transition rounded-full">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-[#FFB922] text-white hover:bg-[#e9a717] transition rounded-full">Create Tryout</button>
                </div>
            </form>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
