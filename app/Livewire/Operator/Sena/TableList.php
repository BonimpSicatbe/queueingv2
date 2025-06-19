<?php

namespace App\Livewire\Operator\Sena;

use App\Models\Sena;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TableList extends Component
{
    // for creating
    #[Validate('required|date_format:Y-m-d\TH:i|after_or_equal:now')]
    public $schedule;

    #[Validate('required|string')]
    public $requesting_party;

    #[Validate('required|string')]
    public $responding_party;

    // for editing
    public $editSenaId;
    public $editSchedule;

    public function createSenaSchedule()
    {
        $validated = $this->validate();

        $sena = Sena::create([
            'schedule' => $this->schedule,
            'requesting_party' => $this->requesting_party,
            'responding_party' => $this->responding_party,
            'user_id' => Auth::id(),
        ]);

        $this->reset(['schedule', 'requesting_party', 'responding_party']);

        session()->flash('message', 'Sena schedule created successfully.');
    }

    public function cancelSchedule($senaId)
    {
        $sena = Sena::findOrFail($senaId);
        $sena->status = 'cancelled';
        $sena->save();

        session()->flash('success', 'Sena schedule cancelled successfully.');
    }

    public function confirmSchedule($senaId)
    {
        $sena = Sena::findOrFail($senaId);
        $sena->status = 'completed';
        $sena->save();

        session()->flash('success', 'Sena schedule completed successfully.');
    }

    public function editSenaSchedule($senaId)
    {
        $sena = Sena::findOrFail($senaId);

        $this->editSenaId = $senaId;
        $this->editSchedule = \Carbon\Carbon::parse($sena->schedule)->format('Y-m-d\TH:i');
    }

    public function updateSenaSchedule()
    {
        $validated = $this->validate([
            'editSchedule' => 'required|date_format:Y-m-d\TH:i|after_or_equal:now',
        ]);

        $sena = Sena::findOrFail($this->editSenaId);

        $sena->update([
            'schedule' => $validated['editSchedule'],
            'status' => 'pending',
        ]);

        $this->reset(['editSchedule', 'editSenaId']);
        session()->flash('success', 'Sena schedule updated successfully.');
    }

    public function render()
    {
        $senas = Sena::where('user_id', Auth::id())
            ->orderBy('schedule', 'asc')
            ->get();

        return view('livewire.operator.sena.table-list', [
            'senas' => $senas
        ]);
    }
}
