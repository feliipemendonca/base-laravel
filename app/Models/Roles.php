<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Roles extends Model
{
    use Sluggable;

    protected $table = "roles";

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the users associated with the Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users(): HasOne
    {
        return $this->hasOne(User::class);
    }

    
}
