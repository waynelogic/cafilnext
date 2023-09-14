<?php

namespace Waynelogic\MagicForms\Filament\Resources\FormRecordResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Waynelogic\MagicForms\Filament\Resources\FormRecordResource;

class EditFormRecord extends EditRecord
{
    protected static string $resource = FormRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
