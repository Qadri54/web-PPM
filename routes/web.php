<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Beranda;
use App\Livewire\Profil\Struktur;
use App\Livewire\Profil\TugasFungsi;
use App\Livewire\Dokumen;
use App\Livewire\Galeri;
use App\Livewire\Kontak;

Route::get('/', Beranda::class);
Route::get('/profil/struktur', Struktur::class);
Route::get('/profil/tugas-fungsi', TugasFungsi::class);
Route::get('/dokumen', Dokumen::class);
Route::get('/galeri', Galeri::class);
Route::get('/kontak', Kontak::class);
