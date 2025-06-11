<?php

namespace App\Livewire\Layouts\Display;

use Livewire\Component;

class QueueCard extends Component
{
    public $queueNumber;
    public $queueType;
    public $color;
    public $label;

    public function mount($queueType, $color, $label)
    {
        $this->queueNumber = '1001';
        $this->queueType = $queueType;
        $this->color = $color;
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.layouts.display.queue-card');
    }
}
