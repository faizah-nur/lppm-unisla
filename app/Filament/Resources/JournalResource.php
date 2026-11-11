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

    protected static ?string $navigationLabel = 'Direktori Jurnal';

    protected static ?string $navigationGroup = 'Penelitian';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Jurnal';

    protected static ?string $pluralModelLabel = 'Direktori Jurnal';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Identitas Jurnal')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Nama Jurnal')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\Select::make('journal_source_id')
                        ->label('Portal Sumber')
                        ->relationship('source', 'name')
                        ->searchable()
                        ->preload(),

                    Forms\Components\TextInput::make('publisher')
                        ->label('Penerbit'),

                    Forms\Components\TextInput::make('p_issn')
                        ->label('P-ISSN'),

                    Forms\Components\TextInput::make('e_issn')
                        ->label('E-ISSN'),

                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->rows(5)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Informasi Website')
                ->schema([
                    Forms\Components\TextInput::make('website_url')
                        ->label('Website Jurnal')
                        ->url()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('cover_url')
                        ->label('URL Gambar Sampul')
                        ->url()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Informasi SINTA')
                ->schema([
                    Forms\Components\TextInput::make('sinta_id')
                        ->label('ID Jurnal SINTA'),

                    Forms\Components\Select::make('sinta_rank')
                        ->label('Peringkat SINTA')
                        ->options([
                            'S1' => 'SINTA 1',
                            'S2' => 'SINTA 2',
                            'S3' => 'SINTA 3',
                            'S4' => 'SINTA 4',
                            'S5' => 'SINTA 5',
                            'S6' => 'SINTA 6',
                        ]),

                    Forms\Components\TextInput::make('sinta_url')
                        ->label('URL SINTA')
                        ->url()
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Status Data')
                ->schema([
                    Forms\Components\Select::make('metadata_source')
                        ->label('Sumber Metadata')
                        ->options([
                            'sinta' => 'SINTA',
                            'oai' => 'OAI-PMH',
                            'html' => 'HTML Scraping',
                        ]),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Tampilkan di Website')
                        ->default(true),

                    Forms\Components\DateTimePicker::make('last_synced_at')
                        ->label('Terakhir Disinkronkan')
                        ->disabled()
                        ->dehydrated(false),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_url')
                    ->label('Sampul')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Nama Jurnal')
                    ->searchable()
                    ->sortable()
                    ->description(fn (Journal $record) => $record->publisher),

                Tables\Columns\TextColumn::make('source.name')
                    ->label('Portal'),

                Tables\Columns\TextColumn::make('sinta_rank')
                    ->label('Akreditasi')
                    ->badge()
                    ->placeholder('Belum tersedia'),

                Tables\Columns\TextColumn::make('metadata_source')
                    ->label('Sumber Data')
                    ->badge(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Ditampilkan')
                    ->boolean(),

                Tables\Columns\TextColumn::make('last_synced_at')
                    ->label('Terakhir Sinkronisasi')
                    ->dateTime('d M Y H:i')
                    ->placeholder('Belum pernah'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('sinta_rank')
                    ->label('Peringkat SINTA')
                    ->options([
                        'S1' => 'SINTA 1',
                        'S2' => 'SINTA 2',
                        'S3' => 'SINTA 3',
                        'S4' => 'SINTA 4',
                        'S5' => 'SINTA 5',
                        'S6' => 'SINTA 6',
                    ]),

                Tables\Filters\SelectFilter::make('journal_source_id')
                    ->label('Portal Sumber')
                    ->relationship('source', 'name'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Tampilan'),
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
            'index' => Pages\ListJournals::route('/'),
            'edit' => Pages\EditJournal::route('/{record}/edit'),
        ];
    }

}
