<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnershipDocumentResource\Pages;
use App\Models\PartnershipDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnershipDocumentResource extends Resource
{
    protected static ?string $model = PartnershipDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Profil Lembaga';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Dokumen Kerjasama';

    protected static ?string $modelLabel = 'Dokumen Kerjasama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dokumen')
                    ->schema([
                        Forms\Components\Select::make('partner_id')
                            ->label('Pilih Mitra')
                            ->relationship('partner', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                // Bisa langsung tambah mitra dari sini jika belum ada
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Mitra Baru')
                                    ->required(),
                            ]),

                        Forms\Components\Select::make('type')
                            ->label('Jenis Dokumen')
                            ->options([
                                'MoU' => 'MoU (Nota Kesepahaman)',
                                'MoA' => 'MoA (Perjanjian Kerjasama)',
                                'SPK' => 'SPK (Surat Perintah Kerja)',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul Kerjasama')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('document_number')
                            ->label('Nomor Dokumen')
                            ->helperText('Biarkan kosong jika belum tercatat.')
                            ->maxLength(255),

                        Forms\Components\Select::make('status')
                            ->label('Status Dokumen')
                            ->options([
                                'Aktif' => 'Aktif',
                                'Dalam Proses' => 'Dalam Proses',
                                'Kedaluwarsa' => 'Kedaluwarsa',
                            ])
                            ->default('Dalam Proses')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Masa Berlaku & Arsip')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai'),
                            
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Berakhir'),

                        Forms\Components\Toggle::make('is_archived')
                            ->label('Tandai sebagai Arsip Berantai')
                            ->helperText('Aktifkan jika dokumen ini merupakan tautan/arsip dari dokumen sebelumnya.'),
                    ])->columns(2),

                Forms\Components\Section::make('File Dokumen')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Upload File (PDF)')
                            ->directory('partnership-documents')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240) // Maks 10MB
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('partner.name')
                    ->label('Mitra')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Kerjasama')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'MoU' => 'info',
                        'MoA' => 'success',
                        'SPK' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('document_number')
                    ->label('No. Dokumen')
                    ->default('-')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Dalam Proses' => 'warning',
                        'Kedaluwarsa' => 'danger',
                    }),
                Tables\Columns\IconColumn::make('is_archived')
                    ->label('Arsip')
                    ->boolean(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Filter Jenis')
                    ->options([
                        'MoU' => 'MoU',
                        'MoA' => 'MoA',
                        'SPK' => 'SPK',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Dalam Proses' => 'Dalam Proses',
                        'Kedaluwarsa' => 'Kedaluwarsa',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartnershipDocuments::route('/'),
            'create' => Pages\CreatePartnershipDocument::route('/create'),
            'edit' => Pages\EditPartnershipDocument::route('/{record}/edit'),
        ];
    }
}