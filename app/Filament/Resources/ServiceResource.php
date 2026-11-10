<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get; // Penting untuk logika reaktif
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';

    protected static ?string $navigationLabel = 'Layanan & Download';

    protected static ?string $modelLabel = 'Layanan / Dokumen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dokumen')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Dokumen')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Panduan' => 'Panduan',
                                'RENSTRA' => 'RENSTRA',
                                'Surat Izin Orang Tua' => 'Surat Izin Orang Tua',
                                'Layanan Lainnya' => 'Layanan Lainnya',
                            ])
                            ->required()
                            ->searchable(),

                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Tampil')
                            ->required()
                            ->numeric()
                            ->default(0),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat (Opsional)')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Sumber File')
                    ->description('Pilih salah satu: Upload file langsung ATAU masukkan link GDrive.')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Upload File (PDF/Docx)')
                            ->disk('public')
                            ->directory('services')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            ])
                            ->maxSize(10240) // Maksimal 10MB
                            ->live() // Memicu reaktivitas Livewire
                            // Logika: Disable jika external_url diisi
                            ->disabled(fn (Get $get): bool => filled($get('external_url'))),

                        Forms\Components\TextInput::make('external_url')
                            ->label('Atau Link GDrive / URL Eksternal')
                            ->url()
                            ->placeholder('https://drive.google.com/...')
                            ->live(onBlur: true) // Memicu reaktivitas Livewire saat pindah kolom
                            // Logika: Disable jika file_path diisi
                            ->disabled(fn (Get $get): bool => filled($get('file_path'))),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Dokumen')
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                Tables\Columns\IconColumn::make('file_path')
                    ->label('File Server')
                    ->boolean()
                    ->getStateUsing(fn ($record) => filled($record->file_path)),
                Tables\Columns\IconColumn::make('external_url')
                    ->label('Link GDrive')
                    ->boolean()
                    ->getStateUsing(fn ($record) => filled($record->external_url)),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('category', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
