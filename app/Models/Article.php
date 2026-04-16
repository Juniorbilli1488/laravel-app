<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'content',
        'preview_image',
        'full_image',
    ];
    public function comments()
{
    return $this->hasMany(Comment::class);
}

public function approvedComments()
{
    return $this->hasMany(Comment::class)->where('is_approved', true);
}
}