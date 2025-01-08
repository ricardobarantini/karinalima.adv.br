<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lawsuit;
use App\Enums\CourtEnum;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\PaymentTypeEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LawsuitResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LawsuitResource\RelationManagers;

class LawsuitResource extends Resource
{
    protected static ?string $model = Lawsuit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function getTitle(): string
    {
        return __('lawsuit.lawsuit');
    }

    public static function getLabel(): ?string
    {
        return __('lawsuit.lawsuit');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('lawsuit.lawsuit_info'))
                    ->columns([
                        'default' => 3
                    ])
                    ->schema([
                        Select::make('client_id')
                            ->label(__('lawsuit.client'))
                            ->relationship('client', 'name')
                            ->required()
                            ->preload(),

                        TextInput::make('case_number')
                            ->label(__('lawsuit.case_number'))
                            ->required(),

                        TextInput::make('case_type')
                            ->label(__('lawsuit.case_type'))
                            ->required(),

                        Select::make('court')
                            ->label(__('lawsuit.court'))
                            ->options(CourtEnum::class)
                            ->required(),
                    ]),

                Section::make(__('lawsuit.lawsuit_fee'))
                    ->columns([
                        'default' => 3
                    ])
                    ->schema([
                        TextInput::make('legal_fee')
                            ->label(__('lawsuit.legal_fee'))
                            ->required(),

                        Select::make('payment_type')
                            ->label(__('lawsuit.payment_type'))
                            ->options(PaymentTypeEnum::class)
                            ->required(),

                        DatePicker::make('due_date')
                            ->label(__('lawsuit.due_date'))
                            ->native(false)
                            ->displayFormat('d')
                            ->required(),
                    ]),

                Section::make(__('lawsuit.lawsuit_additional_info'))
                    ->columns([
                        'default' => 1
                    ])
                    ->schema([
                        RichEditor::make('notes')
                            ->label(__('lawsuit.notes'))
                            ->columnSpan(2)
                    ])
            ]);
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
            'index' => Pages\ListLawsuits::route('/'),
            'create' => Pages\CreateLawsuit::route('/create'),
            'edit' => Pages\EditLawsuit::route('/{record}/edit'),
        ];
    }
}
