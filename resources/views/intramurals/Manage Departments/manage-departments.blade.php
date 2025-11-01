<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Departments | TagisanAI</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
  @include('intramurals.intramurals-sidepanel')

  <div class="min-h-screen pl-10 pr-10 md:pl-28 pt-12 md:pr-28">
    <!-- Page Header -->
    <div class=" flex flex-col justify-center items-center md:justify-start md:items-start">
      <p class="text-xl md:text-4xl font-semibold text-dark dark:text-light">Manage Departments</p>
      <p class="text-center md:text-start text-sm md:text-lg text-dark/60 dark:text-light/60 py-2">
        Manage and view all college departments with their respective governors.
      </p>
    </div>

    <!-- Department Section -->
    <div class="pt-10 md:pt-20">
      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-5">
        <h1 class="text-2xl font-medium text-dark dark:text-light">Departments</h1>
        <button class="btn bg-[#E78E00] hover:bg-[#FFA13C] text-white border-none shadow-md px-6">
          Add Department
        </button>
      </div>

      <!-- Table Container -->
      <div class="card bg-[#ffeed8] dark:bg-zinc-700 shadow-md">
        <div class="overflow-x-auto">
          <table class="table w-full border border-gray-400/70 dark:border-gray-600 border-collapse">

            <!-- Table Head -->
            <thead>
              <tr class="text-dark dark:text-light text-lg font-semibold">
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left w-12">#</th>
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Department Name</th>
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Governor</th>
                <th class="px-6 py-4 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Actions</th>
              </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-dark dark:text-light text-base">
              <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition">
                <td class="px-6 py-3 font-bold border border-gray-400/70 dark:border-gray-600">1</td>
                <td class="px-6 py-3 border border-gray-400/70 dark:border-gray-600">
                  <div class="flex items-center gap-3">
                    <img src="{{ asset('images/cas.png') }}" alt="CAS Logo" class="w-6 h-6 rounded-full">
                    <span><span class="font-bold">CAS</span> College of Arts and Sciences</span>
                  </div>
                </td>
                <td class="px-6 py-3 border border-gray-400/70 dark:border-gray-600">Vangie Bnaday</td>
                <td class="px-6 py-3 border border-gray-400/70 dark:border-gray-600">
                  <div class="flex justify-center items-center">
                    <a href="#" class="text-green-600 hover:underline">Edit</a>
                  <span class="mx-1 text-gray-400">|</span>
                  <a href="#" class="text-red-600 hover:underline">Delete</a>
                  </div>
                </td>
              </tr>

              <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition">
                <td class="px-6 py-3 font-bold border border-gray-400/70 dark:border-gray-600">2</td>
                <td class="px-6 py-3 border border-gray-400/70 dark:border-gray-600">
                  <div class="flex items-center gap-3">
                    <img src="{{ asset('images/cte.png') }}" alt="CTE Logo" class="w-6 h-6 rounded-full">
                    <span><span class="font-bold">CTE</span> College of Teachers Education</span>
                  </div>
                </td>
                <td class="px-6 py-3 border border-gray-400/70 dark:border-gray-600">LC Galela</td>
                <td class="px-6 py-3 border border-gray-400/70 dark:border-gray-600">
                  <div class="flex justify-center items-center">
                    <a href="#" class="text-green-600 hover:underline">Edit</a>
                  <span class="mx-1 text-gray-400">|</span>
                  <a href="#" class="text-red-600 hover:underline">Delete</a>
                  </div>
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
