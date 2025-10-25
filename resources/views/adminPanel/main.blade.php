<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden">

    <!-- Header -->
    @include('layout.header')

    <!-- Title -->
    <div class="pt-40 pb-10 flex justify-center items-center text-center px-4">
        <h1 class="font-poppins text-2xl md:text-4xl font-semibold text-dark dark:text-light">
            What event would you like to organize?
        </h1>
    </div>

    <!-- Event Cards -->
    <div class="flex flex-col md:flex-row justify-center items-center gap-10 md:gap-20 px-6 md:px-20 pb-20">

    <!-- Intrams -->
        <form method="POST" action="{{ route('admin.set-active-event') }}">
            @csrf
            <input type="hidden" name="event" value="intramurals">
            <button type="submit" class="flex justify-center items-center w-full max-w-[320px] h-[200px] md:h-[300px] 
                    bg-[linear-gradient(to_bottom_right,_#F0B14F,_#FF8502,_#FE6004)]
                    rounded-[30px] md:rounded-[40px] 
                    shadow-[4px_4px_15px_rgba(0,0,0,0.5)] cursor-pointer 
                    transition-transform duration-300 hover:scale-105">
            <p class="text-center text-white dark:text-light text-2xl md:text-4xl font-bold px-5">
                University Intramurals
            </p>
            </button>
        </form>


        <!-- Local Masts -->
        <form method="POST" action="{{ route('admin.set-active-event') }}">
            @csrf
            <input type="hidden" name="event" value="masts">
            <button type="submit" class="flex justify-center items-center w-full max-w-[320px] h-[200px] md:h-[300px] 
                    bg-[linear-gradient(to_bottom_right,_#F0B14F,_#FF8502,_#FE6004)]
                    rounded-[30px] md:rounded-[40px] 
                    shadow-[4px_4px_15px_rgba(0,0,0,0.5)] cursor-pointer 
                    transition-transform duration-300 hover:scale-105">
            <p class="text-center text-white dark:text-light text-2xl md:text-4xl font-bold px-5">
                Local MASTS
            </p>
            </button>
        </form>


        <!-- Other Events -->
        <form method="POST" action="{{ route('admin.set-active-event') }}">
            @csrf
            <input type="hidden" name="event" value="events">
            <button type="submit" class="flex justify-center items-center w-full max-w-[320px] h-[200px] md:h-[300px] 
                    bg-[linear-gradient(to_bottom_right,_#F0B14F,_#FF8502,_#FE6004)]
                    rounded-[30px] md:rounded-[40px] 
                    shadow-[4px_4px_15px_rgba(0,0,0,0.5)] cursor-pointer 
                    transition-transform duration-300 hover:scale-105">
            <p class="text-center text-white dark:text-light text-2xl md:text-4xl font-bold px-5">
                Other Events
            </p>
        </button>
        </form>
    </div>

    <!-- Description Section -->
    <div class="flex flex-col justify-center items-center px-6 md:px-20 pt-10 pb-20">
        <p class="text-center text-dark/80 dark:text-light/80 text-lg md:text-2xl italic leading-relaxed max-w-3xl">
            Unsure which event type to select? IsAI can help you choose between Intramurals, Local MASTS, or Other Events.
        </p>

        <div class="pt-16 md:pt-32">
            <img src="{{ Vite::asset('resources/images/isai_temp_logo.png') }}" alt="IsAI" class=" w-16 md:w-20">
        </div>
    </div>

    <!-- Footer -->
    @include('layout.footer')

</body>
</html>
