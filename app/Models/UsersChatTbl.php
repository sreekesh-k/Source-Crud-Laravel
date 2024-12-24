<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersChatTbl extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];
    public function sourcemember()
    {
        return $this->belongsTo(Sourcemember::class, 'user_id');
    }
}
