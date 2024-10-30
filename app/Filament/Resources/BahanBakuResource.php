<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\BahanBaku;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use GuzzleHttp\Psr7\UploadedFile;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BahanBakuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BahanBakuResource\RelationManagers;
use Livewire\Features\SupportFileUploads\FileUploadConfiguration;

class BahanBakuResource extends Resource
{
    protected static ?string $model = BahanBaku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_bahan')->required(), 
                TextInput::make('stok'),
                TextInput::make('harga'),
                TextInput::make('kategori'),
                FileUpload::make('image')
                                    ->image()
                                    ->disk('public') // Menyimpan ke disk public
                                    ->directory('images/bahan_bakus') // Atur direktori penyimpanan
                                    ->label('Gambar') 
            ]);
    }
    // [ 'nama_bahan','Stok','harga','kategori' /
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_bahan'),
                TextColumn::make('stok'),
                TextColumn::make('harga'),
                TextColumn::make('kategori'),
                ImageColumn::make('image')->label('Gambar'),                 

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
            'index' => Pages\ListBahanBakus::route('/'),
            'create' => Pages\CreateBahanBaku::route('/create'),
            'edit' => Pages\EditBahanBaku::route('/{record}/edit'),
        ];
    }
}
