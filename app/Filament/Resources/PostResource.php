<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;   
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Post Details')
                ->schema([
                    TextInput::make('title')
                    ->live()->debounce(500)
                    ->required()->minLength(1)->maxLength(150)
                    ->afterStateUpdated(function (string $operation, string $state, Set $set) {
                        if($operation === 'create') {
                            $set('slug', Str::slug($state));
                        }
                    }),
                    TextInput::make('slug')->required()->minLength(1)->maxLength(150)->unique(ignoreRecord: true),
                    RichEditor::make('body')->required()->columnSpanFull()->fileAttachmentsDirectory('posts/images'),
                ])->columns(2),
                Section::make('Meta')
                ->schema([
                    FileUpload::make('image')->image()->directory('posts/images')->imageEditor(),
                    DateTimePicker::make('published_at')->nullable(),
                    Checkbox::make('featured')->default(false),
                    Select::make('user_id')->relationship('author', 'name')->searchable()->required(),
                    Select::make("categories")->multiple()->relationship("categories", "title")->searchable(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
                TextColumn::make('author.name')->sortable()->searchable(),
                TextColumn::make('published_at')->dateTime('d-m-Y H:i')->sortable()->searchable(),
                CheckboxColumn::make('featured')->sortable()->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
