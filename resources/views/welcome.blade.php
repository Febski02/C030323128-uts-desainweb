<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPP - Sistem Informasi Pelatihan Pertanian</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

html {
            scroll-behavior: smooth;
        }
        .carousel-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            height: 500px;
            position: relative;
            overflow: hidden;
        }
        
        .carousel-item {
            width: 100%;
            height: 100%;
        }
        
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        [data-theme="dark"] .carousel-item img {
            filter: brightness(0.8);
        }
        
        .carousel-controls {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 2rem;
            z-index: 10;
        }
        
        .carousel-indicator {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 10;
        }
        
        .indicator-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .indicator-dot.active {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="flex flex-col min-h-screen" x-data="{ 
        menuOpen: false,
        darkMode: localStorage.getItem('darkMode') === 'true',
        activeSlide: 0,
        slides: [
            { src: '/img/foto1.jpg', alt: 'foto1' },
            { src: '/img/foto2.jpg', alt: 'foto2' },
            { src: '/img/foto3.jpg', alt: 'foto3' }
        ],
        toggleDarkMode() {
            this.darkMode = !this.darkMode;
            document.documentElement.setAttribute('data-theme', this.darkMode ? 'dark' : 'light');
            localStorage.setItem('darkMode', this.darkMode);
        },
        nextSlide() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        prevSlide() {
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
        },
        init() {
            setInterval(() => this.nextSlide(), 5000);
        }
    }" x-init="init()" :class="{ 'dark': darkMode }">
    
        <!-- Navbar -->
        <div class="navbar bg-base-100 shadow-lg">
            <div class="flex-1 justify-start">
                <a class="btn btn-ghost normal-case text-xl flex items-center">
                    <img src="/img/logo.webp" alt="Logo SIMPP" class="h-10 w-15 mr-2 rounded-xl">
                    SIMPP
                </a>
            </div>
            <div class="flex-none hidden md:block">
                <ul class="menu menu-horizontal px-1">
                <li><a href="#">Beranda</a></li>
                <li><a href="#Team">Team Kami</a></li>
                <li><a href="#Tentang">Tentang</a></li>
                <li><a href="#QNA">QNA</a></li>
                <li><a href="#Contact">Contact</a></li>
                </ul>
            </div>
            <div class="flex-none">
                <label class="swap swap-rotate">
                    <input type="checkbox" x-model="darkMode" @change="toggleDarkMode()" />
                    <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>
                    <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>
                </label>
            </div>
            <div class="flex-none md:hidden">
                <button class="btn btn-square btn-ghost" @click="menuOpen = !menuOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="menuOpen" @click.away="menuOpen = false">
            <ul class="menu bg-base-100 w-full p-2 rounded-box">
                <li><a href="#">Beranda</a></li>
                <li><a href="#Team">Team Kami</a></li>
                <li><a href="Tentang">Tentang</a></li>
                <li><a href="#QNA">QNA</a></li>
                <li><a href="#Contact">Contact</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="flex-grow mb-10">
            <!-- Improved Carousel -->
            <div class="carousel-container">
                <template x-for="(slide, index) in slides" :key="index">
                    <div class="carousel-item absolute transition-opacity duration-500"
                         x-show="activeSlide === index"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0">
                        <img :src="slide.src" :alt="slide.alt" class="w-full h-full object-cover">
                    </div>
                </template>
                
                <div class="carousel-controls">
                    <button class="btn btn-circle bg-base-200 bg-opacity-50 hover:bg-opacity-75" @click="prevSlide">❮</button>
                    <button class="btn btn-circle bg-base-200 bg-opacity-50 hover:bg-opacity-75" @click="nextSlide">❯</button>
                </div>
                
                <div class="carousel-indicator">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button class="indicator-dot" 
                                :class="{ 'active': activeSlide === index }"
                                @click="activeSlide = index"></button>
                    </template>
                </div>
            </div>

            <!-- Booking Section -->
            <div class="container mx-auto mt-8 px-4">
                <div class="text-center">
                    <div x-data="typewriter()" x-init="start()"
                                class="inline-block overflow-hidden whitespace-nowrap border-r-4 border-blue-700 pr-2">
                                <h1 class="text-5xl font-bold" x-text="text"></h1>
                            </div>
                    <p class="text-lg md:text-xl mb-6">Pelatihan dan layanan pertanian yang nyaman</p>
                    <a href="/admin/login" class="btn btn-primary btn-lg">Daftar</a>
                </div>
            </div>

            <!-- Features -->
            <div class="container mx-auto px-4 py-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center" id="Team">Team Kami</h2>
                <div class="flex justify-center">
                    <div class="w-full max-w-7xl overflow-x-auto">
                        <div class="flex justify-center space-x-4 p-4">
                            @foreach($profilData as $profil)
                                <div class="card bg-base-100 shadow-xl flex-shrink-0" style="width: 300px;">
                                    <figure class="px-10 pt-10">
                                        <img src="{{ asset('storage/' . $profil->image) }}" alt="{{ $profil->title }}" class="rounded-xl w-full h-48 object-cover"/>
                                    </figure>
                                    <div class="card-body items-center text-center">
                                        <h2 class="card-title">{{ $profil->nama }}</h2>
                                        <p>{{ $profil->nim }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            

            <section id="tentang" class="py-10 bg-base-100 rounded-lg shadow-sm my-8">
                <div class="max-w-4xl mx-auto px-6">
                    <h2 class="text-3xl font-bold mb-8 text-center" id="Tentang">Tentang Kami</h2>
                    <div class="prose prose-lg max-w-none">
                        <p class="mb-6">
                            Kami adalah mahasiswa Poliban semester 3 yang suka ngoding dan suka Lorem ipsum dolor sit
                            amet consectetur adipisicing elit. Recusandae veritatis, et exercitationem aspernatur
                            distinctio expedita unde quia tempore, nemo eius harum officia similique debitis esse
                            cupiditate? Veritatis quas iste porro.
                            Accusamus et cum eius repellat, fugit, dolore odit aut nobis modi explicabo aspernatur.
                            Quaerat est at suscipit fugit cupiditate molestiae possimus necessitatibus minus
                            laboriosam aut asperiores et aliquam, porro illum.
                            Asperiores molestias eaque, sit commodi inventore ratione velit itaque! Corrupti,
                            commodi quasi deserunt a eum nihil modi molestias iusto nostrum necessitatibus cum
                            minima doloribus praesentium excepturi possimus officia numquam iste?
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-evenly">
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                        @foreach($profilData as $data)
                        <div class="card bg-base-100 shadow-xl w-full">
                            <div class="card-body">
                                <h2 class="card-title">{{$data->nama}}</h2>
                                <ul class="list-disc list-inside">
                                    <li class="m-1">{{$data->nim}}<i class="fa fa-github" style="font-size:24px"></i><a
                                            target="_blank" href=""
                                            class="ml-1"></a></li>
                                    <li class="m-1">{{$data->umur}} Tahun<i class="fa fa-github" style="font-size:24px"></i><a
                                            target="_blank" href=""
                                            class="ml-1"></a></li>
                                    <li class="m-1">{{$data->github}}<i class="fa fa-github" style="font-size:24px"></i><a
                                            target="_blank" href="{{$data->github}}"
                                            class="ml-1"></a></li>
                                    <li class="m-1">{{$data->asal}}<i class="fa fa-github" style="font-size:24px"></i><a
                                            target="_blank"
                                            class="ml-1"></a></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
           
            <!-- FAQ Accordion -->
            <div class="container mx-auto mt-16 px-4">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center" id="QNA">Pertanyaan yang Sering Diajukan</h2>
                <div class="join join-vertical w-full">
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="my-accordion-4" checked="checked" /> 
                        <div class="collapse-title text-xl font-medium">
                            Bagaimana cara mendaftar pelatihan?
                        </div>
                        <div class="collapse-content"> 
                            <p>Klik tombol "Daftar" di halaman utama dan ikuti panduan pendaftaran yang tersedia.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="my-accordion-4" /> 
                        <div class="collapse-title text-xl font-medium">
                            Berapa lama durasi pelatihan?
                        </div>
                        <div class="collapse-content"> 
                            <p>Durasi pelatihan bervariasi mulai dari 1 minggu hingga 3 bulan, tergantung program yang dipilih.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="my-accordion-4" /> 
                        <div class="collapse-title text-xl font-medium">
                            Apakah ada sertifikat setelah menyelesaikan pelatihan?
                        </div>
                        <div class="collapse-content"> 
                            <p>Ya, setiap peserta yang berhasil menyelesaikan pelatihan akan mendapatkan sertifikat resmi dari SIMPP.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="my-accordion-4" /> 
                        <div class="collapse-title text-xl font-medium">
                            Apakah ada sertifikat setelah menyelesaikan pelatihan?
                        </div>
                        <div class="collapse-content"> 
                            <p>Ya, setiap peserta yang berhasil menyelesaikan pelatihan akan mendapatkan sertifikat resmi dari SIMPP.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="my-accordion-4" /> 
                        <div class="collapse-title text-xl font-medium">
                            Apakah ada sertifikat setelah menyelesaikan pelatihan?
                        </div>
                        <div class="collapse-content"> 
                            <p>Ya, setiap peserta yang berhasil menyelesaikan pelatihan akan mendapatkan sertifikat resmi dari SIMPP.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="my-accordion-4" /> 
                        <div class="collapse-title text-xl font-medium">
                            Apakah ada sertifikat setelah menyelesaikan pelatihan?
                        </div>
                        <div class="collapse-content"> 
                            <p>Ya, setiap peserta yang berhasil menyelesaikan pelatihan akan mendapatkan sertifikat resmi dari SIMPP.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="my-accordion-4" /> 
                        <div class="collapse-title text-xl font-medium">
                            Apakah ada sertifikat setelah menyelesaikan pelatihan?
                        </div>
                        <div class="collapse-content"> 
                            <p>Ya, setiap peserta yang berhasil menyelesaikan pelatihan akan mendapatkan sertifikat resmi dari SIMPP.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer footer-center p-10 bg-base-200 text-base-content rounded" id="Contact">
            <div class="grid grid-flow-col gap-4">
                <a class="link link-hover">Tentang kami</a> 
                <a class="link link-hover">Kontak</a> 
                <a class="link link-hover">Karir</a> 
                <a class="link link-hover">Berita</a>
            </div> 
            <div>
                <div class="grid grid-flow-col gap-4">
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
                </div>
            </div> 
            <div>
                <p>Hak Cipta © 2023 - SIMPP (Sistem Informasi Pelatihan Pertanian)</p>
            </div>
        </footer>
    </div>
    <script>
        function typewriter() {
            return {
                text: '',
                texts: [
                    'Sistem Informasi Pelatihan',
                    'dan Pelayanan untuk Pertanian'
                ],
                delay: 100,
                deleteDelay: 100,
                textIndex: 0,
                start() {
                    this.type();
                },
                type() {
                    let currentIndex = 0;
                    const interval = setInterval(() => {
                        this.text = this.texts[this.textIndex].slice(0, currentIndex + 1);
                        currentIndex++;
    
                        if (currentIndex === this.texts[this.textIndex].length) {
                            clearInterval(interval);
                            setTimeout(() => this.delete(), 2000); // Wait before deleting
                        }
                    }, this.delay);
                },
                delete() {
                    let currentIndex = this.texts[this.textIndex].length;
                    const interval = setInterval(() => {
                        this.text = this.texts[this.textIndex].slice(0, currentIndex - 1);
                        currentIndex--;
    
                        if (currentIndex === 0) {
                            clearInterval(interval);
                            this.textIndex = (this.textIndex + 1) % this.texts.length; // Move to next text
                            setTimeout(() => this.type(), 500); // Wait before typing again
                        }
                    }, this.deleteDelay);
                }
            }
        }
    </script>
</body>
</html>