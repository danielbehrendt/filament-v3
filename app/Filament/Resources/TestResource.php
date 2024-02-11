<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestResource\Pages;
use App\Models\Test;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestResource extends Resource
{
    protected static ?string $model = Test::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $options = [
            'a' => 'Butter',
            'b' => 'Eggs',
            'c' => 'Flour',
            'd' => 'Milk',
        ];

        return $form
            ->schema([
                Forms\Components\Select::make('options')
                    ->options(self::shuffleAssoc($options))
                    ->live(),
                Forms\Components\Radio::class::make('options2')
                    ->options(self::shuffleAssoc($options))
                    ->live(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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

//    public static function getRelations(): array
//    {
//        return [
//            RelationManagers\ItemsRelationManager::class,
//        ];
//    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTests::route('/'),
            'create' => Pages\CreateTest::route('/create'),
            'edit' => Pages\EditTest::route('/{record}/edit'),
        ];
    }

    public static function shuffleAssoc($list): array
    {
        if (!is_array($list)) {
            return $list;
        }

        $keys = array_keys($list);
        shuffle($keys);

        $random = [];

        foreach ($keys as $key) {
            $random[$key] = $list[$key];
        }

        return $random;
    }
}
