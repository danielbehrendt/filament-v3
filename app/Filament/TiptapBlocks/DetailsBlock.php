<?php

namespace App\Filament\TiptapBlocks;

use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;

class DetailsBlock extends TiptapBlock
{
    public string $preview = 'blocks.details.preview';

    public string $rendered = 'blocks.details.rendered';

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
        ];
    }
}
