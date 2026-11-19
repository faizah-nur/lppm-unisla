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
                            ->required(),

                        Forms\Components\DateTimePicker::make('registration_end')
                            ->label('Selesai Pendaftaran')
                            ->required()
                            ->after('registration_start'),

                        Forms\Components\DateTimePicker::make('event_date')
                            ->label('Tanggal Pelaksanaan Event')
                            ->required()
                            ->after('registration_end'),
                    ])->columns(3),

                Forms\Components\Section::make('Pengaturan Sertifikat')
                    ->description('Unggah template sertifikat kosong (PNG/JPG). Sistem akan mencetak nama dan NIP di atasnya.')
                    ->schema([
                        Forms\Components\FileUpload::make('certificate_template_path')
                            ->label('Template Sertifikat')
                            ->image()
                            ->directory('certificate-templates')
                            ->helperText('Disarankan menggunakan gambar landscape resolusi tinggi.'),

                        Forms\Components\TextInput::make('cert_x_position')
                            ->label('Posisi X Teks (Pixel)')
                            ->numeric()
                            ->default(500)
                            ->helperText('Jarak dari kiri gambar.'),

                        Forms\Components\TextInput::make('cert_y_position')
                            ->label('Posisi Y Teks (Pixel)')
                            ->numeric()
                            ->default(400)
                            ->helperText('Jarak dari atas gambar.'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('poster_path')
                    ->label('Brosur')
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
