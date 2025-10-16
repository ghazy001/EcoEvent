<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id','title','slug','excerpt','body','image_path','is_published','published_at'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Helper : publier maintenant si demandé
    public function publishIfNeeded(): void
    {
        if ($this->is_published && is_null($this->published_at)) {
            $this->published_at = now();
        }
    }
}

