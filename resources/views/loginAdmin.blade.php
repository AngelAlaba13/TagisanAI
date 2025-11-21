<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | TagisanAI</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full flex flex-col font-poppins">

  <!-- Header -->
  @include('layout.header')

  <!-- Login Container -->
  <div class="flex flex-col justify-center items-center flex-grow px-6 sm:px-10 lg:px-28 py-12 pt-36">

    <!-- Login Card -->
    <div class="bg-white dark:bg-zinc-800 shadow-lg shadow-black/25 rounded-2xl p-8 sm:p-10 w-full max-w-md text-center transition-all duration-300">

      <!-- Logo -->
      <div class="flex justify-center mb-8">
        <img src="{{ asset('campus_logo/NEMSU_logo.png') }}" alt="NEMSU Logo" class="w-24 h-24 object-contain">
      </div>

      <!-- Login Form -->
      <form method="POST" action="{{ route('loginAdmin.store') }}" class="space-y-6">
        @csrf

        <!-- Username -->
        <div class="text-left">
          <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Username</label>
          <input id="email" type="email" name="email" placeholder="example@nemsu.edu.ph"
            class="w-full px-4 py-2 border-2 border-black/30 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFB922] dark:bg-zinc-700 text-dark dark:text-white dark:border-gray-600 bg-white"
            required autofocus>
        </div>

        <!-- Password -->
        <div class="text-left">
          <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Password</label>
          <input id="password" type="password" name="password" placeholder="********"
            class="w-full px-4 py-2 border-2 border-black/30 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFB922] dark:bg-zinc-700 text-dark dark:text-white dark:border-gray-600 bg-white"
            required>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center space-x-4">
          <a href="{{ route('loginAdmin.index') }}" 
             class="w-1/2 py-2 bg-gray-200 dark:bg-zinc-600 text-gray-800 dark:text-white font-medium rounded-md hover:bg-gray-300 dark:hover:bg-zinc-500 transition">
             Cancel
          </a>
          <button type="submit" 
             class="w-1/2 py-2 bg-[#FFB922] text-white font-medium rounded-md hover:bg-[#e9a717] transition">
             Login
          </button>
        </div>
      </form>
    </div>

  </div>

  <!-- Footer -->
  @include('layout.footer')

</body>
</html>
