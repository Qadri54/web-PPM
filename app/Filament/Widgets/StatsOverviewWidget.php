<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Dokumen;
use App\Models\Galeri;
use App\Models\Banner;

class StatsOverviewWidget extends BaseWidget
{
    // Mengatur agar widget ini tampil paling atas
    protected static ?int $sort = 1;
    
    // Refresh otomatis setiap 10 detik
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $totalDokumen = Dokumen::count();
        $totalGaleri = Galeri::count();
        
        $activeBanners = Banner::where('is_active', true)->count();
        $totalBanners = Banner::count();

        return [
            Stat::make('Total Dokumen & SOP', $totalDokumen)
                ->description('Seluruh dokumen penjaminan mutu')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
                
            Stat::make('Total Foto Galeri', $totalGaleri)
                ->description('Dokumentasi kegiatan yang tayang')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success'),
                
            Stat::make('Banner Aktif', $activeBanners . ' / ' . $totalBanners)
                ->description('Banner yang tampil di halaman depan')
                ->descriptionIcon('heroicon-m-presentation-chart-line')
                ->color('warning'),
        ];
    }
}
