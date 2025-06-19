<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{
    protected $fillable = [
        'total_received',
        'queue_number',
    ];

    public function queue()
    {
        return $this->hasOne(Queue::class)->where('queue_type', 'receiving');
    }
}
