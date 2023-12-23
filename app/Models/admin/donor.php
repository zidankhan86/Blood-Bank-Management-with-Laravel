<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birthday',
        'gender',
        'address',
        'phone',
        'email',
        'photo',
        'slug',
    ];
}
