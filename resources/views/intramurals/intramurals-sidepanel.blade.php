<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="overflow-x-hidden h-screen flex">
    <div class="drawer z-50">
    <!-- Drawer Toggle -->
    <input id="side-drawer" type="checkbox" class="drawer-toggle" />

    <!-- Drawer Content (main content area if needed) -->
    <div class="drawer-content">
        <!-- Hamburger Button (you can also move this to header.blade.php if you prefer) -->
        <label for="side-drawer" class="btn btn-ghost btn-circle fixed top-5 left-5 bg-[#E78E00] text-white shadow-md hover:bg-[#FF9E2B] transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>
    </div>

    <!-- Drawer Sidebar -->
    <div class="drawer-side">
        <label for="side-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="menu p-0 w-52 md:w-80 min-h-full bg-gradient-to-b from-[#E78E00] via-[#FFA13C] to-[#FFBF4A] text-white shadow-2xl">

            <div class="absolute bottom-7 right-40">
                <label class="swap swap-rotate cursor-pointer">
                    <input id="theme-toggle" type="checkbox" />

                    <svg class="swap-on w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.05 17.95l-1.414 1.414M18.364 18.364l-1.414-1.414M6.05 6.05L4.636 7.464M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                    <svg class="swap-off w-7 h-7 text-dark/60" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/>
                    </svg>
                </label>
            </div>
            
            <!-- Logo -->
            <div class="flex justify-center items-center h-32 md:h-40">
                <img src="{{ asset('logos/logo-all-white.png') }}" alt="TagisanAI Logo" class=" h-12 md:h-20">
            </div>

            <!-- Navigation -->
            <ul class=" font-poppins font-medium text-md md:text-xl space-y-2 px-2 md:px-4">
                <li>
                    <a href="{{route('intramurals.Department Points.department-points')}}" class="hover:bg-[#ffc30e] hover:text-dark rounded-lg py-3 md:px-4 transition-all duration-300">
                        Department Points
                    </a>
                </li>
                <li>
                    <a href="{{route('intramurals.Manage Departments.manage-departments')}}" class="hover:bg-[#ffc30e] hover:text-dark rounded-lg py-3 md:px-4 transition-all duration-300">
                        Manage Departments
                    </a>
                </li>
                <li>
                    <a href="{{route('intramurals.Manage Events.manage-events')}}" class="hover:bg-[#ffc30e] hover:text-dark rounded-lg py-3 md:px-4 transition-all duration-300">
                        Manage Events
                    </a>
                </li>
                <li>
                    <a href="{{route('intramurals.Intramurals Customize.intramurals-customize')}}" class="hover:bg-[#ffc30e] hover:text-dark rounded-lg py-3 md:px-4 transition-all duration-300">
                        Customize
                    </a>
                </li>
                <li>
                    <a href="{{route('loginAdmin.index')}}" class="hover:bg-[#ffc30e] hover:text-red-600 rounded-lg py-3 md:px-4 transition-all duration-300">
                        Logout
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>


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