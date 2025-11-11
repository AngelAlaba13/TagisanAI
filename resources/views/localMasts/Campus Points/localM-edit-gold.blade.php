<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gold Points | TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
    @include('localMasts.localMasts-sidepanel')

    <div class="min-h-screen pl-10 pr-10 md:pl-28 pt-12 md:pr-28">

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-dark dark:text-light">
                    Set Gold Points
                </h1>
                <p class="text-sm md:text-lg text-dark/60 dark:text-light/60 mt-2">
                    Updating gold points for event: <span class="font-semibold">{{ $localEvent->event_name }}</span>
                </p>
            </div>
            <div>
                <a href="{{ route('localMasts.Campus Points.localM-event-list') }}"
                   class="btn bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded shadow-md">
                   Back to Event List
                </a>
            </div>
        </div>

        <!-- Gold Points Form -->
        <form action="{{ route('localMasts.Campus Points.update-gold', $localEvent->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($campuses as $campus)
                <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md p-6 transition hover:scale-105 hover:shadow-xl border border-gray-200 dark:border-zinc-700 flex flex-col justify-between">
                    
                    <div>
                        <h2 class="text-lg font-semibold text-dark dark:text-light mb-2">
                            {{ $campus->campus_code }}
                        <h3 class="text-md font-medium opacity-60 text-dark dark:text-light mb-2">
                            {{ $campus->campus_name }}
                        </h3>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-dark/70 dark:text-light/70 mb-1">Gold Points</label>
                        <input type="number"
                            name="gold[{{ $campus->id }}]"
                            value="{{ $existingGolds[$campus->id] ?? 0 }}"
                            min="0"
                            class="w-full text-center border rounded px-3 py-2 text-black bg-gray-50 dark:bg-zinc-700 dark:text-light focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            onfocus="this.select()"
                            onblur="if(this.value==='') this.value=0">
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" 
                        class="btn bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded shadow-md"
                        onclick="window.location.reload()">
                    Clear
                </button>

                <button type="submit" 
                        class="btn bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow-md">
                    Save Gold Points
                </button>
            </div>
        </form>
    </div>

    @include('layout.footer')
</body>
</html>
