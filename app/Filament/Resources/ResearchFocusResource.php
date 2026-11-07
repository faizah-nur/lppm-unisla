<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResearchFocusResource\Pages;
use App\Models\ResearchFocus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ResearchFocusResource extends Resource
{
    protected static ?string $model = ResearchFocus::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationLabel = 'Fokus Penelitian';

    protected static ?string $modelLabel = 'Fokus Penelitian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Fokus')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Jadikan Card Besar (Utama)')
                    ->helperText('Hanya boleh ada satu yang aktif. Card utama akan mengambil gambar besar.'),
                Forms\Components\TextInput::make('order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Fokus Penelitian')
                    ->image()
                    ->disk('public')
                    ->directory('research-focuses')
                    ->maxSize(5120) // Maks 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('Wajib diisi untuk Card Utama (Featured). Untuk card kecil, gambar ini disembunyikan.')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Card Utama')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResearchFoci::route('/'),
            'create' => Pages\CreateResearchFocus::route('/create'),
            'edit' => Pages\EditResearchFocus::route('/{record}/edit'),
        ];
    }
}
