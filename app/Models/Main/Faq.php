<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = "cms_faq";

    protected $fillable = ['title', 'value', 'deleted_at_int', 'status'];
}
