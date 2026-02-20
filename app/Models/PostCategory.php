<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasSlug;

    protected $table = 'post_categories';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'slug',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_kategori')
            ->saveSlugsTo('slug');
    }
}
