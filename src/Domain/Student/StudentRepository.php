<?php 
namespace Flavio\Arquitetura\Domain\Student;

use Flavio\Arquitetura\Domain\CPF;

interface StudentRepository
{
    public function add(Student $student): void;
    public function searchOfCPF(CPF $cpf): Student;
    /** @return Student[] */
    public function seachAll(): array;

}

?>