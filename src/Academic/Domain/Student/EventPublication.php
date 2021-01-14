<?php 
namespace Flavio\Arquitetura\Academic\Domain\Student;

use Flavio\Arquitetura\Academic\Domain\Event;

class EventPublication 
{
    private array $listeners = [];

    public function addListener(EventListener $listener): void 
    {
        $this->listeners[] = $listener;
    }

    public function publicate(Event $event): void
    {
        /**  @var EventListener $listener */
        foreach($this->listeners as $listener) {
            $listener->process($event);
        }
    }
}

?>