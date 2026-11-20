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
    protected static ?string $navigationGroup = 'Publikasi'; 
    protected static ?string $navigationLabel = 'Data Buku';
    protected static ?string $modelLabel = 'Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('isbn')
                    ->label('ISBN')
                    ->maxLength(20),
                    
                Forms\Components\TextInput::make('title')
                    ->label('Judul Buku')
                    ->required()
                    ->columnSpanFull(),
                    
                Forms\Components\Textarea::make('author')
                    ->label('Penulis / Author')
                    ->required()
                    ->rows(2)
                    ->columnSpanFull(),
                    
                Forms\Components\Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'Buku Referensi' => 'Buku Referensi',
                        'Buku Monograf' => 'Buku Monograf',
                        'Buku Ajar' => 'Buku Ajar',
                        'Buku Umum' => 'Buku Umum',
                    ]),
                    
                Forms\Components\TextInput::make('publisher')
                    ->label('Penerbit'),
                    
                Forms\Components\TextInput::make('city')
                    ->label('Kota'),
                    
                Forms\Components\TextInput::make('year')
                    ->label('Tahun Terbit')
                    ->numeric()
                    ->required(),
                    
                Forms\Components\TextInput::make('pages')
                    ->label('Jumlah Halaman')
                    ->numeric(),
                    
                Forms\Components\FileUpload::make('cover_image')
                    ->label('Cover Buku')
                    ->image()
                    ->directory('book-covers')
                    ->imageResizeMode('contain')
                    ->imageCropAspectRatio('2:3') // Rasio standar buku
                    ->maxSize(1024),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->height(60),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),
                Tables\Columns\TextColumn::make('publisher')
                    ->label('Penerbit'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}