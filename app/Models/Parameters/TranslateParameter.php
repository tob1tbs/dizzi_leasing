<?php

namespace App\Models\Parameters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslateParameter extends Model
{
    use HasFactory;

    protected $table = "cms_parameters_translate";

    protected $fillable = ['key', 'value'];
}
