<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\EventRegistration;
use App\Models\Hki;
use App\Models\Information;
use App\Models\Journal;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = -2;

    protected function getStats(): array
    {
        $bookCount = Book::count();
        $journalCount = Journal::count();
        $hkiCount = Hki::count();
        $infoCount = Information::count();
        $registrationCount = EventRegistration::count();

        return [
            Stat::make('Publikasi Ilmiah', number_format($bookCount + $journalCount))
                ->description("{$bookCount} Buku & {$journalCount} Jurnal")
                ->descriptionIcon('heroicon-m-book-open')
                ->color('primary'),

            Stat::make('Kekayaan Intelektual', number_format($hkiCount))
                ->description('Paten, Hak Cipta & Merek')
                ->descriptionIcon('heroicon-m-document-check')
                ->color('success'),

            Stat::make('Informasi & Agenda', number_format($infoCount))
                ->description('Kegiatan & Berita Terbit')
                ->descriptionIcon('heroicon-m-megaphone')
                ->color('warning'),

            Stat::make('Pendaftar Event', number_format($registrationCount))
                ->description('Peserta Kegiatan Kampus')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),
        ];
    }
}
