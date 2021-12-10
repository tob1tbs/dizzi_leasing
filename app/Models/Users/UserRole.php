<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = "cms_roles";

    protected $fillable = ['name', 'title', 'guard_name', 'status', 'deleted_at_int', 'deleted_at'];
}
