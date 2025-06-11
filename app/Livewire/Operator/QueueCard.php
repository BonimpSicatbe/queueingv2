<?php

namespace App\Livewire\Operator;

use Livewire\Component;

class QueueCard extends Component
{
    public $queueNumber = 1001;
    public $queueType;
    public $color;
    public $label;

    public function mount($queueType, $color, $label)
    {
        $this->queueNumber;
        $this->queueType = $queueType;
        $this->color = $color;
        $this->label = $label;
    }

    public function increment()
    {

        $this->queueNumber++;
    }

    public function decrement()
    {
        if ($this->queueNumber > 1001) {
            $this->queueNumber--;
        }
    }

    public function render()
    {
        return view('livewire.operator.queue-card');
    }
}
