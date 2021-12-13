<?php

namespace App\Models\Reviews;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "cms_reviews";

    protected $fillable = ['status', 'deleted_at_int', 'deleted_at'];
}
