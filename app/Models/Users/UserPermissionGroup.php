<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermissionGroup extends Model
{
    use HasFactory;

    protected $table = "cms_permission_groups";
}
