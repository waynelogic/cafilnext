<?php

namespace App\Filament\Resources\FormRecordResource\Pages;

use App\Filament\Resources\FormRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
