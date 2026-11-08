<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SintaResearcherResource\Pages;
use App\Jobs\SyncSintaResearchersJob;
use App\Models\SintaResearcher;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SintaResearcherResource extends Resource
{
    protected static ?string $model = SintaResearcher::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make('sync_sinta')
                    ->label('Sinkronisasi Data SINTA')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Mulai Sinkronisasi Data?')
                    ->modalDescription('Proses ini akan mengambil data ratusan peneliti dari SINTA dan memakan waktu beberapa menit. Lanjutkan?')
                    ->action(function () {
                        // Panggil Job (berjalan di background)
                        SyncSintaResearchersJob::dispatch('2093');

                        // Beri notifikasi ke Admin
                        Notification::make()
                            ->title('Sinkronisasi Dimulai')
                            ->body('Data sedang ditarik dari SINTA di belakang layar. Silakan tunggu 5-10 menit lalu refresh halaman ini.')
                            ->success()
                            ->send();
                    }),
            ])
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Foto')
                    ->circular()
                    ->defaultImageUrl(url('/images/default-avatar.png')), // Siapkan gambar default

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Peneliti')
                    ->description(fn ($record) => $record->study_program) // Menampilkan prodi di bawah nama
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sinta_id')
                    ->label('SINTA ID')
                    ->searchable(),

                Tables\Columns\TextColumn::make('sinta_score_3yr')
                    ->label('SINTA Score 3Yr')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('scopus_hindex')
                    ->label('Scopus H-Index')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('gs_hindex')
                    ->label('GS H-Index')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('last_synced_at')
                    ->label('Terakhir Sinkron')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // EditAction::make(), // Matikan edit manual
                Tables\Actions\Action::make('buka_sinta')
                    ->label('Buka Profil')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn ($record) => $record->profile_url)
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->defaultSort('sinta_score_3yr', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Karena data hanya masuk lewat proses Sinkronisasi
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSintaResearchers::route('/'),
            'create' => Pages\CreateSintaResearcher::route('/create'),
            'edit' => Pages\EditSintaResearcher::route('/{record}/edit'),
        ];
    }
}
