<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Product Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General Information')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Select::make('collection_id')
                                            ->relationship('collection', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload(),
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique(ignoreRecord: true),
                                    ]),
                                Forms\Components\RichEditor::make('description')
                                    ->columnSpanFull(),
                                Forms\Components\KeyValue::make('specifications')
                                    ->keyLabel('Feature')
                                    ->valueLabel('Detail')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->label('Main Image')
                                    ->directory('products'),
                                Forms\Components\FileUpload::make('gallery')
                                    ->multiple()
                                    ->image()
                                    ->label('Gallery Images')
                                    ->directory('products/gallery'),
                            ]),
                        Forms\Components\Tabs\Tab::make('Marketing & SEO')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Featured Product'),
                                        Forms\Components\Toggle::make('is_best_seller')
                                            ->label('Best Seller'),
                                    ]),
                                Forms\Components\TextInput::make('meta_title')
                                    ->placeholder('SEO Title'),
                                Forms\Components\Textarea::make('meta_description')
                                    ->placeholder('SEO Description'),
                            ]),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('collection.name')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                Tables\Columns\IconColumn::make('is_best_seller')
                    ->boolean()
                    ->label('Best Seller'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('collection')
                    ->relationship('collection', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
