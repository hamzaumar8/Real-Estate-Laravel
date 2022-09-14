<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerProperty extends Model
{
    use HasFactory;

    protected $table = 'owner_property';

    protected $fillable = [
        'owner_id',
        'property_id',
    ];
}