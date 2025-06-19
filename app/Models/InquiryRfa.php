<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InquiryRfa extends Model
{
    protected $fillable = [
        'total_received',
        'queue_number',
    ];
}
