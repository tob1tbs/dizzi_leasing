<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleHasPermission extends Model
{
    use HasFactory;

    protected $table = "cms_role_has_permissions";
}
