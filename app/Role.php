<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    /**
     * @return HasMany
     */
    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
