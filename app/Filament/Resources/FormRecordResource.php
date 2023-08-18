<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormRecordResource\Pages;
use App\Filament\Resources\FormRecordResource\RelationManagers;
use App\Models\FormRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormRecordResource extends Resource
{
    protected static ?string $model = FormRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('ip')
                    ->label('IP'),
                Forms\Components\TextInput::make('group')
                    ->label('Группа'),
                Forms\Components\KeyValue::make('form_data')
                    ->label('Данные формы')
                    ->columnSpan('full')
                    ->disabled(true)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('ip')->label('IP'),
                Tables\Columns\TextColumn::make('group')->label('Группа'),
                Tables\Columns\TextColumn::make('form_data')->label('Данные формы'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime(),
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
            'index' => Pages\ListFormRecords::route('/'),
            'create' => Pages\CreateFormRecord::route('/create'),
            'edit' => Pages\EditFormRecord::route('/{record}/edit'),
        ];
    }
}
