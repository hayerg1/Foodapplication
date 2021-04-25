<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipe_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function recipe(){
        return $this->belongsTo('App\Models\upload');
    }
}
