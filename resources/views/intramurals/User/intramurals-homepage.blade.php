<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laragway Leaderboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">

    @include('layout.intramurals.intra-header')

    <div class="min-h-screen pl-10 pr-10 md:pl-28 pt-32 md:pr-28 ">
        <main class="max-w-6xl mx-auto px-6 py-10">
        {{-- Title --}}
        <div class="text-center mb-10">
            <h1 class="text-6xl text-black font-bold bg-gradient-to-r from-indigo-500 via-amber-400 to-rose-500 text-transparent bg-clip-text">LARAGWAY</h1>
        </div>


        <section class="bg-gradient-to-b from-cyan-400 to-sky-500 rounded-3xl shadow-xl p-8 mb-12">
            <h2 class="text-2xl font-bold text-white text-center mb-1">Leaderboard</h2>
            <p class="text-white/80 text-center mb-8">Top performers this year</p>

            <div class="flex justify-center items-end gap-6 flex-wrap">
                @foreach ($ranked as $item)
                    @php
                        $rank = $item->rank;
                        $college = $item->intraCollege;
                        $total = $item->total_gold;

                        $colors = [
                            1 => 'from-green-300 to-green-500',
                            2 => 'from-yellow-200 to-yellow-400',
                            3 => 'from-blue-300 to-blue-500',
                            4 => 'from-red-300 to-red-500',
                            5 => 'from-fuchsia-300 to-purple-500',
                        ];
                        $heights = [
                            1 => 'h-60',
                            2 => 'h-52',
                            3 => 'h-44',
                            4 => 'h-36',
                            5 => 'h-32',
                        ];
                    @endphp

                    <div class="flex flex-col items-center">
                        {{-- Ribbon --}}
                        <div class="relative bg-gradient-to-b {{ $colors[$rank] }} {{ $heights[$rank] }}
                                    w-32 rounded-t-3xl shadow-lg flex flex-col justify-center items-center border border-white/20">

                            {{-- Medal --}}
                            <div class="absolute -top-5 text-2xl">
                                @if($rank == 1)
                                    🥇
                                @elseif($rank == 2)
                                    🥈
                                @elseif($rank == 3)
                                    🥉
                                @endif
                            </div>

                            {{-- Points --}}
                            <p class="text-3xl font-bold text-white mt-4">{{ $total }}</p>
                            <p class="text-sm text-white/90 font-medium">
                                {{ $rank }}{{ ['st','nd','rd','th','th'][$rank-1] }} Place
                            </p>
                        </div>

                        {{-- College Name --}}
                        <div class="bg-white w-32 py-2 rounded-b-3xl text-center shadow">
                            <h3 class="font-semibold text-gray-800 text-sm leading-tight">
                                {{ $college->college_name }}
                            </h3>
                            <p class="text-xs text-gray-500">{{ $college->college_code }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Colleges Section --}}
        <section class="bg-gradient-to-b from-cyan-400 to-sky-500 rounded-3xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-white text-center mb-6">COLLEGES</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach ($colleges as $college)
                    <div class="card shadow-xl bg-gradient-to-br from-white/90 to-white rounded-2xl hover:scale-105 transition-transform duration-300">
                        <div class="card-body">
                            <h3 class="card-title text-lg font-bold text-gray-700">
                                {{ $college->college_name }}
                            </h3>
                            <p class="text-sm text-gray-600">{{ $college->college_description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Categories Section --}}
        <section class="bg-gradient-to-b from-cyan-400 to-sky-500 rounded-3xl shadow-xl p-8 mt-12">
            <h2 class="text-3xl font-extrabold text-white text-center mb-2">CATEGORIES</h2>
            <p class="text-white/80 text-center mb-10">
                Select categories for sports, socio-cultural, and visual arts events
            </p>

            <div class="flex flex-col gap-6 max-w-3xl mx-auto">
                {{-- Category Card --}}
                <div class="bg-white rounded-xl shadow-md flex justify-between items-center p-5 hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg font-bold text-[#007A7E]">Sports Event</h3>
                        <p class="text-gray-600 text-sm">Writing, poetry, storytelling, and literary performances</p>
                    </div>
                    <button class="btn btn-circle bg-[#00A7AC] hover:bg-[#007A7E] text-white border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-md flex justify-between items-center p-5 hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg font-bold text-[#007A7E]">Literary Arts</h3>
                        <p class="text-gray-600 text-sm">Writing, poetry, storytelling, and literary performances</p>
                    </div>
                    <button class="btn btn-circle bg-[#00A7AC] hover:bg-[#007A7E] text-white border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-md flex justify-between items-center p-5 hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg font-bold text-[#007A7E]">Culture and the Arts</h3>
                        <p class="text-gray-600 text-sm">Cultural celebrations, artistic exhibitions, and performances</p>
                    </div>
                    <button class="btn btn-circle bg-[#00A7AC] hover:bg-[#007A7E] text-white border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-md flex justify-between items-center p-5 hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg font-bold text-[#007A7E]">Special Events</h3>
                        <p class="text-gray-600 text-sm">Unique occasions, ceremonies, and milestone celebrations</p>
                    </div>
                    <button class="btn btn-circle bg-[#00A7AC] hover:bg-[#007A7E] text-white border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>





    </main>
    </div>


    
    @include('layout.intramurals.intra-footer')
</body>
</html>
