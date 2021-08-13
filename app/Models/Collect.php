<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'favoriteable_type', 'favoriteable_id'];
}
