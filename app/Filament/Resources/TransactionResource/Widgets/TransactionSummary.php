<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use App\Filament\Resources\TransactionResource;
use App\Filament\Resources\TransactionResource\Pages\ManageTransactions;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget;
use Illuminate\Support\Number;

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
        $bankIncome = (float)$this->getPageTableQuery()->where('type', 'income')->sum('amount');
        $cashIncome = (float)$this->getPageTableQuery()->where('type', 'cashIncome')->sum('amount');
        $income = $bankIncome + $cashIncome;
        $expense = $this->getPageTableQuery()->where('type', 'expense')->sum('amount');
        $withdraw = $this->getPageTableQuery()->where('type', 'withdraw')->sum('amount');

        $balance = (($income+$withdraw) - $expense);
        $balanceInBank = $income - $withdraw;

        $cashInHand = max((($withdraw+$cashIncome)-$expense),0);

        return [
            StatsOverviewWidget\Stat::make('Total Income', Number::currency($income, 'BDT'))
                ->color('success')
                ->icon('heroicon-o-banknotes'),

            StatsOverviewWidget\Stat::make('Total Expense', Number::currency($expense, 'BDT'))
                ->color('danger')
                ->icon('heroicon-o-banknotes'),

            StatsOverviewWidget\Stat::make('Balance', Number::currency($balance, 'BDT'))
                ->color('primary')
                ->icon('heroicon-o-banknotes'),

            StatsOverviewWidget\Stat::make('Withdraw', Number::currency($withdraw, 'BDT'))
                ->color('primary')
                ->icon('heroicon-o-banknotes'),

            StatsOverviewWidget\Stat::make('Balance In Bank', Number::currency($balanceInBank, 'BDT'))
                ->color('primary')
                ->icon('heroicon-o-banknotes'),

              StatsOverviewWidget\Stat::make('Cash In Hand', Number::currency($cashInHand, 'BDT'))
                ->color('primary')
                ->icon('heroicon-o-banknotes'),
        ];
    }
}
