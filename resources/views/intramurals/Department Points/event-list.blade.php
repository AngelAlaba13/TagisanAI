<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List | TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
    @include('intramurals.intramurals-sidepanel')

    <div class="min-h-screen pl-10 pr-10 md:pl-28 pt-12 md:pr-28">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-dark dark:text-light">Event List</h1>
                <p class="text-sm md:text-lg text-dark/60 dark:text-light/60 mt-2">
                    Select an event to update gold points for each college.
                </p>
            </div>
            <div>
                <a href="{{ route('intramurals.Department Points.department-points') }}"
                   class="btn bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded shadow-md">
                   Back to Department Points
                </a>
            </div>
        </div>

        <!-- Event Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
            <a href="{{ route('intramurals.Department Points.edit-gold', $event->id) }}"
               class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6 transition hover:scale-105 hover:shadow-xl border border-gray-200 dark:border-zinc-700 flex flex-col justify-between">
                
                <div>
                    <h2 class="text-xl font-semibold text-dark dark:text-light mb-2">{{ $event->event_name }}</h2>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Event ID: {{ $event->id }}</p>
                </div>

                <div class="mt-4 flex justify-end">
                    <span class="inline-block bg-yellow-200 dark:bg-yellow-500 text-yellow-800 dark:text-yellow-900 px-3 py-1 rounded-full text-xs font-medium">
                        Update Golds
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
