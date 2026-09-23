<div>
    <!-- HERO SECTION -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Struktur Organisasi</h1>
            <p class="text-blue-100 text-lg md:text-xl font-light">
                Susunan kepengurusan Pusat Penjaminan Mutu Poltekkes Kemenkes
            </p>
        </div>
    </section>

<!-- KONTEN HALAMAN: x-data Alpine.js diinisialisasi di sini untuk Modal Lightbox -->
    <main x-data="{ lightboxOpen: false }" class="max-w-7xl mx-auto px-6 space-y-12 py-16">

        <!-- Wadah Gambar dengan instruksi klik -->
        <div class="bg-white/60 backdrop-blur-xl p-4 md:p-8 rounded-[3rem] shadow-soft border border-white text-center flex flex-col items-center">
            
            <!-- Gambar Bagan yang bisa diklik (@click) & Memenuhi Layar -->
            <div 
                @click="lightboxOpen = true" 
                class="relative cursor-zoom-in group rounded-[2rem] overflow-hidden border-4 border-slate-100 shadow-sm transition-all hover:shadow-xl hover:border-blue-200 w-full min-h-[50vh] md:min-h-[70vh] bg-slate-200 flex items-center justify-center"
            >
                <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/20 transition-colors z-10 flex items-center justify-center cursor-zoom-in">
                    <span class="bg-slate-900/90 text-white px-6 py-3 rounded-full font-semibold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center gap-2 backdrop-blur-md shadow-2xl scale-95 group-hover:scale-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg> Perbesar Bagan
                    </span>
                </div>
                <!-- Gambar dari Database (Di-set Absolute agar menutupi container sepenuhnya) -->
                @php
                    $strukturImage = isset($profil) && $profil->struktur_image ? asset('storage/' . $profil->struktur_image) : 'https://via.placeholder.com/1600x900/e2e8f0/475569?text=Struktur+Organisasi+Belum+Diupload';
                @endphp
                <img src="{{ $strukturImage }}" alt="Bagan Organisasi" class="absolute inset-0 w-full h-full object-contain group-hover:scale-105 transition-transform duration-700">
            </div>
        </div>

        <!-- MODAL LIGHTBOX (Akan muncul saat lightboxOpen = true) -->
        <div 
            x-show="lightboxOpen" 
            style="display: none;"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/90 backdrop-blur-md"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <!-- Tombol Tutup -->
            <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white/50 hover:text-white bg-white/10 hover:bg-white/20 rounded-full p-2 backdrop-blur-md transition-all cursor-pointer">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Gambar dalam ukuran penuh -->
            <div 
                @click.outside="lightboxOpen = false"
                class="relative max-w-5xl w-full"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="scale-95 opacity-0"
                x-transition:enter-end="scale-100 opacity-100"
            >
                <img src="{{ $strukturImage }}" alt="Bagan Organisasi Full" class="w-full h-auto rounded-xl shadow-2xl border border-white/20">
                <p class="text-center text-white/70 mt-4 text-sm">Klik di luar gambar atau tekan tombol silang (X) untuk menutup.</p>
            </div>
        </div>
        <!-- AKHIR MODAL LIGHTBOX -->

    </main>
</div>