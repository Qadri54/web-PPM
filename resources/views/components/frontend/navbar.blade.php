<header x-data="{ mobileMenuOpen: false, mobileProfilOpen: false }" class="sticky top-0 z-50 bg-white/70 backdrop-blur-md border-b border-white shadow-sm">
    <div class="w-full max-w-[1600px] mx-auto px-6 md:px-12 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/logo_kemenkes.png') }}" alt="Logo Kemenkes" class="w-12 h-12 object-contain drop-shadow-md" id="logo_kemenkes">
            <div>
                <h1 class="font-bold text-slate-900 leading-tight">Pusat Penjaminan Mutu</h1>
                <p class="text-xs text-slate-500">Poltekkes Kemenkes Medan</p>
            </div>
        </a>
        
        <!-- Navbar Desktop -->
        <nav class="hidden md:flex space-x-8 font-semibold text-sm text-slate-600 items-center">
            <a href="{{ url('/') }}" class="pb-1 {{ request()->is('/') ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:text-blue-600 transition-colors' }}">Beranda</a>
            <div class="relative group cursor-pointer">
                <span class="pb-1 flex items-center gap-1 {{ request()->is('profil*') ? 'text-blue-600' : 'hover:text-blue-600 transition-colors' }}">Profil <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                <!-- Dropdown Profil -->
                <div class="absolute top-full left-0 mt-2 w-48 bg-white/90 backdrop-blur-lg rounded-2xl shadow-soft border border-white opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 overflow-hidden">
                    <a href="{{ url('/profil/struktur') }}" class="block px-4 py-3 hover:bg-blue-50 hover:text-blue-600">Struktur Organisasi</a>
                    <a href="{{ url('/profil/tugas-fungsi') }}" class="block px-4 py-3 hover:bg-blue-50 hover:text-blue-600">Tugas Pokok & Fungsi</a>
                </div>
            </div>
            <a href="{{ url('/dokumen') }}" class="pb-1 {{ request()->is('dokumen') ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:text-blue-600 transition-colors' }}">Dokumen & SOP</a>
            <a href="{{ url('/galeri') }}" class="pb-1 {{ request()->is('galeri') ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:text-blue-600 transition-colors' }}">Galeri</a>
            <a href="{{ url('/kontak') }}" class="pb-1 {{ request()->is('kontak') ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:text-blue-600 transition-colors' }}">Kontak</a>
        </nav>

        <!-- Tombol Hamburger Mobile -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="md:hidden text-slate-700 hover:text-blue-600 focus:outline-none p-2 rounded-xl hover:bg-slate-50 transition-colors cursor-pointer">
            <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            <svg x-show="mobileMenuOpen" x-cloak style="display: none;" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Menu Mobile Dropdown -->
    <div x-show="mobileMenuOpen" 
         x-cloak style="display: none;"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-xl border-b border-slate-100 shadow-lg z-40 max-h-[80vh] overflow-y-auto">
        <nav class="flex flex-col px-6 py-4 space-y-2 font-medium text-slate-700">
            <a href="{{ url('/') }}" class="px-4 py-3 rounded-xl {{ request()->is('/') ? 'bg-blue-50 text-blue-600 font-bold' : 'hover:bg-slate-50' }}">Beranda</a>
            
            <div class="rounded-xl overflow-hidden {{ request()->is('profil*') ? 'bg-blue-50/50' : '' }}">
                <button @click="mobileProfilOpen = !mobileProfilOpen" class="w-full px-4 py-3 flex justify-between items-center cursor-pointer {{ request()->is('profil*') ? 'text-blue-600 font-bold' : 'hover:bg-slate-50' }}">
                    Profil
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': mobileProfilOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="mobileProfilOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="px-4 pb-2 space-y-1">
                    <a href="{{ url('/profil/struktur') }}" class="block px-4 py-2 text-sm rounded-lg {{ request()->is('profil/struktur') ? 'text-blue-600 font-bold' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">Struktur Organisasi</a>
                    <a href="{{ url('/profil/tugas-fungsi') }}" class="block px-4 py-2 text-sm rounded-lg {{ request()->is('profil/tugas-fungsi') ? 'text-blue-600 font-bold' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">Tugas Pokok & Fungsi</a>
                </div>
            </div>

            <a href="{{ url('/dokumen') }}" class="px-4 py-3 rounded-xl {{ request()->is('dokumen') ? 'bg-blue-50 text-blue-600 font-bold' : 'hover:bg-slate-50' }}">Dokumen & SOP</a>
            <a href="{{ url('/galeri') }}" class="px-4 py-3 rounded-xl {{ request()->is('galeri') ? 'bg-blue-50 text-blue-600 font-bold' : 'hover:bg-slate-50' }}">Galeri</a>
            <a href="{{ url('/kontak') }}" class="px-4 py-3 rounded-xl {{ request()->is('kontak') ? 'bg-blue-50 text-blue-600 font-bold' : 'hover:bg-slate-50' }}">Kontak</a>
        </nav>
    </div>
</header>
