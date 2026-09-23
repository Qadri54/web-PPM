<div>
    <!-- HERO SECTION -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Tugas dan Fungsi</h1>
            <p class="text-blue-100 text-lg md:text-xl font-light">
                Pusat Penjaminan Mutu Poltekkes Kemenkes
            </p>
        </div>
    </section>

    <!-- KONTEN TUGAS DAN FUNGSI DARI DATABASE -->
    <main class="w-full max-w-[1200px] mx-auto px-6 md:px-12 space-y-8 py-12 md:py-16">
        @if($tupoksis && $tupoksis->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($tupoksis as $tupoksi)
                    <div class="bg-white p-8 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-shadow">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">{{ $tupoksi->title }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $tupoksi->description }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-slate-500 py-12 bg-white rounded-xl shadow-sm border border-slate-50">
                <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-lg">Konten Tugas dan Fungsi belum tersedia.</p>
            </div>
        @endif
    </main>
</div>
