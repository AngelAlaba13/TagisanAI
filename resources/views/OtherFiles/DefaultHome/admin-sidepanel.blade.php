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
        <label for="side-drawer" class="btn bg-transparent shadow-none fixed top-3 left-3 text-white ">
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
         
            <!-- Logo -->
            <div class="flex justify-center items-center h-32 md:h-40">
                <img src="{{ asset('logos/logo-all-white.png') }}" alt="TagisanAI Logo" class=" h-12 md:h-20">
            </div>

            <!-- Navigation -->
            <ul class=" font-poppins font-medium text-md md:text-xl space-y-2 px-2 md:px-4">
                <li>
                    <a href="{{route('OtherFiles.DefaultHome.create-tryouts')}}" class="hover:bg-[#ffc30e] hover:text-dark rounded-lg py-3 md:px-4 transition-all duration-300">
                        Create Tryouts
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

</body>
</html>