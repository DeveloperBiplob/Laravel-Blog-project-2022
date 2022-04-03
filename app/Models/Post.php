<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'sub_cat_id', 'title', 'slug', 'description', 'image', 'view', 'status'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }



    public function getRouteKeyName()
    {
        return 'slug';
    }
}
