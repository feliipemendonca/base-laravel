<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Products extends Model
{
    use Sluggable;

    protected $fillable = [
        'files_id',
        'title',
        'about',
        'description',
        'value',
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
