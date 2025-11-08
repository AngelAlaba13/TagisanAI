<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Events | Tagisan</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bglight dark:bg-bgdark font-poppins">

    @include('layout.intramurals.intra-header')

    <main class="pt-32 px-6 md:px-20">
        <div class="max-w-6xl mx-auto">

            {{-- Title --}}
            <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-8">
                Discover <span class="text-[#00A7AC]">Events</span>
            </h1>

            {{-- Search and Filters --}}
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                <form method="GET" action="{{ route('intramurals.Events.user-events') }}">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search Events"
                        class="input input-bordered w-64 rounded-full" />
                </form>

                <button class="btn rounded-full bg-[#00A7AC] text-white border-none">All Events</button>
                <button class="btn rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-[#00A7AC] hover:text-white">By Category</button>
                <button class="btn rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-[#00A7AC] hover:text-white">Team</button>
                <button class="btn rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-[#00A7AC] hover:text-white">Solo</button>
                <button class="btn rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-[#00A7AC] hover:text-white">Sort</button>
            </div>

            {{-- Events Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
                @forelse ($events as $event)
                    <div class="flex items-center gap-4 bg-white rounded-xl shadow hover:shadow-lg transition p-5">
                        {{-- Icon --}}
                        <div class="bg-gradient-to-br from-cyan-500 to-[#00A7AC] p-4 rounded-full text-white">
                            @if($event->icon)
                                <img src="{{ asset('icons/' . $event->icon) }}" alt="{{ $event->event_name }}" class="w-8 h-8">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6l4 2"/>
                                </svg>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-[#007A7E]">{{ $event->event_name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $event->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-2">No events found.</p>
                @endforelse
            </div>

        </div>
    </main>

    @include('layout.intramurals.intra-footer')
</body>
</html>
