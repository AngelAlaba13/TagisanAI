<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submission Received | TagisanAI</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full flex flex-col font-poppins">

    <!-- Header -->
    @include('layout.header')

  <!-- Container -->
  <div class="flex flex-col justify-center items-center flex-grow px-6 sm:px-10 lg:px-28 py-12 pt-36">
    
    <div class="bg-white dark:bg-zinc-800 shadow-lg shadow-black/25 rounded-2xl p-8 sm:p-10 w-full max-w-xl text-center transition-all duration-300">
      
      <!-- Heading -->
      <h1 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-dark dark:text-light mb-16">
        Thank You for Your Submission!
      </h1>
      
      <!-- Message -->
      <p class="text-gray-700 dark:text-gray-300 text-base sm:text-lg mb-10 leading-relaxed">
        We’ve received your event proposal. Please check your email for confirmation details. 
      </p>

      <p class="text-gray-500 dark:text-gray-300 text-base sm:text-base mb-16 px-8 leading-relaxed">Our admin team will evaluate your request — this may take a while. Once approved, we’ll notify you via your registered email.</p>

      <!-- Button -->
      <a href="{{ route('intramurals.Leaderboard.user-leaderboard')}}" 
         class=" px-10 py-2 bg-[#FFB922] text-white text-base sm:text-lg font-medium rounded-full hover:bg-[#e9a717] transition-transform hover:scale-105">
         Return to Home
      </a>
    </div>

  </div>

  @include('layout.footer')

</body>
</html>
