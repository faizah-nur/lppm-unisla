<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JournalSourceResource\Pages;
use App\Models\JournalSource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JournalSourceResource extends Resource
{
    protected static ?string $model = JournalSource::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'Sumber Jurnal';

    protected static ?string $navigationGroup = 'Penelitian';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Sumber Jurnal';

    protected static ?string $pluralModelLabel = 'Sumber Jurnal';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Portal')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Portal')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('source_type')
                        ->label('Jenis Sumber')
                        ->options([
                            'ojs' => 'Open Journal Systems (OJS)',
                            'other' => 'Portal Lainnya',
                        ])
                        ->default('ojs')
                        ->required(),

                    Forms\Components\TextInput::make('base_url')
                        ->label('URL Portal')
                        ->url()
                        ->required()
                        ->maxLength(500),

                    Forms\Components\TextInput::make('oai_endpoint')
                        ->label('OAI-PMH Endpoint')
                        ->url()
                        ->maxLength(1000)
                        ->helperText(
                            'Contoh: https://domain.ac.id/index.php/index/oai'
                        ),
                ])
                ->columns(2),

            Forms\Components\Section::make('Pengaturan Sinkronisasi')
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),

                    Forms\Components\DateTimePicker::make('last_synced_at')
                        ->label('Sinkronisasi Terakhir')
                        ->disabled()
                        ->dehydrated(false),

                    Forms\Components\Textarea::make('last_sync_message')
                        ->label('Pesan Sinkronisasi')
                        ->disabled()
                        ->dehydrated(false)
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Portal')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('source_type')
                    ->label('Jenis')
                    ->badge(),

                Tables\Columns\TextColumn::make('base_url')
                    ->label('Alamat Portal')
                    ->limit(35)
                    ->url(fn (JournalSource $record) => $record->base_url)
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('journals_count')
                    ->label('Jumlah Jurnal')
                    ->counts('journals'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('last_synced_at')
                    ->label('Sinkronisasi Terakhir')
                    ->dateTime('d M Y H:i')
                    ->placeholder('Belum pernah'),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJournalSources::route('/'),
            'create' => Pages\CreateJournalSource::route('/create'),
            'edit' => Pages\EditJournalSource::route('/{record}/edit'),
        ];
    }
}
