<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Client;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ClientResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientResource\RelationManagers;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function getTitle(): string
    {
        return __('client.client');
    }

    public static function getLabel(): ?string
    {
        return __('client.client');
    }

    public static function getNavigationLabel(): string
    {
        return __('client.clients');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('client.client_info'))
                    ->columns([
                        'default' => 2
                    ])
                    ->schema([
                        TextInput::make('name')
                            ->label(__('client.name'))
                            ->required(),

                        TextInput::make('email')
                            ->label(__('client.email'))
                            ->email(),

                        TextInput::make('phone')
                            ->label(__('client.phone'))
                            ->rules(['max:15'])
                            ->mask(RawJs::make(<<<'JS'
                                $input.length <= 14 ? '(99) 9999-9999' : '(99) 99999-9999'
                        JS)),

                        TextInput::make('cpf')
                            ->label(__('client.cpf'))
                            ->mask('999.999.999-99'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('client.name'))
                    ->searchable(),

                TextColumn::make('email')
                    ->label(__('client.email')),

                TextColumn::make('phone')
                    ->label(__('client.phone')),

                TextColumn::make('cpf')
                    ->label(__('client.cpf')),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
