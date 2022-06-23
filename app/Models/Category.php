<?php

namespace App\Models;

/* use App\Models\Post; */ //non serve
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    protected $fillable = ['name','slug'];
}
