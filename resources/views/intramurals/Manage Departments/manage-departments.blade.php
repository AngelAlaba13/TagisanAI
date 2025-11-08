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
    <div class="flex flex-col justify-center items-center md:justify-start md:items-start mb-8">
      <p class="text-xl md:text-4xl font-semibold text-dark dark:text-light">Manage Departments</p>
      <p class="text-center md:text-start text-sm md:text-lg text-dark/60 dark:text-light/60 mt-2">
        Manage and view all college departments with their respective governors.
      </p>
    </div>

    <!-- Departments Section -->
    <div class="pt-10 md:pt-5">
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-5">
        <h1 class="text-2xl font-medium text-dark dark:text-light">Departments</h1>
      </div>

      <!-- Table Container -->
      <div class="bg-[#ffeed8] dark:bg-zinc-700 shadow-lg rounded-xl overflow-hidden border border-gray-400/70 dark:border-gray-600">
        <div class="overflow-x-auto">
          <table class="w-full border-collapse">
            <!-- Table Head -->
            <thead>
              <tr class="text-dark dark:text-light text-lg font-semibold">
                <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center w-12">#</th>
                <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Department</th>
                <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Governor</th>
                <th class="px-4 py-3 border-b bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Actions</th>
              </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-dark dark:text-light text-base">
              @foreach($colleges as $index => $college)
              <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition duration-200">
                <td class="px-4 py-3 border-b border-gray-400/70 dark:border-gray-600 text-center font-semibold">{{ $colleges->firstItem() ? $colleges->firstItem() + $index : $index + 1 }}</td>
                
                <td class="flex items-center gap-3 px-4 py-3 border-b border-gray-400/70 dark:border-gray-600">
                  @if($college->college_logo)
                  <img src="{{ asset('college_logos/' . $college->college_logo) }}" alt="{{ $college->college_name }}" class="w-8 h-8 object-contain rounded-full">
                  @endif
                  <div>
                    <p class="font-bold text-md md:text-lg">{{ $college->college_code }}</p>
                    <p class="text-sm md:text-base">{{ $college->college_name }}</p>
                  </div>
                </td>

                <td class="px-4 py-3 border-b border-gray-400/70 dark:border-gray-600">{{ $college->col_governor }}</td>

                <td class="px-4 py-3 border-b border-gray-400/70 dark:border-gray-600 text-center">
                  <div class="flex justify-center items-center gap-3">
                    <a href="{{ route('intra-colleges.edit', $college->id) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded shadow-sm transition duration-200">
                       Edit
                    </a>
                    <form action="{{ route('intra-colleges.destroy', $college->id) }}" method="POST" class="inline-block">
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
  </div>

  @include('layout.footer')
</body>
</html>
