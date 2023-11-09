<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestResource\Pages;
use App\Filament\Resources\TestResource\RelationManagers;
use App\Models\Test;
use Awcodes\Shout\Components\Shout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestResource extends Resource
{
    protected static ?string $model = Test::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(\Filament\Forms\Form $form): Form
    {
        return $form
            ->schema([
                \Awcodes\Shout\Components\Shout::make('test')->content('Please read this!')
                    ->columnSpanFull(),
//                \Filament\Forms\Components\Repeater::make('categories')
//                    ->schema([
//                        \Filament\Forms\Components\TextInput::make('name')->required(),
//                        \Filament\Forms\Components\CheckboxList::make('options')
//                            ->options([
//                                'is_public' => 'Public',
//                                'is_searchable' => 'Searchable',
//                            ])
//                            ->required(),
//                    ])
//                    ->minItems(3)
//                    ->columnSpanFull(),
                TiptapEditor::make('categories')
                    //->profile('default|simple|minimal|none|custom')
                    //->output(TiptapOutput::Html) // optional, change the format for saved data, default is html
                    //->maxContentWidth('5xl')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTests::route('/'),
            'create' => Pages\CreateTest::route('/create'),
            'edit' => Pages\EditTest::route('/{record}/edit'),
        ];
    }
}
