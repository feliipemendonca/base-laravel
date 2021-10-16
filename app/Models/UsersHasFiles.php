<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersHasFiles extends Model
{
    protected $table = "users_has_files";

    /**
     * Get the users that owns the UsersHasFiles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the file that owns the UsersHasFiles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file(): BelongsTo
    {
        return $this->belongsTo(Files::class,'files_id');
    }
}
