<?php 
namespace Flavio\Arquitetura\Domain\Student;

class StudentExceed extends \DomainException 
{
    public function __construct()
    {
        parent::__construct("Somente pode existir um aluno por cpf");
    }
}