<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Filament\Resources\TransactionResource\Widgets\TransactionSummary;
use App\Models\AccountHead;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('source')
                    ->label('Source')
                    ->options(AccountHead::pluck('name', 'id') )
                    ->required(),
                Radio::make('type')
                    ->label('Type')
                    ->options([
                        'income' => 'Income',
                        'expense' => 'Expense',
                    ])
                    ->required(),

                TextInput::make('amount')
                    ->label('Amount')
                    ->numeric()
                    ->default(0)
                    ->required(),

                DatePicker::make('transaction_date')
                    ->label('Date')
                    ->native(false)
                    ->default(now())
                    ->required(),

                Textarea::make('note')
                    ->label('Note'),


            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('accountHead.name')
                    ->label('Account Head'),
                TextColumn::make('transaction_date')->label('Transaction Date'),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('BDT')
                    ->icon(fn($record) => $record->type == 'income' ? 'heroicon-o-chevron-double-up': 'heroicon-o-chevron-double-down')
                    ->color(fn($record) => $record->type == 'income' ? 'success' : 'danger'),

                TextColumn::make('note')
                    ->limit(50)
                    ->tooltip(fn($record) => $record->note),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->slideOver()->modalWidth('lg'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ])
            ->emptyStateActions([
                //Tables\Actions\CreateAction::make(),
            ]);
    }


    public static function getWidgets(): array
    {
        return [
            TransactionSummary::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTransactions::route('/'),
        ];
    }
}
