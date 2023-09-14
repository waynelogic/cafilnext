<?php

namespace Waynelogic\Corporate\Filament\Resources;

use Waynelogic\Corporate\Filament\Resources\BannerResource\Pages;
use Waynelogic\Corporate\Filament\Resources\BannerResource\RelationManagers;
use Waynelogic\Corporate\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    protected static ?string $navigationGroup = 'Corporate';
    protected static ?string $navigationLabel =  'Баннеры';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationIcon = 'heroicon-o-gift';
    protected static ?string $activeNavigationIcon = 'heroicon-s-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make()->schema([

                    Forms\Components\TextInput::make('title')
                        ->label('Заголовок')
                        ->required(),

                    Forms\Components\TextInput::make('subtitle')
                        ->label('Подзаголовок'),

                    Forms\Components\Textarea::make('text')
                        ->label('Текст'),

                ]),
                Forms\Components\Section::make('Картинки')->schema([

                    SpatieMediaLibraryFileUpload::make('background')
                        ->collection('banner-backgrounds')
                        ->label('Задний фон'),

                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('banner-images')
                        ->label('Картинка'),

                ])->columns(2),

                Forms\Components\Section::make('Кнопки')->schema([
                    Forms\Components\Repeater::make('buttons')->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Текст')
                            ->required(),

                        Forms\Components\TextInput::make('url')
                            ->label('Ссылка')
                            ->prefix(env('APP_URL') . '/')
                            ->suffixIcon('heroicon-m-globe-alt')
                            ->required(),
                    ])
                ]),

                Forms\Components\Section::make('')->schema([
                    Forms\Components\Toggle::make('active')
                        ->default(true)
                        ->label('Включен'),
                    Forms\Components\Select::make('theme')
                        ->default('light')
                        ->label('Тема')
                        ->options([
                            'light' => 'Светлая',
                            'dark' => 'Темная',
                        ]),

                ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('background')
                    ->label('Обложка')
                    ->collection('banner-backgrounds'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->limit(30),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Подзаголовок'),
                Tables\Columns\TextColumn::make('text')
                    ->label('Текст')
                    ->limit(50),



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
            'index' => BannerResource\Pages\ListBanners::route('/'),
            'create' => BannerResource\Pages\CreateBanner::route('/create'),
            'edit' => BannerResource\Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
