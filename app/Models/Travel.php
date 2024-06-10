<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'travels';

    protected $guarded = [];


    // unique slug(pack)
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function numberOfNights(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['number_of_days'] -1
        );
    }

//    public function getNumberOfNightsAttribute()
//    {
//        return $this->number_of_days - 1;
//    } -- alternative

//public function getRouteKeyName()
//{
//    return 'slug';
//}

}
