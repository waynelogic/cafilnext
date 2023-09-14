<?php

namespace Waynelogic\Corporate\Filament\Resources;

use Waynelogic\Corporate\Filament\Resources\PartnerResource\Pages;
use Waynelogic\Corporate\Filament\Resources\PartnerResource\RelationManagers;
use Waynelogic\Corporate\Models\Partner;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => PartnerResource\Pages\ListPartners::route('/'),
            'create' => PartnerResource\Pages\CreatePartner::route('/create'),
            'edit' => PartnerResource\Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
