<?php

namespace App\Filament\Resources\FormRecordResource\Pages;

use App\Filament\Resources\FormRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

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
