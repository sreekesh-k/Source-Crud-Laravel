<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
    protected $table = 'categories';

    
    protected $fillable = [
        'name',
        'phone_no',
        'email',
        'description',
    ];

    public $timestamps = true;
}