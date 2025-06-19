<?php

namespace App\Livewire\Operator;

use App\Models\Receiving;
use App\Models\Compliance;
use App\Models\SenaInquiry;
use App\Models\InquiryRfa;
use Livewire\Component;

class QueueCard extends Component
{
    public $queueNumber;
    public $defaultQueueNumber;
    public $queueType;
    public $color;
    public $label;

    public function mount($queueType, $color, $label)
    {
        $this->queueType = $queueType;
        $this->color = $color;
        $this->label = $label;

        $model = $this->getModelForToday(); // Fix: define model first
        $this->defaultQueueNumber = $model ? $model->default_queue_number : 0;
    }

    public function play()
    {
        $model = $this->getModelForToday();
        $label = $this->label;

        if ($label === 'sena inquiries') {
            $label = 'senah inquiries';
        }if ($label === 'inquiries / rfa') {
            $label = 'inquiries . or . r-f-a.';
        }

        $this->dispatch("call-queue-{$this->label}", data: [
            'queue_number' => $model->queue_number,
            'label' => $label,
        ]);
    }

    public function next()
    {
        $model = $this->getModelForToday();

        if ($model) {
            if ($model->queue_number < $model->default_queue_number + 14) {
                $model->queue_number++;
            } else {
                $model->queue_number = $model->default_queue_number;
            }
            $model->save();
            $model->total_received++;
            $model->save();
            $this->queueNumber = $model->queue_number;

            $this->play();
        }
    }

    public function prev()
    {
        $model = $this->getModelForToday();

        if ($model) {
            $model->queue_number--;
            $model->save();
            $this->queueNumber = $model->queue_number;

            $this->play();
        }
    }

    protected function getModelForToday()
    {
        return match (strtolower($this->queueType)) {
            'receiving' => Receiving::whereDate('created_at', today())->firstOrCreate(),
            'compliance' => Compliance::whereDate('created_at', today())->firstOrCreate(),
            'sena_inquiries' => SenaInquiry::whereDate('created_at', today())->firstOrCreate(),
            'inquiries_rfa' => InquiryRfa::whereDate('created_at', today())->firstOrCreate(),
            default => null,
        };
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

        return view('livewire.operator.queue-card');
    }
}
