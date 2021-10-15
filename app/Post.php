<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // membuat mass assignment: guarded & fillable  
    // protected $guarded = [];    // seluruh input diijinkan 

    protected $fillable = ['title', 'slug', 'body', 'category_id', 'thumbnail'];    // input tertentu saja yg diijinkan 

    public function category()
    {
        // return $this->hasOne(Category::class);
        return $this->belongsTo((Category::class));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTakeImageAttribute()
    {
        return "/storage/" . $this->thumbnail;
    }
}
