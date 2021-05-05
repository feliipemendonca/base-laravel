<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    protected $table = 'districts';

    /**
     * Get the citys that owns the Districts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function citys()
    {
        return $this->belongsTo('App\Models\Citys');
    }
}
