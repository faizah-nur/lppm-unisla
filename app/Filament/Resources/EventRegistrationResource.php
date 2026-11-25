<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventRegistrationResource\Pages;
use App\Jobs\GenerateAndSendCertificate;
use App\Models\EventRegistration; // <-- TAMBAHAN IMPORT JOB
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

 // <-- TAMBAHAN IMPORT NOTIFIKASI

class EventRegistrationResource extends Resource
{
    protected static ?string $model = EventRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Kegiatan & Agenda';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Data Pendaftar Event';

    protected static ?string $modelLabel = 'Pendaftar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->label('Event')
                    ->relationship('event', 'title')
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('full_name')
                    ->label('Nama Lengkap')
                    ->disabled(),
                Forms\Components\TextInput::make('nip_nidn')
                    ->label('NIP/NIDN')
                    ->disabled(),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.title')
                    ->label('Nama Event')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nip_nidn')
                    ->label('NIP/NIDN')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_certified')
                    ->label('Sertifikat Terkirim')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Daftar')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('event_id')
                    ->label('Filter Event')
                    ->relationship('event', 'title'),

                Tables\Filters\Filter::make('registration_closed')
                    ->label('Pendaftaran Sudah Berakhir')
                    ->query(fn (Builder $query): Builder => $query->whereHas('event', fn ($q) => $q->where('registration_end', '<', now()))),

                Tables\Filters\TernaryFilter::make('is_certified')
                    ->label('Status Sertifikat')
                    ->placeholder('Semua')
                    ->trueLabel('Sudah Dikirim')
                    ->falseLabel('Belum Dikirim'),
            ])
            ->actions([
                Tables\Actions\Action::make('send_certificate')
                    ->label('Kirim Sertifikat')
                    ->icon('heroicon-o-envelope')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Terbitkan & Kirim Sertifikat?')
                    ->modalDescription(fn ($record) => 'Sistem akan membuat sertifikat dan mengirimkannya ke email ' . $record->email . '.')
                    ->action(function ($record) {
                        GenerateAndSendCertificate::dispatch($record);

                        Notification::make()
                            ->title('Sertifikat Sedang Diproses')
                            ->body('Sertifikat untuk ' . $record->full_name . ' sedang dibuat dan dikirim ke email.')
                            ->success()
                            ->send();
                    })
                    ->visible(fn ($record) => ! $record->is_certified),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                    // ==========================================
                    // AKSI BARU: TERBITKAN SERTIFIKAT (LANGKAH 4.4)
                    // ==========================================
                    Tables\Actions\BulkAction::make('generate_certificate')
                        ->label('Terbitkan & Kirim Sertifikat')
                        ->icon('heroicon-o-envelope')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Terbitkan Sertifikat?')
                        ->modalDescription('Sistem akan membuat sertifikat berdasarkan template event dan mengirimkannya ke email masing-masing pendaftar yang dipilih. Pastikan event sudah selesai terlaksana.')
                        ->action(function (Collection $records) {
                            $count = 0;
                            foreach ($records as $record) {
                                // Hanya proses yang belum dapat sertifikat
                                if (! $record->is_certified) {
                                    GenerateAndSendCertificate::dispatch($record);
                                    $count++;
                                }
                            }

                            Notification::make()
                                ->title('Proses Antrean Dimulai')
                                ->body($count.' sertifikat sedang dibuat dan akan dikirim ke email pendaftar secara bertahap.')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventRegistrations::route('/'),
            'create' => Pages\CreateEventRegistration::route('/create'),
            'edit' => Pages\EditEventRegistration::route('/{record}/edit'),
        ];
    }
}
