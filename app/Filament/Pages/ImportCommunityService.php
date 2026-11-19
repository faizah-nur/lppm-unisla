<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GrantsPengabdianImport;
use Filament\Notifications\Notification;

class ImportCommunityService extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';
    protected static ?string $navigationLabel = 'Import Pengabdian';
    protected static ?string $navigationGroup = 'Manajemen Hibah';
    protected static ?string $title = 'Upload Community Services';

    protected static string $view = 'filament.pages.import-community-service';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('file_community_service')
                    ->label('File Community Services')
                    ->acceptedFileTypes(['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'])
                    ->maxSize(1024)
                    ->required()
                    ->helperText('Allowed file format: .csv, .xls, .xlsx | Maximum file size: 1MB'),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        $filePath = storage_path('app/public/' . $data['file_community_service']);
        
        try {
            Excel::import(new GrantsPengabdianImport, $filePath);
            
            Notification::make()
                ->title('Berhasil!')
                ->body('Data pengabdian berhasil di-import ke sistem.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Gagal Import')
                ->body('Terjadi kesalahan: ' . $e->getMessage())
                ->danger()
                ->send();
        }

        $this->form->fill();
    }
}