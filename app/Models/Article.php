<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'video_id',
        'title',
        'content',
        'image',
        'viewer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class,'video_id');
    }

    public function label()
    {
        return $this->hasMany(ArticleLabel::class,'article_id');
    }
}
