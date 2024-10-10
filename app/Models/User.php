<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $timestamps = true;
    public $incrementing = false;

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->using(UserHasRole::class);
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class)->using(UserHasRole::class);
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'status_id', 'id');
    }
}
