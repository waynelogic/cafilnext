<?php

namespace Waynelogic\Corporate\Filament\Resources\Services;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Waynelogic\Corporate\Filament\Resources\Services\CategoryResource\Pages;
use Waynelogic\Corporate\Filament\Resources\Services\CategoryResource\RelationManagers;
use Waynelogic\Corporate\Models\Services\Category;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationGroup = 'Услуги';
    protected static ?string $navigationLabel =  'Категории';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Название')
                                    ->required()
                                    ->maxValue(50)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->dehydrated()
                                    ->required()
                                    ->unique(Category::class, 'slug', ignoreRecord: true),
                            ]),

                        Forms\Components\MarkdownEditor::make('description')
                            ->label('Description'),


                        SpatieMediaLibraryFileUpload::make('cover')
                            ->collection('services-category-images')
                            ->label('Картинка'),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()->schema([

                    Forms\Components\Section::make('')->schema([
                        Forms\Components\Select::make('parent_id')
                            ->label('Родительская категория')
                            ->relationship('parent', 'name', fn (Builder $query) => $query->where('parent_id', null))
                            ->searchable()
                            ->placeholder('Select parent category'),

                        Forms\Components\Toggle::make('active')
                            ->label('Visible to customers.')
                            ->default(true),
                    ]),

                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Created at')
                                ->content(fn (Category $record): ?string => $record->created_at?->diffForHumans()),

                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn (Category $record): ?string => $record->updated_at?->diffForHumans()),
                        ])
                        ->hidden(fn (?Category $record) => $record === null),

                ])->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('cover')
                    ->label('Обложка')
                    ->collection('services-category-images'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Родитель')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Активность')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Дата изменения')
                    ->date('d/m/y H:i')
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
            'index' => \Waynelogic\Corporate\Filament\Resources\Services\CategoryResource\Pages\ListCategories::route('/'),
            'create' => \Waynelogic\Corporate\Filament\Resources\Services\CategoryResource\Pages\CreateCategory::route('/create'),
            'edit' => \Waynelogic\Corporate\Filament\Resources\Services\CategoryResource\Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
