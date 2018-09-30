<?php

namespace App\Tests\Stubs;

use App\Core\Events\Event;

class EventStubName extends Event
{
    public function getName ()
    {
        return 'EventStubName';
    }
}


?>