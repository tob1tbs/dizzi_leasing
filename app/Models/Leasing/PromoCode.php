<?php

namespace App\Models\Leasing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $table = "cms_promo_codes";

    protected $fillable = ['used', 'multiple', 'status', 'deleted_at_int', 'deleted_at'];
}
