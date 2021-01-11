<?php 
namespace Flavio\Arquitetura\Infra\Student;

use Flavio\Arquitetura\Domain\CPF;
use Flavio\Arquitetura\Domain\Student\Student;
use Flavio\Arquitetura\Domain\Student\StudentExceed;
use Flavio\Arquitetura\Domain\Student\StudentNotFound;
use Flavio\Arquitetura\Domain\Student\StudentRepository;

use function PHPUnit\Framework\throwException;

class StudentMemoryRepository implements StudentRepository
{
    private array $students = [];

    public function add(Student $student): void 
    {
        $this->students[] = $student;
    }

    public function searchOfCPF(CPF $cpf): Student
    {
        /** @var Stundet $studentFilter */
        $studentFilter = array_filter($this->students, fn (Student $student) => $student->cpf() == $cpf);
        
        $countStudent = count($studentFilter);
        if ($countStudent === 0) throw new StudentNotFound($cpf);
        if ($countStudent > 1) throw new StudentExceed();

        return $studentFilter[0];
    }

    public function seachAll(): array
    {
        return $this->students;
    }
}

?>