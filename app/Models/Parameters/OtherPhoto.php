<?php

namespace App\Models\Parameters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherPhoto extends Model
{
    use HasFactory;

    protected $table = 'cms_other_photo';

    protected $fillable = ['name', 'photo'];
}
