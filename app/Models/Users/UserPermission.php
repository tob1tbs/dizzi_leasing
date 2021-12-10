<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = "cms_permissions";

    public function Data() {
        return $this->hasOne('App\Models\Users\UserRoleHasPermission', 'permission_id', 'id');
    }
}
