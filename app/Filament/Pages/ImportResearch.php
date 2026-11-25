<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\GrantsPenelitianImport;
use Filament\Notifications\Notification;

class ImportResearch extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';
    protected static ?string $navigationLabel = 'Import Riset';
    protected static ?string $navigationGroup = 'Penelitian & Pengabdian';
    protected static ?int $navigationSort = 3;
    protected static ?string $title = 'Upload Data Riset (Excel)';

    protected static string $view = 'filament.pages.import-research';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('file_research')
                    ->label('File Research')
                    ->acceptedFileTypes(['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'])
                    ->maxSize(1024) // 1MB
                    ->required()
                    ->helperText('Allowed file format: .csv, .xls, .xlsx | Maximum file size: 1MB'),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        
        // Ambil path file yang di-upload (Filament menyimpannya di storage publik sementara)
        $filePath = storage_path('app/public/' . $data['file_research']);
        
        try {
            Excel::import(new GrantsPenelitianImport, $filePath);
            
            Notification::make()
                ->title('Berhasil!')
                ->body('Data penelitian berhasil di-import ke sistem.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Gagal Import')
                ->body('Terjadi kesalahan: ' . $e->getMessage())
                ->danger()
                ->send();
        }

        $this->form->fill(); // Reset form
    }
}