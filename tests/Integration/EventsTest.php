<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Core\Events\Dispatcher;
use App\Tests\Stubs\EventStub;
use App\Tests\Stubs\ListenerStub;

class EventsTest extends TestCase
{
    /** @test */
    public function it_can_dispatch_an_event ()
    {
        $dispatcher = new Dispatcher();

        $event = new EventStub();
        $mockedListener = $this->createMock(ListenerStub::class);

        $mockedListener->expects($this->once())->method('handle')->with($event);

        $dispatcher->addListener('EventStub', $mockedListener);
        $dispatcher->dispatch($event);
    }

    /** @test */
    public function it_can_dispatch_an_event_with_multiple_listeners ()
    {
        $dispatcher = new Dispatcher();

        $event = new EventStub();
        $mockedListener = $this->createMock(ListenerStub::class);
        $anotherMockedListener = $this->createMock(ListenerStub::class);

        $mockedListener->expects($this->once())->method('handle')->with($event);
        $anotherMockedListener->expects($this->once())->method('handle')->with($event);

        $dispatcher->addListener('EventStub', $mockedListener);
        $dispatcher->addListener('EventStub', $anotherMockedListener);
        $dispatcher->dispatch($event);
    }
}
