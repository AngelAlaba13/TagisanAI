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

  <div class="min-h-screen pl-28 pt-12 pr-28">
    <!-- Page Header -->
    <div>
      <p class="text-4xl font-semibold text-dark dark:text-light">Department Points</p>
      <p class="text-lg text-dark/60 dark:text-light/60 py-2">
        Add and update points for colleges based on department events or performance.
      </p>
    </div>

    <!-- Ranking Section -->
    <div class="pt-20">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-medium text-dark dark:text-light">Ranking</h1>
        <button class="btn bg-[#E78E00] hover:bg-[#FFA13C] text-white border-none shadow-md px-6">
          Set Overall Ranking
        </button>
      </div>

      <!-- Table Container -->
      <div class="card bg-[#ffeed8] dark:bg-zinc-700 shadow-md">
        <div class="overflow-x-auto">
          <table class="table w-full border border-gray-400/70 dark:border-gray-600 border-collapse">

            <!-- Table Head -->
            <thead>
              <tr class="text-dark dark:text-light text-lg font-semibold">
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Rank</th>
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Department</th>
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Current Points</th>
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Set Golds</th>
              </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-dark dark:text-light text-base">
              <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition">
                <td class="px-6 py-4 font-bold border border-gray-400/70 dark:border-gray-600">1</td>
                <td class="px-6 py-4 border border-gray-400/70 dark:border-gray-600">
                  <span class="font-bold">CITE</span> College of Information Technology Education
                </td>
                <td class="text-center px-6 py-4 border border-gray-400/70 dark:border-gray-600">46</td>
                <td class="text-center px-6 py-4 border border-gray-400/70 dark:border-gray-600">
                  <button class="btn btn-sm text-xs bg-blue-600 hover:bg-blue-700 text-white border-none px-2">Update</button>
                </td>
              </tr>

              <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition">
                <td class="px-6 py-4 font-bold border border-gray-400/70 dark:border-gray-600">1</td>
                <td class="px-6 py-4 border border-gray-400/70 dark:border-gray-600">
                  <span class="font-bold">CITE</span> College of Information Technology Education
                </td>
                <td class="text-center px-6 py-4 border border-gray-400/70 dark:border-gray-600">46</td>
                <td class="text-center px-6 py-4 border border-gray-400/70 dark:border-gray-600">
                  <button class="btn btn-sm text-xs bg-blue-600 hover:bg-blue-700 text-white border-none px-2">Update</button>
                </td>
              </tr>

             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('layout.footer')
</body>
</html>
