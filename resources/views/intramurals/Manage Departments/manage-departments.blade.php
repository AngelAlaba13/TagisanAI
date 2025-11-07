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
    <div class="pt-10 md:pt-14">
      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-5">
        <h1 class="text-2xl font-medium text-dark dark:text-light">Departments</h1>
      </div>

      <!-- Table Container -->
            <div class="card bg-[#ffeed8] dark:bg-zinc-700 shadow-md">
                <div class="overflow-x-auto">
                    <table class="table w-full border border-gray-400/70 dark:border-gray-600 border-collapse">

                    <!-- Table Head -->
                    <thead>
                        <tr class="text-dark dark:text-light text-lg font-semibold">
                        <th class="px-4 py-3 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left w-12">#</th>
                        <th class="px-4 py-3 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Event Name</th>
                        <th class="px-4 py-3 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-left">Governor</th>
                        <th class="px-4 py-3 border bg-[hsl(23,100%,82%)] dark:bg-zinc-800/60 border-gray-500 dark:border-gray-600 text-center">Actions</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="text-dark dark:text-light text-base">
                        @foreach($colleges as $index => $college)
                        <tr class="hover:bg-[#FFE9C6]/70 dark:hover:bg-zinc-800/20 transition">
                            <td class="px-4 py-3 border border-gray-400 dark:border-gray-600 text-center">{{ $colleges->firstItem() ? $colleges->firstItem() + $index : $index + 1 }}</td>
                            
                            <td class="flex justify-start items-center gap-2 px-4 py-3 border border-gray-400 dark:border-gray-600">
                                <div class="rounded-full">
                                    @if($college->college_logo)
                                <img src="{{ asset('college_logos/' . $college->college_logo) }}" alt="{{ $college->college_name }}" class="w-8 h-8 object-contain rounded-full">
                                @endif
                                </div>
                                <p class=" font-bold text-xl">{{ $college->college_code }}</p>
                                {{ $college->college_name }}</td>
                            <td class="px-4 py-3 border border-gray-400 dark:border-gray-600">{{ $college->col_governor }}</td>
                            <td class="px-4 py-3 border border-gray-400 dark:border-gray-600 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    
                                <!-- Reserve space for Bracket link (even if empty) -->
                                    <!-- <div class="w-16 text-orange-500 text-base text-right">
                                    <a href="#" class="hover:underline">Bracket</a>
                                    </div>
                                    <span class="text-gray-400">|</span> -->
                                    <div class="text-blue-600 text-base">
                                    <a href="{{ route('intra-colleges.edit', $college->id) }}" class="hover:underline">Edit</a>
                                    </div>
                                    <span class="text-gray-400">|</span>
                                    <form action="{{ route('intra-colleges.destroy', $college->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="text-red-600 text-base">
                                            <button class="hover:underline">Delete</button>
                                        </div>
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
