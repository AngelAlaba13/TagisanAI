<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Points | TagisanAI</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
  @include('intramurals.intramurals-sidepanel')

  <div class="min-h-screen pl-10 pr-10 md:pl-28 pt-12 md:pr-28">

    <!-- Page Header -->
    <div class="flex flex-col justify-center items-center md:justify-start md:items-start mb-8">
      <p class="text-xl md:text-4xl font-semibold text-dark dark:text-light">Department Points</p>
      <p class="text-center md:text-start text-sm md:text-lg text-dark/60 dark:text-light/60 mt-2">
        Add and update points for colleges based on department events or performance.
      </p>
    </div>

    <!-- Ranking Section -->
    <div class="pt-10 md:pt-14">
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-5">
        <h1 class="text-2xl font-medium text-dark dark:text-light">Ranking</h1>
        <!-- Optional Button -->
        <!-- <button class="btn bg-[#E78E00] hover:bg-[#FFA13C] text-white border-none shadow-md px-6 text-sm md:text-base">
          Set Overall Ranking
        </button> -->
      </div>

      <!-- Table Container -->
      <div class="bg-[#ffeed8] dark:bg-zinc-700 shadow-lg rounded-xl overflow-hidden border border-gray-400/70 dark:border-gray-600">
        <div class="overflow-x-auto">
          
          <table class="w-full border-collapse">
            <!-- Table Head -->
            <thead>
              <tr class="text-dark dark:text-light text-lg font-semibold">
                <th class="pl-6 pr-0 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Rank</th>
                <th class=" py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Department</th>
                <th class="px-6 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Current Points</th>
                <th class="px-6 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Set Golds</th>
              </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-dark dark:text-light text-base">
              @foreach($leaderboard as $item)
              <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition duration-200">
                <td class="pl-6 pr-0  font-bold border-b border-gray-400/70 dark:border-gray-600">{{ $item->rank }}</td>
                <td class="py-3 border-b border-gray-400/70 dark:border-gray-600">
                  <span class="font-bold">{{ $item->IntraCollege->college_code }}</span> {{ $item->IntraCollege->college_name }}
                </td>
                <td class="px-6 py-4 text-center border-b border-gray-400/70 dark:border-gray-600">{{ $item->total_gold }}</td>
                <td class="px-6 py-4 text-center border-b border-gray-400/70 dark:border-gray-600">
                  <a href="{{ route('intramurals.Department Points.event-list') }}"
                     class="inline-block bg-green-600 hover:bg-green-700 text-white text-xs md:text-sm px-3 py-1 rounded-full shadow-sm transition duration-200">
                    Update
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  @include('layout.footer')
</body>
</html>
