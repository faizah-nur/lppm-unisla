<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    // Ubah icon dan label agar lebih rapi di sidebar
    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Visi, Misi & Sejarah';

    protected static ?string $modelLabel = 'Profil Lembaga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Visi & Misi')
                    ->schema([
                        Forms\Components\Textarea::make('vision')
                            ->label('Visi')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('mission')
                            ->label('Misi')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Sejarah')
                    ->schema([
                        Forms\Components\RichEditor::make('history')
                            ->label('Sejarah LPPM')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    // Karena kita tidak butuh tabel, kita bisa kosongkan atau hapus method table()
    // Namun Filament mewajibkan method ini ada di Resource, jadi kita buat minimalis.
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kita tampilkan potongan teks Visi sebagai representasi data
                Tables\Columns\TextColumn::make('vision')
                    ->label('Visi')
                    ->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime(),
            ])
            ->actions([
                // Tombol Edit untuk memunculkan modal form
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProfiles::route('/'),
        ];
    }
}
