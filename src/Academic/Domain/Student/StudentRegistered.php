<?php 
namespace Flavio\Arquitetura\Academic\Domain\Student;

use Flavio\Arquitetura\Academic\Domain\CPF;
use Flavio\Arquitetura\Academic\Domain\Event;

class StudentRegistered implements Event
{
    private \DateTimeImmutable $moment;
    private CPF $cpf;

    public function __construct(CPF $cpf)
    {
        $this->cpf = $cpf;
        $this->moment = new \DateTimeImmutable();
    }

    public function cpf(): CPF 
    {
        return $this->cpf;
    }
    
    public function moment(): \DateTimeImmutable
    {
        return $this->moment;
    }
}

?>