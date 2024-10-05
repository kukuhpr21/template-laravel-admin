<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasStatus extends Model
{
    protected $table = "user_has_status";
    protected $primaryKey = 'user_id';
    protected $keyType = "string";
    public $incrementing = false;
}
