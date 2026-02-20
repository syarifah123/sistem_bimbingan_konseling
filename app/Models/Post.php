<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasSlug;

    protected $fillable = [
        'judul',
        'deskripsi',
        'category_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'slug',
        'gambar',
    ];

    public function category()
    {
        return $this->belongsTo(PostCetegory::class, 'category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug');
    }
}
