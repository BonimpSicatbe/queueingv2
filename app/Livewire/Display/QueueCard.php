<?php

namespace App\Livewire\Display;

use App\Models\Receiving;
use App\Models\Compliance;
use App\Models\SenaInquiry;
use App\Models\InquiryRfa;
use Livewire\Component;

class QueueCard extends Component
{
    public $queueNumber;
    public $queueType;
    public $color;
    public $label;

    public function mount($queueType, $color, $label)
    {
        $this->queueType = $queueType;
        $this->color = $color;
        $this->label = $label;
    }

    public function getModelForToday()
    {
        $modelClass = match (strtolower($this->queueType)) {
            'receiving' => Receiving::class,
            'compliance' => Compliance::class,
            'sena_inquiries' => SenaInquiry::class,
            'inquiries_rfa' => InquiryRfa::class,
            default => null,
        };

        return $modelClass ? $modelClass::whereDate('created_at', today())->first() : null;
    }

    public function render()
    {
        $model = $this->getModelForToday();

        switch (strtolower($this->queueType)) {
            case 'receiving':
                $this->queueNumber = $model ? $model->queue_number : 1001;
                break;
            case 'compliance':
                $this->queueNumber = $model ? $model->queue_number : 2001;
                break;
            case 'sena_inquiries':
                $this->queueNumber = $model ? $model->queue_number : 3001;
                break;
            case 'inquiries_rfa':
                $this->queueNumber = $model ? $model->queue_number : 4001;
                break;
            default:
                $this->queueNumber = 0;
                break;
        }

        return view('livewire.display.queue-card', [
            'queueNumber' => $this->queueNumber,
            'queueType' => $this->queueType,
            'color' => $this->color,
            'label' => $this->label,
        ]);
    }
}
