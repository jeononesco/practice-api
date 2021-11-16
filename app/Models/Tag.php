<?php

namespace App\Models;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $casts = [
        'related_tags' => 'array',
    ];
    protected $fillable = ['name', 'related_tags', 'post_id'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
