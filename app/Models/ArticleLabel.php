<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleLabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'label_id',
    ];

    public function label()
    {
        return $this->belongsTo(Label::class,'label_id');
    }
}
