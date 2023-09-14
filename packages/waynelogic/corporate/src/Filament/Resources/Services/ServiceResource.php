<?php

namespace Waynelogic\Corporate\Filament\Resources\Services;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Waynelogic\Corporate\Filament\Resources\Services\ServiceResource\Pages;
use Waynelogic\Corporate\Filament\Resources\Services\ServiceResource\RelationManagers;
use Waynelogic\Corporate\Models\Services\Category;
use Waynelogic\Corporate\Models\Services\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationGroup = 'Услуги';
    protected static ?string $navigationLabel =  'Услуги';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-rectangle-stack';


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
                                    ->unique(Service::class, 'slug', ignoreRecord: true),
                                Forms\Components\TextInput::make('deadline')
                                    ->label('Срок выполнения'),
                                Forms\Components\TextInput::make('suitable_for')
                                    ->label('Для кого'),

                                Forms\Components\Textarea::make('preview_text')
                                    ->label('Короткое описание')
                                    ->columnSpan('full'),
                                Forms\Components\MarkdownEditor::make('description')
                                    ->label('Описание')
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('Images')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('cover')
                                    ->label('Обложка')
                                    ->collection('service-images'),
                                SpatieMediaLibraryFileUpload::make('media')
                                    ->collection('service-images')
                                    ->multiple()
                                    ->maxFiles(5)
                                    ->disableLabel(),
                            ])
                            ->collapsible(),

                        Forms\Components\Section::make('Ценовая политика')
                            ->schema([
                                Forms\Components\Select::make('price_type')
                                    ->label('Тип цены')
                                    ->options(self::getPriceTypeOptions()),
                                Forms\Components\TextInput::make('price')
                                    ->label('Цена')
                                    ->numeric()
                                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                                    ->required(),

                                Forms\Components\TextInput::make('old_price')
                                    ->label('Старая цена')
                                    ->numeric()
                                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/']),
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

                        Forms\Components\Section::make('Связи')->schema([
                            Forms\Components\Select::make('category_id')
                                ->label('Категория')
                                ->relationship('category', 'name')
                                ->searchable(),
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('cover')
                    ->label('Обложка')
                    ->collection('service-images'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('active')
                    ->label('Активность')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Цена')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->groups([
                Tables\Grouping\Group::make('category_id')
                    ->label('Категория')
                    ->getTitleFromRecordUsing(fn ($record) => Category::find($record->category_id)->name)
                    ->collapsible(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->reorderable('sort_order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPriceTypeOptions() {
        return [
            'one' => 'Разовая',
            'from' => 'От',
            'month' => 'мес.',
            'hour' => 'ч.',
            'depends' => 'Зависит от объема работ',
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \Waynelogic\Corporate\Filament\Resources\Services\ServiceResource\Pages\ListServices::route('/'),
            'create' => \Waynelogic\Corporate\Filament\Resources\Services\ServiceResource\Pages\CreateService::route('/create'),
            'edit' => \Waynelogic\Corporate\Filament\Resources\Services\ServiceResource\Pages\EditService::route('/{record}/edit'),
        ];
    }
}
