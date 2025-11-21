<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TagisanAI</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark font-poppins transition-colors duration-300">

  <footer class="pt-64">
    <div class="w-full flex flex-col justify-center items-center bg-[linear-gradient(to_bottom_right,_#005C61,_#219197,_#0B7B81)] py-12 md:py-20 px-6 md:px-20 lg:px-36">

      <!-- Logo + Links -->
      <div class="w-full flex flex-col md:flex-row justify-between items-center md:items-start gap-10 md:gap-0">
        <!-- Logo -->
        <img src="{{ asset('logos/logo-all-white.png') }}" alt="TagisanAI Logo" class="h-16 md:h-20">


        <div class="flex flex-row gap-20 px-12">
            <!-- Navigation Links -->
        <div class="text-white w-full md:w-auto flex flex-col items-center md:items-start">
          <p class="text-xl md:text-2xl font-semibold pb-4 md:pb-6 text-center md:text-left">Navigation</p>
          <div class="flex flex-col sm:flex-row sm:gap-12 text-sm md:text-base text-center md:text-left">
            <div class="flex flex-col gap-2">
              <p>Home</p>
              <p>Colleges</p>
              <p>Events</p>
            </div>
          </div>
        </div>


        <!-- Useful Links -->
        <div class="text-white w-full md:w-auto flex flex-col items-center md:items-start">
          <p class="text-xl md:text-2xl font-semibold pb-4 md:pb-6 text-center md:text-left">Useful Links</p>
          <div class="flex flex-col sm:flex-row sm:gap-12 text-sm md:text-base text-center md:text-left">
            <div class="flex flex-col gap-2">
              <p>About Us</p>
              <p>Privacy Policy</p>
              <p>Terms & Conditions</p>
            </div>
            <div class="flex flex-col gap-2 mt-4 sm:mt-0">
              <p>Chat with IsAI</p>
              <p>View Archives</p>
              <a href="{{ route('conductEvent.create') }}" class="hover:underline">
                Conduct an Event
              </a>
            </div>
          </div>
        </div>
        </div>
      </div>

      <!-- Divider -->
      <div class="w-full h-[2px] bg-white/30 my-10"></div>

      <!-- Copyright -->
      <div>
        <p class="text-white text-center text-sm md:text-lg">&copy; All rights reserved.</p>
      </div>
    </div>
  </footer>

</body>
</html>
