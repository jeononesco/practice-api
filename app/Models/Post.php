<?php

namespace App\Models;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];
    use HasFactory;

    public function tags()
    {
        return $this->hasMany(Tag::class,  'post_id', 'id');
    }
}
