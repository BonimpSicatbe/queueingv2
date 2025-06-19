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
}
