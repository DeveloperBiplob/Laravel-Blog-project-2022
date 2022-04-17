<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Website extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'logo', 'address', 'email', 'phone', 'facebook', 'twitter', 'instagram', 'behance', 'footer'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
