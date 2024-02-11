<?php

namespace App\Filament\Resources\TestResource\RelationManagers;

use App\Filament\TiptapBlocks\DetailsBlock;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
//                TiptapEditor::make('extra_attributes.content')
//                    ->profile('simple')
//                    ->output(TiptapOutput::Json)
//                    ->columnSpanFull(),
//                Forms\Components\Repeater::make('extra_attributes.sections')
//                    ->schema([
//                        TiptapEditor::make('content')
//                            ->profile('simple')
//                            ->output(TiptapOutput::Json),
//                    ])
//                    ->columnSpanFull(),

                TableRepeater::make('extra_attributes')
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                    ])
                    ->columnSpanFull()
                    ->live(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->slideOver(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->slideOver(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
