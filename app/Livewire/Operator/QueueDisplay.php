<?php

namespace App\Livewire\Operator;

use App\Models\Queue;
use Livewire\Component;

class QueueDisplay extends Component
{
    public function callNext()
    {
        $called = Queue::where('status', 'called')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($called) {
            $called->update(['status' => 'completed']);
        }

        $next = Queue::where('status', 'waiting')
            ->orderBy('created_at', 'asc')
            ->first();

        if ($next) {
            $next->update(['status' => 'called']);
        }

        // $queue_type = $next->queue_type === 'inquiry' ? 'inquiry, r-f-a, or others' : $next->queue_type;

        // switch ($queue_type) {
        //     case 'inquiry':
        //         $queue_type = 'inquiry, r-f-a, or others';
        //         break;
        //     case 'sena':
        //         $queue_type = 'senah inquiry';
        //         break;

        //     default:
        //         $queue_type = $next->queue_type;
        //         break;
        // }

        $this->dispatch('call-next', data: [
            'queue_type' => $next->queue_type,
            'queue_number' => $next->id,
        ]);
    }


    public function render()
    {
        $queue = Queue::where('status', 'called')
            ->orderBy('created_at', 'desc')
            ->first();

        $waitList = Queue::where('status', 'waiting')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('livewire.operator.queue-display', [
            'queue' => $queue,
            'waitList' => $waitList,
        ]);
    }
}
