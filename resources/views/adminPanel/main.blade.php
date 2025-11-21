<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">

    <!-- Header -->
    @include('layout.header')

    <!-- sidepanel -->
    @include('OtherFiles.DefaultHome.admin-sidepanel')

    <!-- Title -->
    <div class="pt-32 md:pt-40 pb-8 md:pb-12 flex justify-center items-center text-center px-4">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-dark dark:text-light leading-snug">
            What event would you like to organize?
        </h1>
    </div>

    <!-- Event Cards -->
    <div class="flex flex-col sm:flex-row flex-wrap justify-center items-center gap-8 sm:gap-10 md:gap-20 px-4 sm:px-10 md:px-20 pb-20">

        <!-- Intrams -->
        <form method="POST" action="{{ route('admin.set-active-event') }}" class="w-full sm:w-auto">
            @csrf
            <input type="hidden" name="event" value="intramurals">
            <button type="submit"
                class="flex justify-center items-center w-full sm:w-[280px] md:w-[320px] h-[180px] sm:h-[220px] md:h-[300px]
                    bg-[linear-gradient(to_bottom_right,_#F0B14F,_#FF8502,_#FE6004)]
                    rounded-2xl md:rounded-[40px]
                    shadow-[4px_4px_15px_rgba(0,0,0,0.4)]
                    cursor-pointer
                    transition-all duration-300 hover:scale-105">
                <p class="text-center text-white text-xl sm:text-2xl md:text-4xl font-bold px-4">
                    University Intramurals
                </p>
            </button>
        </form>

        <!-- Local Masts -->
        <form method="POST" action="{{ route('admin.set-active-event') }}" class="w-full sm:w-auto">
            @csrf
            <input type="hidden" name="event" value="masts">
            <button type="submit"
                class="flex justify-center items-center w-full sm:w-[280px] md:w-[320px] h-[180px] sm:h-[220px] md:h-[300px]
                    bg-[linear-gradient(to_bottom_right,_#F0B14F,_#FF8502,_#FE6004)]
                    rounded-2xl md:rounded-[40px]
                    shadow-[4px_4px_15px_rgba(0,0,0,0.4)]
                    cursor-pointer
                    transition-all duration-300 hover:scale-105">
                <p class="text-center text-white text-xl sm:text-2xl md:text-4xl font-bold px-4">
                    Local MASTS
                </p>
            </button>
        </form>
    </div>

    <!-- Footer -->
    @include('layout.footer')

</body>
</html>
