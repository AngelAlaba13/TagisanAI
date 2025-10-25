<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark font-poppins transition-colors duration-300">

    <header class="fixed top-0 left-0 w-full z-50">
        <div class="w-full h-16 flex justify-center items-center px-4 bg-gradient-to-r from-[#FE8203] via-[rgb(252,170,19)] to-[#F8A50B] transition-colors duration-300">
            <img src="{{ Vite::asset('resources/images/logo-all-white.png') }}" alt="TagisanAI Logo" class="h-12">

            <!-- light-dark toggle -->
            <div class="absolute right-8">
                <label class="swap swap-rotate cursor-pointer">
                    <input id="theme-toggle" type="checkbox" />

                    <svg class="swap-on w-7 h-7 text-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.05 17.95l-1.414 1.414M18.364 18.364l-1.414-1.414M6.05 6.05L4.636 7.464M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                    <svg class="swap-off w-7 h-7 text-light" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/>
                    </svg>
                </label>
            </div>
        </div>
    </header>

    <script>
        const toggle = document.getElementById('theme-toggle');

        if(localStorage.getItem('theme') === 'dark'){
            document.documentElement.classList.add('dark');
            toggle.checked = true;
        }

        toggle.addEventListener('change', () => {
            if(toggle.checked){
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme','dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme','light');
            }
        });
    </script>

</body>
</html>
