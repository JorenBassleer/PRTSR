<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'details', 'storage',
        'gender_id'
    ];
    public function types()
    {
        return $this->belongsToMany('App\Type')->withTimestamps();
    }
    public function materials()
    {
        return $this->belongsToMany('App\Material')->withTimestamps();
    }
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
