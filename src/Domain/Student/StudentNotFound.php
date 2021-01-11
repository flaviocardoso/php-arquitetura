<?php 
namespace Flavio\Arquitetura\Domain\Student;

use Flavio\Arquitetura\Domain\CPF;

class StudentNotFound extends \DomainException 
{
    public function __construct(CPF $cpf)
    {
        parent::__construct("Aluno com cpf $cpf não encontrado");
    }
}