<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KknSchemeResource\Pages;
use App\Models\KknScheme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KknSchemeResource extends Resource
{
    protected static ?string $model = KknScheme::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'KKN';
    protected static ?string $navigationLabel = 'Skema KKN';
    protected static ?string $modelLabel = 'Skema';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Skema')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Skema')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('duration')
                            ->label('Durasi Pelaksanaan')
                            ->placeholder('Contoh: 45 Hari'),
                            
                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi Pelaksanaan')
                            ->placeholder('Contoh: Desa Binaan / Luar Negeri'),
                    ])->columns(2),

                Forms\Components\Section::make('Detail & Pendaftaran')
                    ->schema([
                        Forms\Components\RichEditor::make('requirements')
                            ->label('Persyaratan Peserta')
                            ->helperText('Gunakan fitur list untuk membuat poin-poin persyaratan.')
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('registration_url')
                            ->label('Link Pendaftaran (Opsional)')
                            ->url()
                            ->placeholder('https://forms.gle/... atau https://sistem.unisla.ac.id/...'),
                            
                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Website')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Nama Skema')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Durasi'),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi'),
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
            'index' => Pages\ListKknSchemes::route('/'),
            'create' => Pages\CreateKknScheme::route('/create'),
            'edit' => Pages\EditKknScheme::route('/{record}/edit'),
        ];
    }
}