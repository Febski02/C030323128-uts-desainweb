<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\TrainingParticipant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TrainingParticipantResource\Pages;
use App\Filament\Resources\TrainingParticipantResource\RelationManagers;

class TrainingParticipantResource extends Resource
{
    protected static ?string $model = TrainingParticipant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('training_id')
                ->relationship('training', 'title')
                ->required(),
            Forms\Components\Select::make('farmer_id')
                ->relationship('farmer', 'name')
                ->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'registered' => 'Terdaftar',
                    'attended' => 'Hadir',
                    'completed' => 'Selesai',
                    'cancelled' => 'Dibatalkan',
                ])
                ->required(),
        ]);
                
        
    }

    public static function table(Table $table): Table
    {
        return $table
                ->columns([
                    Tables\Columns\TextColumn::make('training.title')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('farmer.name')
                        ->searchable(),
                    Tables\Columns\BadgeColumn::make('status')
                        ->colors([
                            'secondary' => 'registered',
                            'primary' => 'attended',
                            'success' => 'completed',
                            'danger' => 'cancelled',
                        ]),
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
            'index' => Pages\ListTrainingParticipants::route('/'),
            'create' => Pages\CreateTrainingParticipant::route('/create'),
            'edit' => Pages\EditTrainingParticipant::route('/{record}/edit'),
        ];
    }
}
