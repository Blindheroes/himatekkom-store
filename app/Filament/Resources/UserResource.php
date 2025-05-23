<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';



    public static function getNavigationBadge(): ?string
    {
        $model = static::getModel();
        // active user but waiting to be approved
        $waitingToBeApproved = $model::where('member_id_approved', false)
            ->where('member_status', true)
            ->count();
        return $waitingToBeApproved > 0 ? (string)$waitingToBeApproved . ' waiting to apporve' : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)->disabled(),

                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255)
                    ->default(null),


                Forms\Components\TextInput::make('member_id')
                    ->maxLength(255)
                    ->default(null)->label('NRP'),
                Forms\Components\FileUpload::make('member_id_path')
                    ->image()
                    ->directory('member_id_images')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->nullable()->label('Foto Kartu Mahasiswa'),
                Forms\Components\Toggle::make('member_id_approved')
                    ->required(),
                Forms\Components\Toggle::make('member_status')
                    ->required(),
                Forms\Components\Toggle::make('is_admin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('member_id')
                    ->searchable()->label('NRP'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),




                Tables\Columns\IconColumn::make('member_id_approved')
                    ->boolean(),
                Tables\Columns\IconColumn::make('member_status')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_admin')
                    ->boolean(),
            ])
            ->filters([
                //filter based member_id_approved is false and true
                Tables\Filters\SelectFilter::make('member_id_approved')
                    ->options([
                        '0' => 'Not Approved',
                        '1' => 'Approved',
                    ])
                    ->label('ID Approval Status'),

                Tables\Filters\SelectFilter::make('member_status')
                    ->options([
                        '0' => 'Inactive',
                        '1' => 'Active',
                    ])
                    ->label('Member Status'),

                Tables\Filters\SelectFilter::make('is_admin')
                    ->options([
                        '0' => 'Regular User',
                        '1' => 'Admin',
                    ])
                    ->label('Admin Status'),

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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            \App\Filament\Resources\UserResource\Widgets\UserStatsOverview::class,
        ];
    }
}
