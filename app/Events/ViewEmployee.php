<?php

namespace App\Events;

use App\Events\Event;
use App\Employee;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ViewEmployee extends Event
{
    use SerializesModels;
    public $emp;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Employee $emp)
    {
        //
        $this->emp = $emp;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
