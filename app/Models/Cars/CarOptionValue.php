<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOptionValue extends Model
{
    use HasFactory;

    protected $table = "cms_car_options_value";

    protected $fillable = ['value', 'option_id', 'deleted_at', 'deleted_at_int'];
}
