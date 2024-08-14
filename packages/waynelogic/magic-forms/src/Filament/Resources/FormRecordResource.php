<?php

namespace Waynelogic\MagicForms\Filament\Resources;

use Waynelogic\MagicForms\Filament\Resources\FormRecordResource\Pages;
use Waynelogic\MagicForms\Filament\Resources\FormRecordResource\RelationManagers;
use Waynelogic\MagicForms\Models\FormRecord;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FormRecordResource extends Resource
{
    protected static ?string $model = FormRecord::class;
    protected static ?string $pluralLabel = 'Записи';
    protected static ?string $navigationLabel = 'Magic Forms';
    protected static ?string $recordTitleAttribute = 'id';
    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $activeNavigationIcon = 'heroicon-s-bolt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('group')
                    ->label('Группа')
                    ->columnSpan('full'),
                Forms\Components\KeyValue::make('form_data')
                    ->label('Данные формы')
                    ->columnSpan('full')
                    ->disabled(),
                Forms\Components\Section::make('Геоинформация')->schema([
                    Forms\Components\TextInput::make('city')->label('Город')->prefixIcon('heroicon-m-home'),
                    Forms\Components\TextInput::make('country')->label('Страна')->prefixIcon('heroicon-m-globe-alt'),
                    Forms\Components\TextInput::make('ip')->label('IP')->prefixIcon('heroicon-m-cursor-arrow-ripple'),
                ])->columns(3),
            ])->disabled();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\IconColumn::make('unread')
                    ->label('Не прочитано')
                    ->icon(fn (bool $state) => match ($state) {
                        true => 'heroicon-m-exclamation-triangle',
                        false => 'heroicon-m-check',
                    })
                    ->color(fn (bool $state) => match ($state) {
                        true => 'success',
                        false => 'gray',
                    }),
                Tables\Columns\TextColumn::make('city')
                    ->label('Город')
                    ->icon('heroicon-m-globe-alt'),
                Tables\Columns\TextColumn::make('group')
                    ->label('Группа'),
                Tables\Columns\TextColumn::make('form_data')
                    ->label('Данные формы')
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable(),
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
            ->defaultSort('created_at', 'desc')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }


    public static function getNavigationBadge(): ?string
    {
        return static::$model::where('unread', true)->count();
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
