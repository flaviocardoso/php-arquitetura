<?php 
namespace Flavio\Arquitetura\Academic\Domain\Student;

use Flavio\Arquitetura\Academic\Domain\Event;

class LogStudentRegistered extends EventListener
{
    /**
     * @param StudentRegistered $student
     */
    public function reactsTo(Event $student): void 
    {
        fprintf(
            STDERR, 
            'Aluno com CPF %s foi matriculado na data %s',
            (string) $student->cpf(),
            $student->moment()->format('d/m/Y')
        );
    }

    public function knowProcess(Event $event): bool
    {
        return $event instanceof StudentRegistered;
    }
}

?>