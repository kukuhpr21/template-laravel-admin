<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $timestamps = true;
    public $incrementing = false;

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
