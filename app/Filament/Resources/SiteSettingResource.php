<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->disabled(fn (?SiteSetting $record) => $record !== null),
                        Forms\Components\Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'image' => 'Image',
                            ])
                            ->required()
                            ->live(),
                        Forms\Components\TextInput::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'text'),
                        Forms\Components\Textarea::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'textarea'),
                        Forms\Components\FileUpload::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'image')
                            ->image()
                            ->directory('settings'),
                        Forms\Components\TextInput::make('group')
                            ->default('general'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('group')
                    ->badge(),
                Tables\Columns\TextColumn::make('value')
                    ->limit(50),
                Tables\Columns\TextColumn::make('updated_at')
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiteSettings::route('/'),
        ];
    }
}
