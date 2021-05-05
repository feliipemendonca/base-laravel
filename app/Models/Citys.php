<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    use HasFactory;

    protected $table = 'citys';

    /**
     * Get the states that owns the Citys
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function states()
    {
        return $this->belongsTo('App\Models\States');
    }
}
