<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSliderResource\Pages;
use App\Models\HeroSlider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroSliderResource extends Resource
{
    protected static ?string $model = HeroSlider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Hero Slider';

    protected static ?string $modelLabel = 'Hero Slider';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Slider')
                    ->schema([
                        Forms\Components\TextInput::make('tagline')
                            ->label('Tagline (Opsional)')
                            ->maxLength(255)
                            ->placeholder('Contoh: Selamat Datang'),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul Utama')
                            ->required()
                            ->maxLength(255)
                            ->validationMessages([
                                'required' => 'Judul utama wajib diisi.',
                            ]),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->minLength(10)
                            ->maxLength(500)
                            ->rows(3)
                            ->columnSpanFull()
                            ->validationMessages([
                                'required' => 'Deskripsi wajib diisi.',
                                'min' => 'Deskripsi minimal 10 karakter.',
                            ]),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Background')
                            ->image()
                            ->disk('public')
                            ->directory('hero-sliders')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Disarankan landscape (16:9), minimal 1200px lebar. Maks 5MB.')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('btn_text')
                            ->label('Teks Tombol (Opsional)')
                            ->maxLength(255)
                            ->placeholder('Contoh: Selengkapnya'),

                        Forms\Components\TextInput::make('btn_link')
                            ->label('Link Tombol (Opsional)')
                            ->maxLength(255)
                            ->nullable() // Izinkan kosong
                            ->placeholder('Contoh: /profil, #visi-misi, atau https://example.com')
                            ->rule('regex:/^(\/|#|https?:\/\/).*/') // Hanya validasi jika DIISI
                            ->helperText('Boleh dikosongkan. Bisa berupa path (/profil), anchor (#visi), atau URL lengkap.')
                            ->validationMessages([
                                'regex' => 'Format link tidak valid. Gunakan /, #, atau http(s)://.',
                            ]),
                    ])->columns(2),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->default(0)
                            ->required()
                            ->helperText('Angka lebih kecil tampil lebih dulu.')
                            ->validationMessages([
                                'required' => 'Urutan tampil wajib diisi.',
                                'min' => 'Urutan tidak boleh negatif.',
                                'integer' => 'Urutan harus berupa angka bulat.',
                            ]),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Beranda')
                            ->default(true)
                            ->helperText('Jika dimatikan, slider tidak akan muncul di beranda.'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->height(50)
                    ->width(80),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable(),
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
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSliders::route('/'),
            'create' => Pages\CreateHeroSlider::route('/create'),
            'edit' => Pages\EditHeroSlider::route('/{record}/edit'),
        ];
    }
}
