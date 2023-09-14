<?php

namespace Waynelogic\Corporate\Filament\Resources;

use Waynelogic\Corporate\Filament\Resources\EmployeeResource\Pages;
use Waynelogic\Corporate\Filament\Resources\EmployeeResource\RelationManagers;
use Waynelogic\Corporate\Models\Employee;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationGroup = 'Corporate';
    protected static ?string $navigationLabel = 'Сотрудники';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $activeNavigationIcon = 'heroicon-s-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('ФИО')->schema([
                    Forms\Components\Grid::make([
                        'default' => 1,
                        'md' => 3
                    ])->schema([
                        Forms\Components\TextInput::make('last_name')
                            ->label('Фамилия')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label('Имя')
                            ->required(),
                        Forms\Components\TextInput::make('middle_name')
                            ->label('Отчество'),
                    ])
                ]),

                Forms\Components\Section::make('Данные')->schema([
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label('Телефон')
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->email(),
                        Forms\Components\TextInput::make('post')
                            ->label('Должность')
                            ->required(),
                        Forms\Components\Select::make('department_id')
                            ->label('Отдел')
                            ->relationship('department', 'name')
                            ->searchable(),
                        Forms\Components\Textarea::make('preview_text')
                            ->label('Короткое описание')
                            ->columnSpan('full'),
                    ])
                ]),

                Forms\Components\Section::make('Аватар')->schema([
                    SpatieMediaLibraryFileUpload::make('avatar')
                        ->collection('avatars'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('avatar')
                    ->label('Аватар')
                    ->collection('avatars'),

                Tables\Columns\TextColumn::make('last_name')
                    ->label('Фамилия')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('middle_name')
                    ->label('Отчество')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('department.name')
                    ->label('Отдел')
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
            'index' => EmployeeResource\Pages\ListEmployees::route('/'),
            'create' => EmployeeResource\Pages\CreateEmployee::route('/create'),
            'edit' => EmployeeResource\Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
