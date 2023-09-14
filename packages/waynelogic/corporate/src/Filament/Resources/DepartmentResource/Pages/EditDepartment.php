<?php

namespace Waynelogic\Corporate\Filament\Resources\DepartmentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Waynelogic\Corporate\Filament\Resources\DepartmentResource;

class EditDepartment extends EditRecord
{
    protected static string $resource = DepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
