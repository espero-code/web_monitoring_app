<?php

namespace App\Events;

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

    /**
     * Create a new event instance.
     */
    public function __construct(Module $module, $status)
    {
        //
        $this->module = $module;
        $this->status = $status;
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
        ];
    }
}
