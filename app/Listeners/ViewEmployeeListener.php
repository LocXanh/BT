<?php

namespace App\Listeners;

use App\Events\ViewEmployee;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ViewEmployeeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
        public function __construct()
    {
        //
        
    }

    /**
     * Handle the event.
     *
     * @param  ViewEmployee  $event
     * @return void
     */
    public function handle(ViewEmployee $event)
    {
        //
        $redis = \Redis::connection();
        $redis->incr('employee'.$event->emp->id.'view');

    }
}
