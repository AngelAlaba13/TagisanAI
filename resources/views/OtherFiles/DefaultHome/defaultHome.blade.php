<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TagisanAI | Tryouts</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">

    @include('layout.header')

    <div class=" pt-10 md:mt-4 pb-8 md:pb-12">

        <!-- ========================= -->
        <!-- Hero Slider (JS Controlled) -->
        <!-- ========================= -->
        <section class="relative w-full">
            <div class="carousel w-full h-72 md:h-[500px] relative overflow-hidden">

                <!-- Slide 1 -->
                <div class="carousel-item relative w-full">
                    <img src="{{ asset('sliders/slider1.jpg') }}" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-black/20 flex flex-col justify-center items-center text-center text-white px-4">
                        <!-- Optional overlay content -->
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item relative w-full hidden">
                    <img src="{{ asset('sliders/slider2.jpg') }}" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-black/20 flex flex-col justify-center items-center text-center text-white px-4">
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item relative w-full hidden">
                    <img src="{{ asset('sliders/slider3.jpg') }}" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-black/20 flex flex-col justify-center items-center text-center text-white px-4">
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="btn btn-circle absolute left-4 top-1/2 -translate-y-1/2 z-10 carousel-prev">❮</button>
                <button class="btn btn-circle absolute right-4 top-1/2 -translate-y-1/2 z-10 carousel-next">❯</button>
            </div>
        </section>


        <div class="mx-16">
            <!-- About Section -->
        <section class="container mx-auto mt-16 px-6">
            <div class="bg-gradient-to-b from-[#FFFFFF] to-[#FFEFD1] dark:bg-gray-800 p-10 rounded-xl border-2 border-[#FFB630] shadow-black/40 shadow-md">
                <h3 class="text-2xl font-bold mb-2 text-black">At <span class="text-[#FFB52C]">NEMSU</span></h3>
                <p class="text-gray-700 dark:text-gray-300 text-sm md:text-base text-justify">
                    At NEMSU, every student is encouraged to take part in sports and embrace the opportunity to represent the university. We believe athletics not only build strength and skill but also instill discipline, teamwork, and leadership. Through active participation in competitions, our students carry the pride of NEMSU while showcasing excellence, unity, and true sportsmanship.
                </p>
            </div>
        </section>

        <!-- Events Section -->
        <section class="container mx-auto mt-24 px-6">
            <div class="flex justify-between items-center">
                <h3 class="text-4xl font-bold text-black dark:text-white">Event & Competition Tryouts</h3>
            </div>
            <p class="text-black/70 dark:text-white/70 mt-1 mb-8">
                Discover opportunities to showcase your talents and join our growing athletic community.
            </p>

            <!-- Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($tryouts as $event)
                    <div class="card bg-white dark:bg-gray-800 rounded-xl shadow-black/30 shadow-md overflow-hidden hover:shadow-xl transition">

                        <!-- Event Image -->
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}"
                                 class="w-full h-48 object-cover"
                                 alt="{{ $event->tryout_name }}">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400">
                                No Image
                            </div>
                        @endif

                        <!-- Event Content -->
                        <div class="p-5 ">
                            <h4 class="text-xl font-bold mb-1 text-dark dark:text-white">{{ $event->tryout_name }}</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">
                                {{ Str::limit($event->tryout_description, 90) }}
                            </p>
                            <!-- <p class="text-gray-500 dark:text-gray-400 text-xs mb-1">
                                <strong>Coach:</strong> {{ $event->coach_name ?? 'TBA' }}
                            </p>
                            <p class="text-gray-500 dark:text-gray-400 text-xs mb-3">
                                <strong>Schedule:</strong>
                                {{ $event->tryout_schedule ? $event->tryout_schedule->format('M d, Y • h:i A') : 'TBA' }}
                            </p> -->

                            <!-- View Details -->
                            <a href="{{ route('tryouts.show', $event->id) }}"
                               class="bg-gradient-to-r from-[#E39401] via-[#FFB52C] to-[#FFB630] btn btn-warning w-full text-white rounded-xl mt-2">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 dark:text-gray-400">--No tryouts available at the moment--</p>
                @endforelse
            </div>
        </section>

        <!-- Chat Section -->
        <section class="container mx-auto mt-36 px-6 ">
            <div class=" dark:bg-gray-800 py-12 px-20
                        flex flex-col md:flex-row items-center md:items-start 
                        gap-8  dark:border-gray-700 border-2 border-black/30 shadow-black/30 shadow-md rounded-xl">

                <!-- Icon -->
                <div class="flex-shrink-0">
                    <img src="/logos/big-isai-logo.png" alt="IsAI Logo" class="w-32 h-32">
                </div>

                <!-- Text Content -->
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">
                        Chat with <span class="text-yellow-500 font-bold text-5xl">IsAI</span>
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 mt-4 text-justify">
                        IsAI is a smart event assistant chatbot designed to guide students throughout the Intramurals
                        and other events. It provides quick details about sports, socio-cultural, and literary
                        activities — including schedules, venues, and registration information. With IsAI, students can
                        easily stay updated, participate actively, and never miss out on any exciting event on campus.
                    </p>
                </div>
            </div>
        </section>


        </div>

    </div>

    <!-- Footer -->
    @include('layout.footer')

</body>
</html>


<!-- JS for controlling the carousel + auto-slide -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const slides = carousel.querySelectorAll('.carousel-item');
    let current = 0;
    const slideInterval = 5000; // Auto-slide every 5000ms = 5 seconds

    const showSlide = (index) => {
        slides.forEach((slide, i) => {
            slide.classList.toggle('hidden', i !== index);
        });
    }

    showSlide(current); // Show first slide initially

    // Manual controls
    carousel.querySelector('.carousel-prev').addEventListener('click', () => {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    });

    carousel.querySelector('.carousel-next').addEventListener('click', () => {
        current = (current + 1) % slides.length;
        showSlide(current);
    });

    // Auto-slide
    setInterval(() => {
        current = (current + 1) % slides.length;
        showSlide(current);
    }, slideInterval);
});
</script>
