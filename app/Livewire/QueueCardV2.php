<?php

namespace App\Livewire;

use Livewire\Component;

class QueueCardV2 extends Component
{
    public $queueType;
    public $queueNumber;

    public function render()
    {
        return view('livewire.queue-card-v2', [
            'queueType' => $this->queueType,
            'queueNumber' => $this->queueNumber,
        ]);
    }
}
