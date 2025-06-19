<?php

namespace App\Livewire\Display\Sena;

use App\Models\Sena;
use Livewire\Component;

class TableList extends Component
{
    public function render()
    {
        $senas = Sena::whereDate('schedule', now()->toDateString())
            ->orderByRaw("
            CASE
                WHEN status = 'completed' THEN 1
                WHEN status = 'cancelled' THEN 2
                ELSE 0
            END
            ")
            ->orderBy('schedule', 'asc')
            ->get();

        return view('livewire.display.sena.table-list', [
            'senas' => $senas,
        ]);
    }
}
