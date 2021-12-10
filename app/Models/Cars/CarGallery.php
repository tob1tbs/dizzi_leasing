<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarGallery extends Model
{
    use HasFactory;

    protected $table = "cms_car_gallery";

    protected $fillable = ['status', 'deleted_at_int', 'deleted_at'];
}
