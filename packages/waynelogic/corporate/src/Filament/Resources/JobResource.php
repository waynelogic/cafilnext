<?php

namespace Waynelogic\Corporate\Filament\Resources;

use Waynelogic\Corporate\Filament\Resources\JobResource\Pages;
use Waynelogic\Corporate\Filament\Resources\JobResource\RelationManagers;
use Waynelogic\Corporate\Models\Job;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationGroup = 'Corporate';
    protected static ?string $navigationLabel = 'Вакансии';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $activeNavigationIcon = 'heroicon-s-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([

                    Forms\Components\Section::make()->schema([
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
                            ->unique(Job::class, 'slug', ignoreRecord: true),

                        Forms\Components\Textarea::make('preview_text')
                            ->label('Короткое описание')
                    ]),

                    Forms\Components\Section::make('Данные')->schema([

                        Forms\Components\TextInput::make('salary')
                            ->label('Зарплата')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('experience')
                            ->label('Стаж')
                            ->required(),

                        Forms\Components\Select::make('department_id')
                            ->label('Отдел')
                            ->relationship('department', 'name')
                            ->searchable(),

                        Forms\Components\Select::make('type')
                            ->label('Тип')
                            ->options(Job::getTypeOptions())
                    ])->columns(2),

                    Forms\Components\RichEditor::make('content')
                        ->label('Полное описание'),

                ])->columnSpan(['lg' => 3]),

                Forms\Components\Section::make('')->schema([

                    Forms\Components\Toggle::make('active')
                        ->label('Видимость')
                        ->helperText('Показывать пользователям.')
                        ->default(true),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Дата показа')
                ])->columnSpan(['lg' => 1]),


            ])->columns(4);
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
            'index' => JobResource\Pages\ListJobs::route('/'),
            'create' => JobResource\Pages\CreateJob::route('/create'),
            'edit' => JobResource\Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
