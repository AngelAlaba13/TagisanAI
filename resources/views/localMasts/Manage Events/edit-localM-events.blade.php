<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event | TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
    @include('localMasts.localMasts-sidepanel')

    <div class="min-h-screen pl-28 pr-28 flex justify-center items-center">
        <div class="bg-white dark:bg-zinc-800 shadow-sm shadow-black/25 border-2 border-black-10 dark:border-white/25 rounded-xl h-fit p-10 w-full max-w-4xl">
            <h2 class="text-2xl md:text-4xl font-semibold text-center text-dark dark:text-light pt-5 mb-20">Edit Event</h2>

            <form action="{{ route('localM-events.update', $localEvents->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex gap-10">
                    <!-- Event Name -->
                    <div class=" flex-[40%] mb-6">
                        <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Event Name</label>
                        <input type="text" name="event_name" placeholder="Badminton" value="{{ old('event_name', $localEvents->event_name) }}"
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                    </div>

                    <!-- Event Icon -->
                    <div class="flex-[30%] mb-6">
                        <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Event Icon</label>
                       
                        <div class="flex flex-row gap-3 justify-start items-center">
                            <div class=" flex items-center justify-center">
                                <div class="flex-[40%] rounded-full bg-[hsl(31,49%,49%)] p-3">
                                    <img id="iconPreview" src="{{ asset('icons/arnis.png') }}" 
                                    alt="Icon Preview" class=" w-7 h-7 object-contain">
                                </div>
                                
                            </div>

                            <select name="icon" id="iconSelect" class="flex-[60%] select select-bordered w-full px-2 text-sm p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light h-full">
                                <option value="">--Select Icon--</option>
                                @foreach($icons as $icon)
                                    <option value="{{ $icon }}" {{ (old('icon', $localEvents->icon) == $icon) ? 'selected' : '' }}>{{ pathinfo($icon, PATHINFO_FILENAME) }}</option>
                                @endforeach
                            </select>
                        </div>   
                    </div>

                    <script>
                        const ICONS_PATH = "{{ asset('icons') }}/";
                        <?php
                            if (isset($icons) && is_object($icons) && method_exists($icons, 'map')) {
                                $__icons_for_js = $icons->map(fn($i) => basename($i))->values()->all();
                            } else {
                                $__icons_for_js = [];
                            }
                        ?>
                        window.ICONS = @json($__icons_for_js);
                    </script>
                    
                    <template id="icon-options-template">
                        <option value="">--Select Icon--</option>
                        @foreach($__icons_for_js as $filename)
                            <option value="{{ $filename }}">{{ pathinfo($filename, PATHINFO_FILENAME) }}</option>
                        @endforeach
                    </template>
                    @vite('resources/js/intramurals/manage-events/add-events.js')
                </div>

                <!-- Category -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Category</label>
                                <input type="text" name="category" placeholder="Sports" value="{{ old('category', $localEvents->category) }}"
                                    class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Description</label>
               <textarea name="description" placeholder="Type a short description here..." rows="4"
                   class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light resize-none">{{ old('description', $localEvents->description) }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-[#00b300] transition">Save Event</button>
                    <a href="{{ route('localM-events.index') }}" class="px-6 py-2 bg-gray-200 text-gray-800 hover:bg-gray-300 rounded-lg transition">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>