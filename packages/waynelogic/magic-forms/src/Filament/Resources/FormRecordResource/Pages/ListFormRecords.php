<?php

namespace Waynelogic\MagicForms\Filament\Resources\FormRecordResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Waynelogic\MagicForms\Filament\Resources\FormRecordResource;

class ListFormRecords extends ListRecords
{
    protected static string $resource = FormRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
