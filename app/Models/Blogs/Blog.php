<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "cms_blogs";

    protected $fillable = ['id', 'title', 'text', 'photo', 'status', 'deleted_at_int', 'deleted_at'];
}
