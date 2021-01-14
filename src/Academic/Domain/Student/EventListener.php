<?php 
namespace Flavio\Arquitetura\Academic\Domain\Student;

use Flavio\Arquitetura\Academic\Domain\Event;

abstract class EventListener 
{
    public function process(Event $event): void 
    {
        if ($this->knowProcess($event)) {
            $this->reactsTo($event);
        }
    }

    abstract public function knowProcess(Event $event): bool;
    abstract public function reactsTo(Event $event): void;
}

?>