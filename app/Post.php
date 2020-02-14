<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'excerpt',
        'body',
        'status',
        'file',
    ];

    // Relation

    public function user(){
        return $this->belongsTo(User::class); // Un post pertenece a un usuario
    }

    public function category(){
        return $this->belongsTo(Category::class); // Un post pertenece a una categoria
    }

    public function tags(){
        return $this->belongsToMany(Tag::class); // Un post tiene varios tags
    }
}
