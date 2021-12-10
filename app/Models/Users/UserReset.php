<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReset extends Model
{
    use HasFactory;

    protected $table = "cms_users_reset";
}
