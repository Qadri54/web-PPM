<div>
    <!-- HERO SECTION -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 py-16 md:py-24 relative overflow-hidden mb-12">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Hubungi Kami</h1>
            <p class="text-blue-100 text-lg md:text-xl font-light">
                Kami siap membantu menjawab pertanyaan Anda terkait layanan dan penjaminan mutu akademik.
            </p>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <!-- Informasi Kontak -->
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-[3rem] p-10 md:p-14 text-white shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500 rounded-full blur-[80px] opacity-20 -translate-y-1/2 translate-x-1/3"></div>
                
                <h3 class="text-2xl font-bold text-white mb-8">Pusat Penjaminan Mutu</h3>
                <p class="text-slate-300 mb-10 leading-relaxed text-lg">Poltekkes Kemenkes Medan berkomitmen penuh terhadap peningkatan budaya mutu akademik secara berkelanjutan.</p>
                
                <div class="space-y-8">
                    <div class="flex items-start gap-5 group">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 group-hover:bg-blue-500 transition-colors">
                            <span class="material-symbols-outlined text-3xl">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-200 mb-1 text-sm uppercase tracking-wider">Alamat</h4>
                            <p class="text-slate-300 leading-relaxed">{{ $pengaturan->address ?? 'Jl. Jamin Ginting KM 13,5, Lau Cih, Medan Tuntungan, Kota Medan' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-5 group">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 group-hover:bg-blue-500 transition-colors">
                            <span class="material-symbols-outlined text-3xl">call</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-200 mb-1 text-sm uppercase tracking-wider">Telepon / Fax</h4>
                            <p class="text-slate-300">{{ $pengaturan->phone ?? '(061) 8368633' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 group">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 group-hover:bg-blue-500 transition-colors">
                            <span class="material-symbols-outlined text-3xl">mail</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-200 mb-1 text-sm uppercase tracking-wider">Email</h4>
                            <p class="text-slate-300">{{ $pengaturan->email ?? 'penjaminanmutu@poltekkesmedan.ac.id' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 group">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 group-hover:bg-blue-500 transition-colors">
                            <span class="material-symbols-outlined text-3xl">schedule</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-200 mb-1 text-sm uppercase tracking-wider">Jam Layanan</h4>
                            <p class="text-slate-300">{{ $pengaturan->operational_hours ?? 'Senin - Jumat: 08.00 - 16.00 WIB' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kontak & Peta -->
            <div class="space-y-8">
                <!-- Peta Google Maps -->
                <div class="bg-white p-4 rounded-[3rem] shadow-soft border border-slate-100">
                    <div class="w-full h-[300px] bg-slate-200 rounded-[2.5rem] overflow-hidden relative group">
                        @if($pengaturan && $pengaturan->google_maps_embed)
                            {!! $pengaturan->google_maps_embed !!}
                        @else
                            <div class="absolute inset-0 bg-black/5 flex items-center justify-center cursor-pointer">
                                <div class="bg-white px-6 py-3 rounded-full font-bold text-slate-700 shadow-lg flex items-center gap-2 group-hover:scale-105 transition-transform cursor-pointer">
                                    <span class="material-symbols-outlined text-red-500">pin_drop</span>
                                    Buka di Google Maps
                                </div>
                            </div>
                            <img src="https://via.placeholder.com/800x600/e2e8f0/94a3b8?text=Peta+Lokasi+Kampus" class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>

                <!-- Form Sederhana -->
                <div class="bg-white/60 backdrop-blur-xl p-8 md:p-10 rounded-[3rem] shadow-soft border border-white">
                    <h3 class="text-xl font-bold text-slate-800 mb-6">Kirim Pesan Cepat</h3>
                    
                    @if (session()->has('success'))
                        <div class="mb-6 bg-green-50 text-green-700 border border-green-200 rounded-2xl p-4 flex items-center gap-3">
                            <span class="material-symbols-outlined">check_circle</span>
                            <p class="font-medium text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    <form wire:submit.prevent="submit" class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <input wire:model="name" type="text" placeholder="Nama Lengkap" class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <input wire:model="email" type="email" placeholder="Alamat Email" class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <textarea wire:model="message" rows="4" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                            @error('message') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-bold py-3 px-8 rounded-xl shadow-lg w-full transition-all cursor-pointer flex justify-center items-center gap-2">
                            <span wire:loading.remove wire:target="submit">Kirim Pesan</span>
                            <span wire:loading wire:target="submit">Mengirim...</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </main>
</div>