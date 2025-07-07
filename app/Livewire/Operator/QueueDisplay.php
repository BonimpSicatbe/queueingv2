<?php

namespace App\Livewire\Operator;

use App\Models\Queue;
use Livewire\Component;

class QueueDisplay extends Component
{
    public function callNext()
    {
        // Complete the currently called queue, if any
        $called = Queue::where('status', 'called')
            ->latest('created_at')
            ->first();

        if ($called) {
            $called->update(['status' => 'completed']);
        }

        // Call the next waiting queue, if any
        $next = Queue::where('status', 'waiting')
            ->oldest('created_at')
            ->first();

        if ($next) {
            $next->update(['status' => 'called']);

            $this->dispatch('call-next', data: [
                'queue_type' => $next->queue_type,
                'queue_number' => $next->id,
            ]);
        }
    }

    public function render()
    {
        $queue = Queue::where('status', 'called')
            ->latest('created_at')
            ->first();

        $waitList = Queue::where('status', 'waiting')
            ->oldest('created_at')
            ->get();

        return view('livewire.operator.queue-display', compact('queue', 'waitList'));
    }
}
