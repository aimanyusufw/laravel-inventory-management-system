<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitResource\Pages;
use App\Filament\Resources\UnitResource\RelationManagers;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\TextInput::make('name')
                    ->label("Nama")
                    ->placeholder("Kilogram")
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('abbreviation')
                    ->label("Singkatan")
                    ->placeholder("Kg")
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('icon')
                    ->label("Ikon")
                    ->image()
                    ->directory('icons/units')
                    ->nullable()
                    ->columnSpanFull(),
            ])->columns(['sm' => 2])->columnSpan(2),

            Forms\Components\Section::make("Setempel Waktu")
                ->description('Detail waktu data dibuat dan diubah')
                ->icon('heroicon-m-clock')
                ->schema([
                    Forms\Components\Placeholder::make("created_at")
                        ->label("Kapan Dibuat")
                        ->content(fn(?Unit $record): string => $record ? date_format($record->created_at, "M d, Y") : "-"),
                    Forms\Components\Placeholder::make("updated_at")
                        ->label("Kapan Diubah")
                        ->content(fn(?Unit $record): string => $record ? date_format($record->updated_at, "M d, Y") : "-"),
                ])
                ->collapsible()
                ->columnSpan(1),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label("Nama")
                    ->searchable(),
                Tables\Columns\TextColumn::make('abbreviation')
                    ->label("Singkatan")
                    ->searchable(),
                Tables\Columns\ImageColumn::make('icon')
                    ->label("Ikon")
                    ->defaultImageUrl(fn() => asset('images/image_search.svg'))
            ])
            ->filters([
                Tables\Filters\Filter::make('search')
                    ->form([
                        Forms\Components\TextInput::make('name')->label('Search Name'),
                    ])
                    ->query(function ($query, $data) {
                        return $query->when($data['name'], fn($q) => $q->where('name', 'like', '%' . $data['name'] . '%'));
                    }),
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
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }
}
