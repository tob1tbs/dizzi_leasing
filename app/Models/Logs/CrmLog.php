<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmLog extends Model
{
    use HasFactory;

    protected $table = "cms_crm_log";
}
