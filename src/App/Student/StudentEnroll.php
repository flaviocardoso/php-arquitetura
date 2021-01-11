<?php 
namespace Flavio\Arquitetura\App\Student;

use Flavio\Arquitetura\Domain\{Student, StudentRepository};

class StudentEnroll 
{
    private  StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(StudentEnrollDTO $data): void 
    {
        $student = Student::withCPFNameEmail($data->studentCPF, $data->studentName, $dataEmail);
        $this->studentRepository->add($student);
    }
}

?>