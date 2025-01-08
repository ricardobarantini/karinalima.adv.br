<?php

namespace App\Filament\Resources\LawsuitResource\Pages;

use App\Filament\Resources\LawsuitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLawsuit extends EditRecord
{
    protected static string $resource = LawsuitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
