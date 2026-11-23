<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Inovasi & Hilirisasi'; // Saya pisahkan dari Publikasi
    protected static ?string $navigationLabel = 'Produk / Jasa';
    protected static ?string $modelLabel = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Produk/Jasa')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Produk / Jasa')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                            
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Teknologi Tepat Guna' => 'Teknologi Tepat Guna',
                                'Pangan & Pertanian' => 'Pangan & Pertanian',
                                'Jasa Konsultasi / Laboratorium' => 'Jasa Konsultasi / Laboratorium',
                                'UMKM Binaan' => 'UMKM Binaan',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->required(),
                            
                        Forms\Components\DatePicker::make('creation_date')
                            ->label('Tanggal Pembuatan / Rilis')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->required(),
                            
                        Forms\Components\TextInput::make('creator')
                            ->label('Nama Pencipta / Pengembang')
                            ->required()
                            ->helperText('Jika lebih dari satu, pisahkan dengan koma.'),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Media & Tautan')
                    ->schema([
                        Forms\Components\FileUpload::make('images')
                            ->label('Gambar Produk / Jasa')
                            ->image()
                            ->multiple()
                            ->maxFiles(3)
                            ->maxSize(5120) // 5MB
                            ->disk('public')
                            ->directory('product-images')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '4:3',
                                '16:9',
                                '1:1',
                            ])
                            ->reorderable() 
                            ->panelLayout('grid')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Maksimal 3 gambar. Format: JPG, PNG, WEBP. Ukuran maks 5MB/gambar. Geser gambar untuk menentukan urutan (gambar pertama menjadi cover).'),
                            
                        Forms\Components\TextInput::make('link_url')
                            ->label('Link Eksternal (Opsional)')
                            ->url()
                            ->placeholder('https://shopee.co.id/...'),
                    ])->columns(2),
                    
                Forms\Components\Toggle::make('is_active')
                    ->label('Tampilkan di Website')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Mengambil gambar cover dari accessor model
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->disk('public')
                    ->square()
                    ->state(fn (Product $record): ?string => $record->cover_image),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('creator')
                    ->label('Pencipta')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Teknologi Tepat Guna' => 'Teknologi Tepat Guna',
                        'Pangan & Pertanian' => 'Pangan & Pertanian',
                        'Jasa Konsultasi / Laboratorium' => 'Jasa Konsultasi / Laboratorium',
                    ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}