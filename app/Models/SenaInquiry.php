<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SenaInquiry extends Model
{
    protected $fillable = [
        'total_received',
        'queue_number',
    ];
}
