<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(UserHasRole::class);
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class)->using(UserHasRole::class);
    }
}
