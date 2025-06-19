<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'queue_type',
        'queue_number',
        'fullname',
        'company',
        'address',
        'contact_number',
    ];

    public function model($queue_type)
    {
        switch ($queue_type) {
            case 'receiving':
                return Receiving::class;
            case 'inquiry':
                return InquiryRfa::class;
            case 'compliance':
                return Compliance::class;
            case 'senas':
                return Sena::class;
            default:
                throw new \Exception("Unknown queue type: {$this->queue_type}");
        }
    }
}
