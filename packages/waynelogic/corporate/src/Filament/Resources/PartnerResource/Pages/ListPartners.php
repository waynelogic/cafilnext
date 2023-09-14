<?php

namespace Waynelogic\Corporate\Filament\Resources\PartnerResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Waynelogic\Corporate\Filament\Resources\PartnerResource;

class ListPartners extends ListRecords
{
    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
