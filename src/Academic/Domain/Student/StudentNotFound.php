<?php 
namespace Flavio\Arquitetura\Academic\Domain\Student;

use Flavio\Arquitetura\Academic\Domain\CPF;

class StudentNotFound extends \DomainException 
{
    public function __construct(CPF $cpf)
    {
        parent::__construct("Aluno com cpf $cpf não encontrado");
    }
}