<?php 
namespace Flavio\Arquitetura\Academic\Domain\Student;

use Flavio\Arquitetura\Academic\Domain\CPF;

interface StudentRepository
{
    public function add(Student $student): void;
    public function searchOfCPF(CPF $cpf): Student;
    /** @return Student[] */
    public function seachAll(): array;

}

?>