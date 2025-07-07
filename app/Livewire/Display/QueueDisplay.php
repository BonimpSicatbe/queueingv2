<?php

namespace App\Livewire\Display;

use App\Models\Queue;
use Livewire\Component;

class QueueDisplay extends Component
{
    private $queue;
    private $nextQueue;

    public function render()
    {
        $queue = Queue::where('status', 'called')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$queue) {
            $queue = Queue::where('status', 'waiting')
                ->orderBy('created_at', 'asc')
                ->first();

            if ($queue) {
                $queue->update(['status' => 'called']);
            }

            $this->queue = $queue;
        }

        $waitList = Queue::where('status', 'waiting')
            ->orderBy('created_at', 'asc')
            ->get();

        // dd($queue, $waitList);

        return view('livewire.display.queue-display', [
            'queue' => $queue,
            'waitList' => $waitList,
        ]);
    }
}
