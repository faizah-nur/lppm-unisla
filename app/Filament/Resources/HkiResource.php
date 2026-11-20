<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HkiResource\Pages;
use App\Models\Hki;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HkiResource extends Resource
{
    protected static ?string $model = Hki::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Publikasi'; 
    protected static ?string $navigationLabel = 'Data HKI';
    protected static ?string $modelLabel = 'HKI';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Utama')
                    ->schema([
                        Forms\Components\Select::make('jenis_ki')
                            ->label('Jenis Kekayaan Intelektual')
                            ->options([
                                'Hak Cipta' => 'Hak Cipta',
                                'Paten' => 'Paten',
                                'Paten Sederhana' => 'Paten Sederhana',
                                'Desain Industri' => 'Desain Industri',
                            ])
                            ->required()
                            ->live(), // Agar form bisa bereaksi saat dipilih

                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Karya / Invensi')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('tahun_permohonan')
                            ->label('Tahun Permohonan')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('nomor_permohonan')
                            ->label('Nomor Permohonan'),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Paten (Abaikan jika Hak Cipta)')
                    ->schema([
                        Forms\Components\TextInput::make('nomor_publikasi')
                            ->label('Nomor Publikasi'),
                        Forms\Components\DatePicker::make('tanggal_publikasi')
                            ->label('Tanggal Publikasi'),
                        Forms\Components\DatePicker::make('tanggal_pengajuan')
                            ->label('Tanggal Pengajuan'),
                        Forms\Components\DatePicker::make('tanggal_penerimaan')
                            ->label('Tanggal Penerimaan'),
                    ])->columns(2),

                Forms\Components\Section::make('Pihak Terkait')
                    ->schema([
                        Forms\Components\Textarea::make('pemegang_paten')
                            ->label('Pemegang Paten / Hak Cipta')
                            ->rows(2)
                            ->helperText('Pisahkan dengan koma jika lebih dari satu.'),
                        Forms\Components\Textarea::make('inventor')
                            ->label('Inventor / Pencipta')
                            ->required()
                            ->rows(2)
                            ->helperText('Pisahkan dengan koma jika lebih dari satu.'),
                    ]),

                Forms\Components\Section::make('Status & Sertifikat')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'Dalam Proses' => 'Dalam Proses',
                                'Disetujui' => 'Disetujui',
                                'Tercatat' => 'Tercatat',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('nomor_sertifikat')
                            ->label('Nomor Sertifikat'),
                        Forms\Components\DatePicker::make('tanggal_sertifikat')
                            ->label('Tanggal Sertifikat'),
                    ])->columns(3),

                Forms\Components\Section::make('Abstrak / Deskripsi')
                    ->schema([
                        Forms\Components\RichEditor::make('abstrak')
                            ->label('Abstrak HKI')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_ki')
                    ->label('Jenis KI')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('inventor')
                    ->label('Inventor')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('tahun_permohonan')
                    ->label('Tahun')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Disetujui' => 'success',
                        'Tercatat' => 'primary',
                        'Dalam Proses' => 'warning',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis_ki')
                    ->label('Filter Jenis KI')
                    ->options([
                        'Hak Cipta' => 'Hak Cipta',
                        'Paten' => 'Paten',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'Disetujui' => 'Disetujui',
                        'Tercatat' => 'Tercatat',
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
            'index' => Pages\ListHkis::route('/'),
            'create' => Pages\CreateHki::route('/create'),
            'edit' => Pages\EditHki::route('/{record}/edit'),
        ];
    }
}