<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Queue as QueueModel;

class Queue extends Component
{
    #[Validate('required|string|max:255')]
    public $fullname = '';
    #[Validate('required|string|max:255')]
    public $company = '';
    #[Validate('required|string|max:255')]
    public $address = '';
    #[Validate('required|string|max:20')]
    public $contact_number = '';

    public $queueType = '';
    public $queueNumber = '';

    public function submitQueue()
    {
        $this->validate();

        switch ($this->queueType) {
            case 'inquiries / rfa / other':
                $queueType = 'inquiries_rfa_other';
                break;
            case 'sena inquiries':
                $queueType = 'sena_inquiries';
            case 'receiving':
                $queueType = 'receiving';
            case 'compliance':
                $queueType = 'compliance';
            default:
                $queueType = 'unknown';
                break;
        }

        $queue = QueueModel::create([
            'queue_type' => $queueType,
            'fullname' => $this->fullname,
            'company' => $this->company,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
        ]);

        return redirect()->route('welcome.queue.print', [
            'queue_number' => $queue->id,
            'queue_type' => $this->queueType,
        ]);
    }

    public function render()
    {
        return view('livewire.guest.queue');
    }
}
