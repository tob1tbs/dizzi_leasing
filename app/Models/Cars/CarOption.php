<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOption extends Model
{
    use HasFactory;

    protected $table = "cms_car_options_list";

    protected $fillable = ['deleted_at', 'deleted_at_int', 'sortable'];
}
