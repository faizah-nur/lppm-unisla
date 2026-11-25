<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KknStepResource\Pages;
use App\Models\KknStep;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KknStepResource extends Resource
{
    protected static ?string $model = KknStep::class;
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = 'KKN';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Alur Pendaftaran';
    protected static ?string $modelLabel = 'Langkah KKN';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Langkah')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Langkah')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Select::make('icon')
                            ->label('Ikon (Heroicon)')
                            ->options([
                                'document-text' => 'Dokumen',
                                'user-plus' => 'Tambah User',
                                'currency-dollar' => 'Pembayaran',
                                'check-badge' => 'Verifikasi / Seleksi',
                                'megaphone' => 'Pengumuman',
                                'map-pin' => 'Lokasi / Penerjunan',
                                'academic-cap' => 'Pendidikan',
                            ])
                            ->default('document-text')
                            ->required(),
                            
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Tampil')
                            ->required()
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(3),

                Forms\Components\Section::make('Lampiran (Opsional)')
                    ->description('Pilih salah satu: Upload file PDF ATAU masukkan link GDrive.')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Upload File Panduan (PDF)')
                            ->disk('public')
                            ->directory('kkn-documents')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240) // 10MB
                            ->live()
                            ->disabled(fn (Get $get): bool => filled($get('external_url'))),

                        Forms\Components\TextInput::make('external_url')
                            ->label('Atau Link GDrive')
                            ->url()
                            ->placeholder('https://drive.google.com/...')
                            ->live(onBlur: true)
                            ->disabled(fn (Get $get): bool => filled($get('file_path'))),
                    ])->columns(2),
                    
                Forms\Components\Toggle::make('is_active')
                    ->label('Tampilkan di Halaman Depan')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order') // Bisa drag & drop
            ->defaultSort('order', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('No')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Langkah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(40),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
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
            'index' => Pages\ListKknSteps::route('/'),
            'create' => Pages\CreateKknStep::route('/create'),
            'edit' => Pages\EditKknStep::route('/{record}/edit'),
        ];
    }
}