<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarParameter extends Model
{
    use HasFactory;

    protected $table = "cms_car_parameters";

    public function carOption() {
        return $this->hasOne('App\Models\Cars\CarOption', 'key', 'key');
    }

    public function carOptionValue() {
        return $this->hasOne('App\Models\Cars\CarOptionValue', 'key', 'key');
    }

    public function carOptionValueId() {
        return $this->belongsTo('App\Models\Cars\CarOptionValue', 'option_id', 'id');
    }
}
