<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label("Nama")
                        ->placeholder("Jhon doe")
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label("Surel")
                        ->placeholder("contoh@contoh.com")
                        ->email()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                        ->label("No. Telepon")
                        ->placeholder("081*****2320")
                        ->tel()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('address')
                        ->label("Alamat")
                        ->placeholder("Jl. Budi")
                        ->maxLength(255),
                    Forms\Components\Textarea::make('description')
                        ->label("Deskripsi")
                        ->placeholder("Deskripsi supplier")
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('image')
                        ->label("Foto")
                        ->columnSpanFull()
                        ->image(),
                ])->columns(['sm' => 2])->columnSpan(2),
                Forms\Components\Section::make("Setempel Waktu")
                    ->description('Detail waktu data dibuat dan diubah')
                    ->icon('heroicon-m-clock')
                    ->schema([
                        Forms\Components\Placeholder::make("created_at")
                            ->label("Kapan Dibuat")
                            ->content(fn(?Supplier $record): string => $record ? date_format($record->created_at, "M d, Y") : "-"),
                        Forms\Components\Placeholder::make("updated_at")
                            ->label("Kapan Diubah")
                            ->content(fn(?Supplier $record): string => $record ? date_format($record->updated_at, "M d, Y") : "-"),
                    ])
                    ->collapsible()
                    ->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label("Foto")
                    ->defaultImageUrl(fn() => asset('images/frame_person_off.svg')),
                Tables\Columns\TextColumn::make('name')
                    ->label("nama")
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label("Surel")
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label("No. Telepon")
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label("Alamat")
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
