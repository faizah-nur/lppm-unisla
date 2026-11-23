<?php

namespace App\Providers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gunakan non-native JS picker agar state tidak ter-reset saat re-render Livewire
        DatePicker::configureUsing(function (DatePicker $component): void {
            $component->native(false)
                ->displayFormat('d/m/Y');
        });

        DateTimePicker::configureUsing(function (DateTimePicker $component): void {
            $component->native(false)
                ->displayFormat('d/m/Y H:i');
        });

        // Pastikan default storage disk file upload & image column di Filament selalu public
        FileUpload::configureUsing(function (FileUpload $component): void {
            $component->disk('public');
        });

        ImageColumn::configureUsing(function (ImageColumn $column): void {
            $column->disk('public');
        });
    }
}
