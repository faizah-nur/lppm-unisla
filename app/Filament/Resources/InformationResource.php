<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformationResource\Pages;
use App\Models\Information;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get; // Penting untuk reaktivitas
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InformationResource extends Resource
{
    protected static ?string $model = Information::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Informasi & Kegiatan';

    protected static ?string $modelLabel = 'Informasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Informasi')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Informasi')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Tanggal Terbit')
                            ->required()
                            ->default(now()),

                        // KOLOM YOUTUBE DILETAKKAN DI PALING ATAS (SETELAH JUDUL)
                        Forms\Components\TextInput::make('youtube_url')
                            ->label('URL YouTube (Opsional)')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->live(onBlur: true) // Memicu reaktivitas Livewire
                            ->helperText('Jika diisi, Cover Gambar akan dinonaktifkan dan video ini yang akan ditampilkan.'),

                        // KOLOM GAMBAR AKAN DISABLE JIKA YOUTUBE_URL TERISI
                        Forms\Components\FileUpload::make('image')
                            ->label('Cover Gambar (Opsional)')
                            ->image()
                            ->disk('public')
                            ->directory('informations')
                            ->maxSize(5120)
                            ->disabled(fn (Get $get): bool => filled($get('youtube_url'))) // Logika Livewire
                            ->helperText(fn (Get $get): string => filled($get('youtube_url'))
                                ? 'Gambar dinonaktifkan karena URL YouTube sudah diisi.'
                                : 'Gunakan gambar jika tidak ada video YouTube.'),

                        Forms\Components\RichEditor::make('content')
                            ->label('Isi / Detail Informasi')
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
                    ->defaultImageUrl(url('/images/placeholder.png')) // Fallback jika kosong
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\IconColumn::make('youtube_url')
                    ->label('Video YT')
                    ->boolean()
                    ->getStateUsing(fn ($record) => filled($record->youtube_url)),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Terbit')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc') // Urutkan dari yang terbaru
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
