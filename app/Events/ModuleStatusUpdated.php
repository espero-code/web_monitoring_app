<?php

namespace App\Events;

use App\Models\DataCollected;
use App\Models\Module;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ModuleStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $module;
    public $status;
    public $data_collected;

    /**
     * Create a new event instance.
     */
    public function __construct(Module $module, $status, DataCollected $data_collected)
    {
        //
        $this->module = $module;
        $this->status = $status;
        $this->data_collected = $data_collected;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('module-status');
    }

    public function broadcastWith()
    {
        return [
            'module' => $this->module->toArray(),
            'status' => $this->status,
            'data_collected' => $this->data_collected->toArray(),
        ];
    }
}
