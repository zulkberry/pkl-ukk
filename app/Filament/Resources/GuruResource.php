<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama')
                    ->maxLength(255),

                Forms\Components\TextInput::make('nip')
                    ->label('NIP')
                    ->required()
                    ->numeric()
                    ->mask('999999999999999999')
                    ->maxLength(255),

                Forms\Components\Select::make('gender')
                    ->label('Gender')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->placeholder('Jenis Kelamin')
                    ->required(),

                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->label('Alamat')
                    ->maxLength(255),

                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->label('Kontak')
                    ->maxLength(20)
                    ->tel()
                    ->dehydrateStateUsing(function ($state) {
                        if (str_starts_with($state, '0')) {
                            return '+62' . substr($state, 1);
                        }
                        return $state;
                    }),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->label('Email')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('foto')
                    ->label('Foto Guru')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->directory('guru-fotos')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->loadingIndicatorPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->removeUploadedFileButtonPosition('right')
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('nip')->searchable(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
                Tables\Columns\TextColumn::make('kontak')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->disk('public')
                    ->height(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGurus::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Guru';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Data Guru';
    }
}
