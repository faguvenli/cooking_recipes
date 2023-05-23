<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeResource\Pages;
use App\Filament\Resources\RecipeResource\RelationManagers;
use App\Models\Recipe;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $modelLabel = 'Tarif';
    protected static ?string $pluralModelLabel = 'Tarifler';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Grid::make()->schema([
                        Toggle::make('is_active')
                            ->default(true)
                            ->label('Aktif'),
                    ]),
                ]),
                Card::make()->schema([
                    SpatieMediaLibraryFileUpload::make('cover_image')->collection('recipe_covers')
                        ->label('Kapak Görseli')
                        ->disk('recipe_path')
                        ->responsiveImages()
                        ->hint('800x600')
                        ->image()
                        ->visibility('public')
                        ->maxSize(1024)
                        ->preserveFilenames()
                        ->imagePreviewHeight(150),

                    \Camya\Filament\Forms\Components\TitleWithSlugInput::make(
                        fieldTitle: 'title', // The name of the field in your model that stores the title.
                        fieldSlug: 'slug', // The name of the field in your model that will store the slug.
                        titleLabel: 'Yemek Adı',
                        titlePlaceholder: 'Yemek Adı',
                        slugLabel: 'Link',
                    ),

                    RichEditor::make('summary')
                        ->label('Özet'),

                    RichEditor::make('description')
                        ->label('Açıklama'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('title')
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover_image')
                    ->collection('recipe_covers')
                    ->conversion('preview')
                ->label('Kapak Görseli'),
                Tables\Columns\TextColumn::make('title')
                    ->words(10)
                    ->searchable()
                    ->sortable()
                    ->label('Yemek Adı'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->sortable()
            ])
            ->defaultSort('sort')
            ->reorderable()
            ->filters([
                Filter::make('is_active')
                    ->label('Aktif')
                    ->query(fn(Builder $query): Builder => $query->where('is_active', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
