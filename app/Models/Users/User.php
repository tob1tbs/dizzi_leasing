<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = "cms_users";

    protected $fillable = ['name', 'lastname', 'bday', 'phone', 'email', 'personal_number',  'gender', 'verify_phone', 'role_id', 'verify_email', 'status', 'deleted_at_int'];

    protected $hidden = ['password', 'remember_token'];

    public function userGender() {
        return $this->hasOne('App\Models\Users\UserGender', 'id', 'gender');
    }

    public function userRole() {
        return $this->hasOne('App\Models\Users\UserRole', 'id', 'role_id');
    }
}
