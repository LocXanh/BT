<?php

namespace App\Handlers\Events;

use App\Events\EmployeeRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandlerNewEmployeeRegister
{
    /**
     * Create the event handler.
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
     * @param  EmployeeRegister  $event
     * @return void
     */
    public function handle(EmployeeRegister $event)
    {
        //
    }
}
