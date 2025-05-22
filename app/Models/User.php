<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;


    protected $guarded = [];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'member_id_approved' => 'boolean',
            'member_id_status' => 'boolean',
            'is_admin' => 'boolean',
        ];
    }


    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->is_admin;
        }

        return true;
    }


    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isNewUser()
    {
        return $this->member_id_status === false && $this->member_id_approved === false;
    }
}
