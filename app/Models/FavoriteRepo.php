<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteRepo extends Model
{
    protected $fillable = [
        'repo_name',
        'owner',
        'url'
    ];
}