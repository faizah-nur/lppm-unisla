<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JournalResource\Pages;
use App\Models\Journal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JournalResource extends Resource
{
    protected static ?string $model = Journal::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    
    // Mengelompokkan menu dalam grup 'Publikasi'
    protected static ?string $navigationGroup = 'Publikasi'; 
    protected static ?string $navigationLabel = 'Direktori Jurnal';
    protected static ?string $modelLabel = 'Jurnal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Jurnal')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Jurnal')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\TextInput::make('external_url')
                            ->label('Link URL Jurnal')
                            ->url()
                            ->required()
                            ->helperText('Contoh: https://jurnal.unisla.ac.id/index.php/ijasc'),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Cover Jurnal')
                            ->image()
                            ->directory('journal-covers')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('3:4') // Rasio cover buku/jurnal
                            ->required(),
                            
                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Website')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->height(80),
                Tables\Columns\TextColumn::make('title')
                    ->label('Nama Jurnal')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('external_url')
                    ->label('Link')
                    ->limit(30)
                    ->url(fn (Journal $record): string => $record->external_url, true), // Buka di tab baru
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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
            'index' => Pages\ListJournals::route('/'),
            'create' => Pages\CreateJournal::route('/create'),
            'edit' => Pages\EditJournal::route('/{record}/edit'),
        ];
    }
}