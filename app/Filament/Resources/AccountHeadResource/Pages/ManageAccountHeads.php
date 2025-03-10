<?php

namespace App\Filament\Resources\AccountHeadResource\Pages;

use App\Filament\Resources\AccountHeadResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAccountHeads extends ManageRecords
{
    protected static string $resource = AccountHeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->slideOver()->modalWidth('lg'),
        ];
    }
}
