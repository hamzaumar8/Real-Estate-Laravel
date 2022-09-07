<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'email',
        'phone1',
        'phone2',
        'address',
        'passport_picture',
        'tin',
        'nid',
    ];
}