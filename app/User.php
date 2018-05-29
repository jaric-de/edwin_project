<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * Class User
 *
 * @property $created_at_for_humans
 *
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable;

    const ADMINISTRATOR = 'administrator';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return BelongsTo
     */
    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class );
    }

    /**
     * Just example for accessor
     *
     * @return string
     */
    public function getCreatedAtForHumansAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * @param string $value
     */
    public function setPasswordAttribute(string $value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role->name === static::ADMINISTRATOR;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->is_active == true;
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
