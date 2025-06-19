<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sena extends Model
{
    protected $fillable = [
        'schedule',
        'requesting_party',
        'responding_party',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function queue()
    {
        return $this->hasOne(Queue::class)->where('queue_type', 'senas');
    }
}
