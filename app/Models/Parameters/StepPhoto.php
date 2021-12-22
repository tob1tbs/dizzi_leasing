<?php

namespace App\Models\Parameters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepPhoto extends Model
{
    use HasFactory;

    protected $table = "cms_step_photo";

    protected $fillable = ['photo'];
}
