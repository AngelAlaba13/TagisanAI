<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events | TagisanAI</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
    @include('intramurals.intramurals-sidepanel')

    <div class="min-h-screen pl-10 pr-10 md:pl-28 pt-12 md:pr-28">
        <!-- Page Header -->
        <div class="flex flex-col justify-center items-center md:justify-start md:items-start mb-8">
            <p class="text-xl md:text-4xl font-semibold text-dark dark:text-light">Manage Events</p>
            <p class="text-center md:text-start text-sm md:text-lg text-dark/60 dark:text-light/60 mt-2">
                Add and update events based on the handbook and schedule.
            </p>
        </div>

        <!-- Events Section -->
        <div class="pt-10 md:pt-5">
            <!-- Header & Actions -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-5">
                <div class="flex flex-col md:flex-row items-center gap-5 w-full md:w-auto">
                    <h1 class="text-2xl font-medium text-dark dark:text-light">Events</h1>
                    <!-- Search Bar -->
                    <div class="flex justify-center w-full md:w-[400px] lg:w-[600px]">
                        <label class="input input-bordered flex items-center gap-2 w-full bg-white dark:bg-zinc-800 border border-gray-400 dark:border-gray-500 shadow-sm rounded-md px-3 py-2">
                            <input type="text" class="grow text-dark dark:text-white placeholder-gray-500" placeholder="Search Event" />
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 text-dark dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35m1.85-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </label>
                    </div>
                </div>

                <a href="{{ route('intra-events.create') }}"
                   class="btn bg-[#E78E00] hover:bg-[#FFA13C] text-white border-none shadow-md shadow-gray-400/40 px-6 md:px-10 py-2 rounded-md transition duration-200">
                    Add Event
                </a>
            </div>

            <!-- Category Header -->
            <div class="flex justify-between items-center text-sm italic text-dark/70 dark:text-light/70 mb-2">
                <p>Category: <span class="not-italic font-medium">Overall</span></p>
                <select class="select select-bordered select-sm bg-white dark:bg-zinc-800 border border-gray-300 dark:border-gray-600 w-32 px-2 rounded-md">
                    <option disabled selected>Category</option>
                    <option>Overall</option>
                    <option>Athletics</option>
                    <option>Cultural Arts</option>
                    <option>Literary Arts</option>
                    <option>Visual Arts</option>
                </select>
            </div>

            <!-- Table Container -->
            <div class="bg-[#ffeed8] dark:bg-zinc-700 shadow-lg rounded-xl overflow-hidden border border-gray-400/70 dark:border-gray-600">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <!-- Table Head -->
                        <thead>
                        <tr class="text-dark dark:text-light text-lg font-semibold">
                            <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left w-12">#</th>
                            <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Event Name</th>
                            <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Category</th>
                            <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Actions</th>
                        </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody class="text-dark dark:text-light text-base">
                        @foreach($events as $index => $event)
                        <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition duration-200">
                            <td class="px-4 py-3 border-b border-gray-400/70 dark:border-gray-600 text-center font-semibold">
                                {{ $events->firstItem() ? $events->firstItem() + $index : $index + 1 }}
                            </td>

                            <td class="flex items-center gap-2 px-4 py-3 border-b border-gray-400/70 dark:border-gray-600">
                                <div class="bg-[rgba(193,114,10,0.59)] dark:bg-zinc-700 rounded-full p-1">
                                    @if($event->icon)
                                    <img src="{{ asset('icons/' . $event->icon) }}" alt="{{ $event->event_name }}" class="w-6 h-6 object-contain rounded-full">
                                    @endif
                                </div>
                                <span>{{ $event->event_name }}</span>
                            </td>

                            <td class="px-4 py-3 border-b border-gray-400/70 dark:border-gray-600">{{ $event->category }}</td>

                            <td class="px-4 py-3 border-b border-gray-400/70 dark:border-gray-600 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('intra-events.edit', $event->id) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded shadow-sm transition duration-200">
                                       Edit
                                    </a>
                                    <form action="{{ route('intra-events.destroy', $event->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded shadow-sm transition duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $events->links('vendor.pagination.custom-tailwind') }}
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
