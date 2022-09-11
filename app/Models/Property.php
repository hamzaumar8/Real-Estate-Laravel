<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'house_number',
    ];


    public static function booted()
    {
        static::creating(function ($model) {
            $property = Property::orderBy('id', 'DESC')->first();
            $property_number = 1;
            if ($property) {
                $property_number = (int)($property->id) + 1;
            }
            $model->property_number = 'PRT' . str_pad($property_number, 5, '0', STR_PAD_LEFT);
        });
    }
}