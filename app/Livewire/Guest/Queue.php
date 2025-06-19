<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Queue as QueueModel;

class Queue extends Component
{
    #[Validate('required')]
    public $fullname = '';
    #[Validate('required')]
    public $company = '';
    #[Validate('required')]
    public $address = '';
    #[Validate('required')]
    public $contact_number = '';

    public $queueType = '';
    public $queueNumber = '';

    public function submitQueue()
    {
        $this->validate();

        $queue = QueueModel::create([
            'queue_type' => $this->queueType,
            'fullname' => $this->fullname,
            'company' => $this->company,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
        ]);

        $this->queueNumber = $queue->queue_number;

        return redirect()->route('welcome.index');
    }

    public function render()
    {
        return view('livewire.guest.queue');
    }
}
