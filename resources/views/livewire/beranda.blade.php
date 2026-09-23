<div class="w-full max-w-[1600px] mx-auto px-6 md:px-12 space-y-24 py-12">
<!-- 2.2 HERO BANNER (Animated Carousel) -->
        <section class="relative rounded-[2.5rem] md:rounded-[3rem] bg-slate-900 overflow-hidden shadow-2xl min-h-[75vh] md:min-h-[85vh] flex items-center"
                 x-data="{ 
                     activeSlide: 0, 
                     slides: {{ $banners->count() }}, 
                     autoPlay() {
                         setInterval(() => {
                             if(this.slides > 1) {
                                this.activeSlide = this.activeSlide === this.slides - 1 ? 0 : this.activeSlide + 1;
                             }
                         }, 6000);
                     }
                 }"
                 x-init="autoPlay()">
            
            @foreach($banners as $index => $banner)
            <div x-show="activeSlide === {{ $index }}" 
                 x-transition:enter="transition ease-out duration-1000" 
                 x-transition:enter-start="opacity-0 scale-105" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-1000" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95" 
                 class="absolute inset-0 w-full h-full"
                 style="display: none;">
                 
                <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-slate-900/70 md:bg-gradient-to-r md:from-slate-900/95 md:via-slate-900/50 md:to-transparent"></div>
                
                <div class="relative z-10 p-8 py-16 md:p-20 lg:p-24 max-w-4xl text-white h-full flex flex-col justify-center">
                    <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-[4.5rem] font-extrabold tracking-tight mb-6 md:mb-8 leading-[1.1] drop-shadow-lg">{{ $banner->title }}</h2>
                    @if($banner->subtitle)
                        <p class="text-lg md:text-xl lg:text-2xl text-slate-200 mb-10 leading-relaxed max-w-3xl drop-shadow-md">{{ $banner->subtitle }}</p>
                    @endif
                    
                    @if($banner->link_cta)
                    <a href="{{ $banner->link_cta }}" class="relative group overflow-hidden rounded-full w-full sm:w-max block">
                        <span class="absolute inset-0 bg-gradient-to-r from-primary-400 to-blue-400 rounded-full opacity-70 group-hover:opacity-100 transition-opacity blur-sm"></span>
                        <div class="relative bg-gradient-to-r from-primary-600 to-primary-500 text-white font-semibold py-4 px-10 rounded-full shadow-lg flex items-center justify-center gap-2 md:text-lg">
                            Pelajari Lebih Lanjut
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            
            @if($banners->count() > 0)
            <div class="absolute bottom-6 md:bottom-10 left-1/2 -translate-x-1/2 flex gap-3 z-20">
                @foreach($banners as $index => $banner)
                <button @click="activeSlide = {{ $index }}" 
                        class="h-2.5 rounded-full transition-all duration-300 shadow-lg"
                        :class="activeSlide === {{ $index }} ? 'w-10 bg-white' : 'w-2.5 bg-white/50 hover:bg-white/80'"></button>
                @endforeach
            </div>
            @endif
            
            @if($banners->isEmpty())
            <div class="absolute inset-0 bg-slate-800 opacity-50 bg-[url('https://via.placeholder.com/1600x900?text=Banner+Belum+Tersedia')] bg-cover bg-center mix-blend-overlay"></div>
            <div class="absolute inset-0 bg-slate-900/80 md:bg-gradient-to-r md:from-slate-900/95 md:via-slate-900/70 md:to-transparent"></div>
            <div class="relative z-10 p-8 py-16 md:p-20 lg:p-24 max-w-4xl text-white">
                <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-[4.5rem] font-extrabold tracking-tight mb-6 md:mb-8 leading-[1.1]">Menyala Bersama Mutu, Poltekkes Berdaya Saing Global</h2>
                <p class="text-lg md:text-xl lg:text-2xl text-slate-200 mb-10 leading-relaxed max-w-3xl">Portal resmi dokumen dan layanan penjaminan mutu.</p>
            </div>
            @endif
        </section>

        <!-- 2.2 SAMBUTAN KEPALA PPM -->
        @if($profil)
        <section class="flex flex-col lg:flex-row gap-12 items-center">
            <div class="w-full lg:w-1/3">
                <div class="relative w-full aspect-[3/4] rounded-[2rem] bg-slate-300 shadow-soft overflow-hidden border-8 border-white">
                    @if($profil->sambutan_image)
                        <img src="{{ asset('storage/' . $profil->sambutan_image) }}" alt="{{ $profil->sambutan_name }}" class="w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-slate-500 font-medium text-center px-4">[Foto {{ $profil->sambutan_name }}]</div>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-2/3">
                <h3 class="text-3xl font-bold tracking-tight text-slate-900 mb-2">Sambutan Kepala PPM</h3>
                <div class="w-20 h-1.5 bg-gradient-to-r from-primary-500 to-blue-500 rounded-full mb-6"></div>
                <h4 class="text-xl font-bold text-primary-600">{{ $profil->sambutan_name }}</h4>
                <p class="text-sm text-slate-500 mb-6">{{ $profil->sambutan_title }}</p>
                <div class="bg-white/60 backdrop-blur-lg rounded-3xl p-8 shadow-soft border border-white">
                    <div class="text-slate-600 leading-relaxed prose prose-slate">
                        {!! $profil->sambutan_text !!}
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- 2.2 LAYANAN KAMI -->
        @if($layanans->count() > 0)
        <section>
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold tracking-tight text-slate-900 mb-4">Layanan & Fokus Kami</h3>
                <p class="text-slate-500 max-w-2xl mx-auto">Tugas pokok dan fungsi dalam mengawal mutu pendidikan secara menyeluruh.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($layanans as $layanan)
                <div class="group relative bg-white/70 backdrop-blur-xl rounded-[2rem] shadow-soft border border-white p-8 hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden text-center">
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-glow">
                            @if($layanan->icon_image)
                                <img src="{{ asset('storage/' . $layanan->icon_image) }}" alt="Ikon {{ $layanan->name }}" class="w-8 h-12 object-contain">
                            @else
                                <span class="material-symbols-outlined text-3xl">verified</span>
                            @endif
                        </div>
                        <h4 class="font-bold text-lg mb-2">{{ $layanan->name }}</h4>
                        <p class="text-sm text-slate-500">{{ $layanan->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif



        <!-- 2.2 LINK TERKAIT -->
        @if($links->count() > 0)
        <section class="py-12 border-t border-slate-200/60">
            <p class="text-center text-base md:text-lg font-bold text-slate-600 uppercase tracking-widest mb-8">Didukung & Bermitra Dengan</p>
            <div class="flex flex-col md:flex-row flex-wrap justify-center gap-8 md:gap-12 items-center opacity-90 transition-all duration-500">
                @foreach($links as $link)
                <a href="{{ $link->url }}" target="_blank" class="h-20 bg-slate-100 rounded-2xl flex items-center justify-center px-8 hover:bg-slate-200 transition-colors shadow-sm">
                    @if($link->logo_image)
                        <img src="{{ asset('storage/' . $link->logo_image) }}" alt="{{ $link->name }}" class="h-12 object-contain">
                    @else
                        <span class="text-base font-bold text-slate-700">{{ $link->name }}</span>
                    @endif
                </a>
                @endforeach
            </div>
        </section>
        @endif

    </main>

    <!-- 2.6 KONTAK & FOOTER -->
        <!-- FOOTER -->
</div>