<div>
    <!-- HERO SECTION -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 py-16 md:py-24 relative overflow-hidden mb-12">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Dokumen & SOP</h1>
            <p class="text-blue-100 text-lg md:text-xl font-light">
                Pusat repositori dokumen kebijakan, manual mutu, standar, dan formulir operasional.
            </p>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 mb-20">
        <div class="bg-white/60 backdrop-blur-xl p-8 md:p-12 rounded-[2.5rem] shadow-soft border border-white">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div class="flex gap-3 w-full md:w-auto">
                    <div x-data="{ open: false }" class="relative w-full md:w-72">
                        <button @click="open = !open" @click.outside="open = false" type="button" class="w-full bg-white border border-slate-200 text-slate-700 rounded-full px-6 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm font-medium flex justify-between items-center transition-all cursor-pointer">
                            <span class="truncate">
                                @if($kategoriId)
                                    {{ $kategoris->firstWhere('id', $kategoriId)->name ?? 'Semua Kategori' }}
                                @else
                                    Semua Kategori
                                @endif
                            </span>
                            <svg class="w-4 h-4 text-slate-400 transition-transform duration-200 shrink-0 ml-2" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95 translate-y-[-10px]"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-95 translate-y-[-10px]"
                             class="absolute z-50 w-full mt-2 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 overflow-hidden" 
                             style="display: none;">
                             
                             <button wire:click="$set('kategoriId', '')" @click="open = false" type="button" class="w-full text-left px-6 py-3 text-sm transition-colors {{ $kategoriId == '' ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50 cursor-pointer' }}">
                                Semua Kategori
                             </button>
                             @foreach($kategoris as $kategori)
                             <button wire:click="$set('kategoriId', '{{ $kategori->id }}')" @click="open = false" type="button" class="w-full text-left px-6 py-3 text-sm transition-colors {{ $kategoriId == $kategori->id ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50 cursor-pointer' }}">
                                {{ $kategori->name }}
                             </button>
                             @endforeach
                        </div>
                    </div>
                </div>
                <div class="relative w-full md:w-80">
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari kode atau nama dokumen..." class="w-full bg-white border border-slate-200 text-slate-700 rounded-full pl-12 pr-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <svg class="w-5 h-5 text-slate-400 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <!-- Tabel Modern -->
            <div class="overflow-x-auto rounded-2xl border border-slate-100 bg-white">
                <table class="w-full text-left border-collapse min-w-[800px]">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-xs uppercase tracking-widest text-slate-500 font-bold">
                            <th class="p-5 w-16 text-center">No</th>
                            <th class="p-5">Kode Dokumen</th>
                            <th class="p-5">Nama Dokumen</th>
                            <th class="p-5">Kategori</th>
                            <th class="p-5 text-center">Tahun</th>
                            <th class="p-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($dokumens as $index => $dokumen)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/80 transition-colors">
                            <td class="p-5 text-center text-slate-400 font-medium">{{ $dokumens->firstItem() + $index }}</td>
                            <td class="p-5 font-mono text-slate-600 bg-slate-50/50">{{ $dokumen->code ?? '-' }}</td>
                            <td class="p-5 font-bold text-slate-800 text-base">{{ $dokumen->name }}</td>
                            <td class="p-5">
                                <span class="inline-block whitespace-nowrap bg-blue-50 text-blue-700 px-4 py-1.5 rounded-full text-xs font-bold border border-blue-100">
                                    {{ $dokumen->kategori->name ?? 'Umum' }}
                                </span>
                            </td>
                            <td class="p-5 text-center text-slate-500 font-medium">{{ $dokumen->tahun_terbit ?? '-' }}</td>
                            <td class="p-5">
                                <div class="flex flex-col md:flex-row justify-end items-center gap-2">
                                @if($dokumen->file_path)
                                <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank" class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-xl transition-colors inline-flex items-center justify-center w-full md:w-auto gap-2 shadow-sm font-semibold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> 
                                    Lihat
                                </a>
                                <a href="{{ asset('storage/' . $dokumen->file_path) }}" download class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-4 py-2 rounded-xl transition-colors inline-flex items-center justify-center w-full md:w-auto gap-2 shadow-sm shadow-blue-500/30 font-semibold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg> 
                                    Unduh
                                </a>
                                @else
                                <span class="text-slate-400 italic text-xs text-right w-full">Tidak ada file</span>
                                @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-500">
                                <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Tidak ada dokumen ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Controls -->
            <div class="mt-8">
                {{ $dokumens->links() }}
            </div>
        </div>
    </main>
</div>