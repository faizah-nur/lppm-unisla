<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationMemberResource\Pages;
use App\Models\OrganizationMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrganizationMemberResource extends Resource
{
    protected static ?string $model = OrganizationMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Struktur Organisasi';

    protected static ?string $modelLabel = 'Anggota Organisasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap & Gelar')
                    ->required()
                    ->maxLength(255)
                    ->validationMessages([
                        'required' => 'Nama wajib diisi.',
                    ]),

                Forms\Components\TextInput::make('position')
                    ->label('Jabatan')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: KETUA, SEKRETARIS')
                    ->validationMessages([
                        'required' => 'Jabatan wajib diisi.',
                    ]),

                Forms\Components\FileUpload::make('image')
                    ->label('Foto Profil')
                    ->image()
                    ->disk('public')
                    ->directory('organization-members')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('Opsional. Jika kosong, akan memakai foto default.')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->integer()
                    ->minValue(0)
                    ->default(0)
                    ->required()
                    ->helperText('Angka lebih kecil tampil lebih dulu. Contoh: 1, 2, 3, ...')
                    ->validationMessages([
                        'required' => 'Urutan tampil wajib diisi.',
                        'min' => 'Urutan tidak boleh negatif.',
                        'integer' => 'Urutan harus berupa angka bulat.',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->circular()
                    ->defaultImageUrl(url('img/default-avatar.png')), // fallback
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
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
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizationMembers::route('/'),
            'create' => Pages\CreateOrganizationMember::route('/create'),
            'edit' => Pages\EditOrganizationMember::route('/{record}/edit'),
        ];
    }
}
