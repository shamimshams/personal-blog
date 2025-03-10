<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use App\Filament\Resources\TransactionResource;
use App\Filament\Resources\TransactionResource\Pages\ManageTransactions;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget;

class TransactionSummary extends StatsOverviewWidget
{
    use InteractsWithPageTable;

    public array $tableColumnSearches = [];

    protected function getColumns(): int
    {
        return 3;
    }

    protected function getTablePage(): string
    {
        return ManageTransactions::class;
    }

    protected function getStats(): array
    {
        $income = $this->getPageTableQuery()->where('type', 'income')->sum('amount');
        $expense = $this->getPageTableQuery()->where('type', 'expense')->sum('amount');

        $balance = number_format(($income - $expense), 2);

        return [
            StatsOverviewWidget\Stat::make('Total Income', $income)
                ->color('success')
                ->icon('heroicon-o-banknotes'),

            StatsOverviewWidget\Stat::make('Total Expense', $expense)
                ->color('danger')
                ->icon('heroicon-o-banknotes'),

              StatsOverviewWidget\Stat::make('Balance', $balance)
                ->color('primary')
                ->icon('heroicon-o-banknotes'),
        ];
    }
}
