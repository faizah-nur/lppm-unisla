<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KknNewsResource\Pages;
use App\Models\KknNews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KknNewsResource extends Resource
{
    protected static ?string $model = KknNews::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'KKN';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Informasi KKN';
    protected static ?string $modelLabel = 'Berita KKN';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Berita')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Berita')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->required()
                            ->default(now())
                            ->native(false),
                            
                        Forms\Components\Toggle::make('is_active')
                            ->label('Terbitkan Berita')
                            ->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Media Berita')
                    ->description('Unggah maksimal 3 gambar ATAU masukkan link video (boleh keduanya).')
                    ->schema([
                        Forms\Components\FileUpload::make('images')
                            ->label('Gambar Berita')
                            ->image()
                            ->multiple()
                            ->maxFiles(3)
                            ->maxSize(2048) // 2MB
                            ->disk('public')
                            ->directory('kkn-news-images')
                            ->reorderable()
                            ->panelLayout('grid')
                            ->helperText('Gambar pertama otomatis menjadi cover.'),

                        Forms\Components\TextInput::make('video_url')
                            ->label('Link Video (Opsional)')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...'),
                    ])->columns(2),

                Forms\Components\Section::make('Isi Berita')
                    ->schema([
                        Forms\Components\RichEditor::make('content')
                            ->label('Konten Berita')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images.0')
                    ->label('Cover')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Berita')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
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
            'index' => Pages\ListKknNews::route('/'),
            'create' => Pages\CreateKknNews::route('/create'),
            'edit' => Pages\EditKknNews::route('/{record}/edit'),
        ];
    }
}