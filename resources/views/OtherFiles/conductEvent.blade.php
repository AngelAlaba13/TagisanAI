<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Coduct an Event | TagisanAI</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">

    <!-- Header -->
    @include('layout.header')

    <div class="min-h-screen pl-28 pt-36 pr-28 flex justify-center">
        <div class="bg-white dark:bg-zinc-800 shadow-md shadow-black/25 rounded-xl p-10 w-full max-w-4xl">
            <h2 class="text-2xl md:text-4xl font-semibold text-center text-dark dark:text-light mb-16">Be an Admin and Conduct your Event</h2>

            <!-- To intraEvent Controller 'store' -->
            <form action="{{ route('conductEvent.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Full Name -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Full Name</label>
                    <input type="text" name="full_name" placeholder="Enter full name" 
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light" required>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Email</label>
                    <input type="email" name="email" placeholder="Enter email" 
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light" required>
                </div>

                <!-- Contact Number -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Contact Number</label>
                    <input type="text" name="contact_number" placeholder="09*********" 
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light" required>
                </div>

                <!-- What Event -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">What event do you want to conduct?</label>
                    <textarea name="event_description" placeholder="Type a short description about the event..." rows="4"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light resize-none" required></textarea>
                </div>

                <!-- Purpose of Event -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">State the purpose of the event.</label>
                    <textarea name="event_purpose" placeholder="Type a short description about the purpose of the event..." rows="4"
                        class="w-full p-3 rounded-lg border border-gray-400 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light resize-none" required></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-center gap-2 mt-20">
                    <a href="{{ route('conductEvent.create') }}" class=" px-10 py-2 border-2 border-black text-gray-800 hover:bg-black hover:text-white transition rounded-full">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-[#FFB922] text-white hover:bg-[#e9a717] transition rounded-full">Submit Event</button>
                </div>
            </form>         
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
