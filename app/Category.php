<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'body'];

    public function posts(){
        return $this->hastMany(Post::class); // Una categoria tiene muchos posts
    }
}
