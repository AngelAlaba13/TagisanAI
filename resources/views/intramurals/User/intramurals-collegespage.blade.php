<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagisan | Colleges</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">

    @include('layout.intramurals.intra-header')

    <div class="min-h-screen px-6 md:px-28 pt-32 pb-20">
        <main class="max-w-6xl mx-auto">
            
            {{-- Title Section --}}
            <div class="text-center mb-10">
                <h1 class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-600">COLLEGES</h1>
                <p class="text-gray-700 dark:text-gray-200 mt-2 text-lg">Explore our diverse academic colleges and their achievements</p>
            </div>

            {{-- Stats Section --}}
            <div class="bg-gradient-to-r from-[#007A7E] to-[#00B3B8] rounded-3xl shadow-xl py-10 mb-12 text-white">
                <div class="grid grid-cols-1 md:grid-cols-3 text-center gap-8 px-10">
                    <div>
                        <div class="text-5xl font-extrabold mb-1">{{ $colleges->count() }}</div>
                        <p class="text-lg opacity-90">Academic Colleges</p>
                    </div>
                    <div>
                        <div class="text-5xl font-extrabold mb-1">12,500+</div>
                        <p class="text-lg opacity-90">Active Students</p>
                    </div>
                    <div>
                        <div class="text-5xl font-extrabold mb-1">6,024</div>
                        <p class="text-lg opacity-90">Total Goals</p>
                    </div>
                </div>
            </div>

            {{-- College Cards --}}
            <div class="flex flex-col gap-5">
                @foreach ($colleges as $college)
                    <div 
                        class="relative bg-gradient-to-r 
                            @switch($college->college_code)
                                @case('CITE') from-[#a855f7] to-[#9333ea] @break
                                @case('CBM') from-[#facc15] to-[#f59e0b] @break
                                @case('CET') from-[#ef4444] to-[#dc2626] @break
                                @case('CTE') from-[#3b82f6] to-[#2563eb] @break
                                @case('CAS') from-[#22c55e] to-[#16a34a] @break
                                @default from-gray-300 to-gray-400
                            @endswitch
                        text-white rounded-xl shadow-lg overflow-hidden flex items-center justify-between p-6">
                        
                        {{-- Left content --}}
                        <div class="flex flex-col">
                            <h3 class="text-2xl font-extrabold mb-1">{{ $college->college_name }}</h3>
                            <p class="text-sm opacity-90 font-medium mb-2">Governor: {{ $college->col_governor }}</p>
                            <p class="text-sm max-w-3xl opacity-90">{{ $college->col_description }}</p>
                        </div>

                        {{-- Logo --}}
                        @if($college->college_logo)
                            <div class="absolute right-6 opacity-15 w-32 h-32">
                                <img src="{{ asset('college_logos/' . $college->college_logo) }}" alt="{{ $college->college_name }}" class="object-contain w-full h-full">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </main>
    </div>

    @include('layout.intramurals.intra-footer')

</body>
</html>
