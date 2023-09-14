<?php

namespace Waynelogic\Corporate\Filament\Resources;

use Waynelogic\Corporate\Filament\Resources\DepartmentResource\Pages;
use Waynelogic\Corporate\Filament\Resources\DepartmentResource\RelationManagers;
use Waynelogic\Corporate\Models\Department;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;
    protected static ?string $navigationGroup = 'Corporate';
    protected static ?string $navigationLabel = 'Отделы';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $activeNavigationIcon = 'heroicon-s-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Название')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        $set('slug', \Str::slug($state));
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->dehydrated()
                                    ->required()
                                    ->unique(Department::class, 'slug', ignoreRecord: true),

                                Forms\Components\TextInput::make('address')
                                    ->label('Адрес'),

                                Forms\Components\TextInput::make('coordinates')
                                    ->label('Кординаты'),

                                Forms\Components\Repeater::make('phone')
                                    ->label('Телефоны')
                                    ->collapsed(true)
                                    ->schema([
                                        Forms\Components\TextInput::make('item')
                                            ->label('')
                                            ->tel()
                                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                                    ]),
                                Forms\Components\Repeater::make('email')
                                    ->label('Почта')
                                    ->collapsed(true)
                                    ->schema([
                                        Forms\Components\TextInput::make('item')->label('')->email(),
                                    ]),

                                Forms\Components\Textarea::make('preview_text')
                                    ->label('Короткое описание')
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Статус')
                            ->schema([
                                Forms\Components\Toggle::make('active')
                                    ->label('Видимость')
                                    ->helperText('Показывать пользователям.')
                                    ->default(true),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('address')
                    ->label('Адрес')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
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
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
