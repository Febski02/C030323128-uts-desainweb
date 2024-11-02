<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Farmer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FarmerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FarmerResource\RelationManagers;

class FarmerResource extends Resource
{
    protected static ?string $model = Farmer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('phone')
                ->tel()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('address')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('farm_type')
                ->options([
                    'sawah' => 'Sawah',
                    'kebun' => 'Kebun',
                    'ternak' => 'Peternakan',
                    'campuran' => 'Campuran',
                ])
                ->required(),
            Forms\Components\TextInput::make('farm_size')
                ->numeric()
                ->label('Ukuran Lahan (Hektar)')
                ->nullable(),
        ]);
                
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('phone')
                ->searchable(),
            Tables\Columns\TextColumn::make('farm_type'),
            Tables\Columns\TextColumn::make('farm_size')
                ->label('Ukuran Lahan (Ha)'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),

                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFarmers::route('/'),
            'create' => Pages\CreateFarmer::route('/create'),
            'edit' => Pages\EditFarmer::route('/{record}/edit'),
        ];
    }
}
