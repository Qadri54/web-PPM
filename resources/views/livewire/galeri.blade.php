<div>
    <!-- HERO SECTION -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 py-16 md:py-24 relative overflow-hidden mb-12">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Galeri Kegiatan</h1>
            <p class="text-blue-100 text-lg md:text-xl font-light">
                Dokumentasi kegiatan dan implementasi penjaminan mutu di lingkungan kampus.
            </p>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galeris as $galeri)
            <!-- Galeri Item -->
            <div class="group relative rounded-3xl overflow-hidden shadow-soft aspect-[4/3] bg-slate-200">
                <img src="{{ $galeri->image_path ? asset('storage/' . $galeri->image_path) : 'https://via.placeholder.com/800x600/e2e8f0/475569?text=No+Image' }}" alt="{{ $galeri->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <span class="inline-block py-1 px-3 rounded-md bg-blue-500 text-white text-xs font-bold mb-3 shadow-lg">{{ $galeri->category_label ?? 'Kegiatan' }}</span>
                    <h4 class="text-xl font-bold text-white leading-tight mb-2">{{ $galeri->title }}</h4>
                    <p class="text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 line-clamp-2">
                        {{ $galeri->description }}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-slate-50 rounded-3xl border border-slate-100">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4 block">photo_library</span>
                <h3 class="text-xl font-bold text-slate-700">Belum ada dokumentasi</h3>
                <p class="text-slate-500 mt-2">Foto kegiatan akan segera diunggah.</p>
            </div>
            @endforelse
        </div>
        
        @if($galeris->hasMorePages())
        <div class="flex justify-center mt-12">
            <button wire:click="loadMore" type="button" class="bg-white border-2 border-slate-200 text-slate-700 hover:border-blue-500 hover:text-blue-600 font-bold py-3 px-8 rounded-full transition-colors cursor-pointer flex items-center gap-2">
                <span wire:loading.remove wire:target="loadMore">Muat Lebih Banyak</span>
                <span wire:loading wire:target="loadMore">Memuat...</span>
            </button>
        </div>
        @endif
    </main>
</div>