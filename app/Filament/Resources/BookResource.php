<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Publikasi & KI';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Data Buku';

    protected static ?string $modelLabel = 'Buku';

    protected static ?string $pluralModelLabel = 'Data Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Buku')
                    ->schema([
                        Forms\Components\TextInput::make('isbn')
                            ->label('ISBN')
                            ->maxLength(25)
                            ->placeholder('Contoh: 978-602-xxxx-xx-x'),

                        Forms\Components\Select::make('category')
                            ->label('Kategori Buku')
                            ->options([
                                'Buku Referensi' => 'Buku Referensi',
                                'Buku Monograf' => 'Buku Monograf',
                                'Buku Ajar' => 'Buku Ajar',
                                'Buku Umum' => 'Buku Umum',
                            ])
                            ->placeholder('Pilih Kategori'),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul Buku')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('author')
                            ->label('Penulis / Author')
                            ->required()
                            ->rows(2)
                            ->helperText('Gunakan tanda koma (,) untuk memisahkan nama penulis jika lebih dari satu.')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('publisher')
                            ->label('Penerbit'),

                        Forms\Components\TextInput::make('city')
                            ->label('Kota Terbit'),

                        Forms\Components\TextInput::make('year')
                            ->label('Tahun Terbit')
                            ->numeric()
                            ->required()
                            ->minValue(1900)
                            ->maxValue((int) date('Y') + 1),

                        Forms\Components\TextInput::make('pages')
                            ->label('Jumlah Halaman')
                            ->numeric()
                            ->suffix('Halaman'),

                        // Input Tautan Google Drive
                        Forms\Components\TextInput::make('gdrive_url')
                            ->label('Tautan Google Drive')
                            ->url()
                            ->placeholder('https://drive.google.com/file/d/...')
                            ->helperText('Tautan Google Drive untuk membaca atau mengunduh buku (opsional).')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Cover Buku')
                            ->image()
                            ->disk('public')
                            ->directory('book-covers')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->columnSpanFull()
                            ->helperText('Unggah gambar sampul buku (JPG/PNG/WebP, maks. 5MB).'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->disk('public')
                    ->height(65),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(35)
                    ->tooltip(fn ($record) => $record->title),

                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->limit(25),

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),

                Tables\Columns\IconColumn::make('gdrive_url')
                    ->label('GDrive')
                    ->boolean()
                    ->getStateUsing(fn ($record) => filled($record->gdrive_url)),

                Tables\Columns\TextColumn::make('publisher')
                    ->label('Penerbit')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('year', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Buku Referensi' => 'Buku Referensi',
                        'Buku Monograf' => 'Buku Monograf',
                        'Buku Ajar' => 'Buku Ajar',
                        'Buku Umum' => 'Buku Umum',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('buka_gdrive')
                    ->label('GDrive')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('success')
                    ->url(fn ($record) => $record->gdrive_url, shouldOpenInNewTab: true)
                    ->visible(fn ($record) => filled($record->gdrive_url)),

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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
