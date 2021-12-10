<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarData extends Model
{
    use HasFactory;

    protected $table = "cms_car_data";

    protected $fillable = ['status', 'deleted_at_int', 'deleted_at'];

    public function carMake() {
        return $this->hasOne('App\Models\Cars\CarMake', 'id', 'make');
    }

    public function carModel() {
        return $this->hasOne('App\Models\Cars\CarModel', 'id', 'model');
    }

    public function carParameter() {
        return $this->hasMany('App\Models\Cars\CarParameter', 'car_id', 'id')->where('deleted_at_int', '!=', 0);
    }
}
