<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Optional: Define the table name if it's different from the default convention
    protected $table = 'admin';

    // Optional: Hide sensitive fields when serializing
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
