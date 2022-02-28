<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class character extends Model
{
    protected $fillable = ['name', 'birthday', 'occupation', 'status', 'img'];
}
