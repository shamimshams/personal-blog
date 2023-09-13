<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    TextInput::make('title')->placeholder(__('Title'))->required(),
                    RichEditor::make('summery')->required(),
                    TinyEditor::make('body')
                        ->toolbarSticky(true)
                        ->required(),
                ])->columnSpan(2),
                Forms\Components\Section::make()->schema([
                    FileUpload::make('featured_image')->image()->maxSize(2000),
                    TextInput::make('featured_image_caption')->placeholder(__('Featured Image Caption')),
                    Select::make('tags')->multiple()->relationship('tags', 'name'),
                    Select::make('topics')->multiple()->relationship('topics', 'name'),
                    DateTimePicker::make('published_at')->default(now()),
                    Radio::make('status')->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ])->inline()->default('publish')
                ])->columnSpan(1),

                Repeater::make('meta')->label(__('SEO Settings'))->schema([
                    TagsInput::make('keywords'),
                    TextInput::make('title')->placeholder(__('Meta Title')),
                    Textarea::make('description')->placeholder(__('Meta Description'))->rows(3),
                    TextInput::make('canonical_link')->placeholder(__('Canonocal Description'))->url(),
                ])
                    ->columnSpan(2)
                    ->defaultItems(1)
                    ->maxItems(1)

            ])->columns(3);
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->orderByDesc('id');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('summery')->html()->wrap()->limit(100),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn($record) => str()->title($record->status))
                    ->color(fn(string $state): string => match ($state) {
                        'Draft' => 'gray',
                        'Publish' => 'success',
                    }),
                TextColumn::make('published_at')->dateTime('d M, Y H:i:s A')->sortable(),
                TextColumn::make('created_at')->dateTime('d M, Y H:i:s A')->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('previewAction')
                    ->icon('heroicon-o-eye')
                    ->label(__('Preview'))
                    ->url(fn($record) => route('details', ['slug' => $record->slug]))
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
