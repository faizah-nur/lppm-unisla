<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Kegiatan & Agenda';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Manajemen Event';

    protected static ?string $modelLabel = 'Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Event')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Event')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Event')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('poster_path')
                            ->label('Gambar / Brosur Event')
                            ->image()
                            ->disk('public')
                            ->directory('event-posters')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->required(),

                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi (Opsional)')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Waktu & Pelaksanaan')
                    ->schema([
                        Forms\Components\DateTimePicker::make('registration_start')
                            ->label('Mulai Pendaftaran')
                            ->native(false)
                            ->displayFormat('d/m/Y H:i')
                            ->seconds(false)
                            ->closeOnDateSelection(false)
                            ->validationAttribute('Mulai Pendaftaran')
                            ->required(),

                        Forms\Components\DateTimePicker::make('registration_end')
                            ->label('Selesai Pendaftaran')
                            ->native(false)
                            ->displayFormat('d/m/Y H:i')
                            ->seconds(false)
                            ->closeOnDateSelection(false)
                            ->validationAttribute('Selesai Pendaftaran')
                            ->required()
                            ->after('registration_start'),

                        Forms\Components\DateTimePicker::make('event_date')
                            ->label('Tanggal Pelaksanaan Event')
                            ->native(false)
                            ->displayFormat('d/m/Y H:i')
                            ->seconds(false)
                            ->closeOnDateSelection(false)
                            ->validationAttribute('Tanggal Pelaksanaan Event')
                            ->required()
                            ->after('registration_end'),
                    ])->columns(3),

                Forms\Components\Section::make('Pengaturan Sertifikat & Live Preview')
                    ->description('Atur font dan geser teks secara langsung pada gambar di bawah untuk menentukan posisinya.')
                    ->schema([
                        // 1. Input Upload Gambar
                        Forms\Components\FileUpload::make('certificate_template_path')
                            ->label('Template Sertifikat (PNG/JPG)')
                            ->image()
                            ->disk('public')
                            ->directory('certificate-templates')
                            ->helperText('Disarankan menggunakan gambar landscape resolusi tinggi.')
                            ->live() // Agar preview langsung update saat gambar diunggah
                            ->columnSpanFull(),

                        // 2. Pengaturan Font
                        Forms\Components\Grid::make(4)
                            ->schema([
                                Forms\Components\Select::make('cert_font_family')
                                    ->label('Jenis Font')
                                    ->options([
                                        'Arial' => 'Arial (Sans)',
                                        'Times New Roman' => 'Times New Roman (Serif)',
                                        'Courier New' => 'Courier (Monospace)',
                                        'Verdana' => 'Verdana',
                                    ])
                                    ->default('Arial')
                                    ->live()
                                    ->required(),

                                Forms\Components\TextInput::make('cert_font_size')
                                    ->label('Ukuran Font (Pixel)')
                                    ->numeric()
                                    ->default(40)
                                    ->live()
                                    ->required(),

                                Forms\Components\ColorPicker::make('cert_font_color')
                                    ->label('Warna Teks')
                                    ->default('#000000')
                                    ->live()
                                    ->required(),

                                Forms\Components\Toggle::make('cert_font_bold')
                                    ->label('Tebalkan (Bold)')
                                    ->default(false)
                                    ->live(),
                            ]),

                        // 3. Live Preview (Memanggil file blade kustom)
                        Forms\Components\View::make('filament.forms.certificate-preview')
                            ->viewData(function (Forms\Get $get) {
                                return [
                                    'template' => $get('certificate_template_path'),
                                    'x_pos' => $get('cert_x_position') ?? 500,
                                    'y_pos' => $get('cert_y_position') ?? 400,
                                    'font_size' => $get('cert_font_size') ?? 40,
                                    'font_color' => $get('cert_font_color') ?? '#000000',
                                    'font_family' => $get('cert_font_family') ?? 'Arial',
                                    'font_bold' => $get('cert_font_bold') ?? false,
                                ];
                            })
                            ->columnSpanFull(),

                        // 4. Hidden Fields untuk menyimpan koordinat hasil geser
                        Forms\Components\Hidden::make('cert_x_position'),
                        Forms\Components\Hidden::make('cert_y_position'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('poster_path')
                    ->label('Brosur')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Event')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('registration_end')
                    ->label('Tutup Pendaftaran')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('registrations_count')
                    ->label('Total Pendaftar')
                    ->counts('registrations')
                    ->badge()
                    ->color('success'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
