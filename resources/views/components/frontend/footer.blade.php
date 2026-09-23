<footer class="bg-slate-900 text-slate-300 py-16 mt-12 relative overflow-hidden">
    @php 
        $pengaturan = \App\Models\Pengaturan::first(); 
        
        $iconMap = [
            'instagram' => 'fa-instagram',
            'facebook' => 'fa-facebook-f',
            'youtube' => 'fa-youtube',
            'twitter' => 'fa-x-twitter',
            'tiktok' => 'fa-tiktok',
        ];
    @endphp
    
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-600 rounded-full blur-[100px] opacity-20"></div>
    
    <div class="w-full max-w-[1600px] mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 relative z-10">
        <div class="lg:col-span-2">
            <div class="flex items-center gap-3 mb-6">
                <img src="{{ asset('images/logo_kemenkes.png') }}" alt="Logo Kemenkes" class="w-10 h-10 object-contain drop-shadow-md brightness-0 invert opacity-80" id="logo_footer">
                <div>
                    <h4 class="font-bold text-white text-lg leading-tight">Pusat Penjaminan Mutu</h4>
                    <p class="text-xs text-slate-400">Poltekkes Kemenkes Medan</p>
                </div>
            </div>
            <p class="mb-6 leading-relaxed text-sm">Poltekkes Kemenkes Medan berkomitmen penuh terhadap peningkatan budaya mutu akademik secara berkelanjutan guna menghasilkan lulusan berdaya saing global.</p>
            <div class="flex gap-3">
                @php $socials = is_string($pengaturan?->social_media_links) ? json_decode($pengaturan->social_media_links, true) : ($pengaturan?->social_media_links ?? []); @endphp
                @if(is_array($socials) && count($socials) > 0)
                    @foreach($socials as $social)
                        <a href="{{ $social['url'] ?? '#' }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors text-white text-lg cursor-pointer">
                            <i class="fa-brands {{ $iconMap[strtolower($social['platform'] ?? '')] ?? 'fa-link' }}"></i>
                        </a>
                    @endforeach
                @else
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors text-white text-lg"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors text-white text-lg"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors text-white text-lg"><i class="fa-brands fa-youtube"></i></a>
                @endif
            </div>
        </div>
        
        <div>
            <h4 class="text-white font-bold mb-6">Tautan Cepat</h4>
            <ul class="space-y-3 text-sm">
                <li><a href="{{ url('/') }}" class="hover:text-blue-500 transition-colors">Beranda</a></li>
                <li><a href="{{ url('/profil/struktur') }}" class="hover:text-blue-500 transition-colors">Struktur Organisasi</a></li>
                <li><a href="{{ url('/profil/tugas-fungsi') }}" class="hover:text-blue-500 transition-colors">Tugas & Fungsi</a></li>
                <li><a href="{{ url('/dokumen') }}" class="hover:text-blue-500 transition-colors">Dokumen & SOP</a></li>
                <li><a href="{{ url('/galeri') }}" class="hover:text-blue-500 transition-colors">Galeri Kegiatan</a></li>
                <li><a href="{{ url('/kontak') }}" class="hover:text-blue-500 transition-colors">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-bold mb-6">Hubungi Kami</h4>
            <div class="space-y-4 text-sm">
                <p class="flex items-start gap-3"><span class="material-symbols-outlined text-lg shrink-0 text-blue-500">location_on</span> <span>{{ $pengaturan->address ?? 'Jl. Jamin Ginting KM 13,5, Lau Cih, Medan' }}</span></p>
                <p class="flex items-center gap-3"><span class="material-symbols-outlined text-lg shrink-0 text-blue-500">call</span> <span>{{ $pengaturan->phone ?? '(061) 8368633' }}</span></p>
                <p class="flex items-center gap-3"><span class="material-symbols-outlined text-lg shrink-0 text-blue-500">mail</span> <span>{{ $pengaturan->email ?? 'penjaminanmutu@poltekkesmedan.ac.id' }}</span></p>
            </div>
        </div>
    </div>
    
    <div class="w-full max-w-[1600px] mx-auto px-6 md:px-12 mt-16 pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center text-sm text-slate-500">
        <p>&copy; {{ date('Y') }} Pusat Penjaminan Mutu - Poltekkes Kemenkes Medan.</p>
    </div>
</footer>
