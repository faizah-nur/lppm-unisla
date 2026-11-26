<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformationResource\Pages;
use App\Models\Information;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InformationResource extends Resource
{
    protected static ?string $model = Information::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationGroup = 'Kegiatan & Agenda';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Informasi & Agenda';

    protected static ?string $modelLabel = 'Informasi Kegiatan';

    protected static ?string $pluralModelLabel = 'Informasi & Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kegiatan')
                    ->description('Lengkapi data kegiatan, unggah maksimal 3 foto dokumentasi dan/atau tautan video YouTube.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Kegiatan')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->required()
                            ->native(false)
                            ->default(now()),

                        // Input Tautan YouTube (bisa diisi sekaligus bersama gambar)
                        Forms\Components\TextInput::make('youtube_url')
                            ->label('URL Video YouTube (Opsional)')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->helperText('Masukkan tautan video YouTube jika ada liputan video.'),

                        // Input Gambar Dokumentasi (Maksimal 3 Foto)
                        Forms\Components\FileUpload::make('images')
                            ->label('Foto Dokumentasi (Maksimal 3 Gambar)')
                            ->image()
                            ->disk('public')
                            ->directory('informations')
                            ->multiple()
                            ->maxFiles(3)
                            ->maxSize(5120)
                            ->reorderable()
                            ->imageEditor()
                            ->columnSpanFull()
                            ->helperText('Unggah 1 sampai 3 foto dokumentasi kegiatan (JPG/PNG/WebP, maks. 5MB per file). Gambar pertama akan menjadi cover utama.'),

                        Forms\Components\RichEditor::make('content')
                            ->label('Isi / Uraian Kegiatan')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Cover')
                    ->getStateUsing(fn ($record) => $record->first_image)
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Kegiatan')
                    ->searchable()
                    ->limit(45),

                Tables\Columns\TextColumn::make('images_count')
                    ->label('Foto')
                    ->getStateUsing(fn ($record) => count($record->all_images))
                    ->badge()
                    ->color('success'),

                Tables\Columns\IconColumn::make('youtube_url')
                    ->label('Video YT')
                    ->boolean()
                    ->getStateUsing(fn ($record) => filled($record->youtube_url)),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Terbit')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
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
            'index' => Pages\ListInformation::route('/'),
            'create' => Pages\CreateInformation::route('/create'),
            'edit' => Pages\EditInformation::route('/{record}/edit'),
        ];
    }
}
