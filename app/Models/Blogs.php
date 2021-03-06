<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blogs extends Model
{
    use HasFactory, Sluggable;

    protected $table = "blogs";
    protected $fillable = [
        'files_id',
        'users_id',
        'title',
        'tags',
        'caption',
        'seo',
        'description',
        'publish_at',
        'active'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function files()
    {
        return $this->belongsTo('App\Models\Files');
    }
}
