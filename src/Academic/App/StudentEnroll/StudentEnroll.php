<?php 
namespace Flavio\Arquitetura\Academic\App\StudentEnroll;

use Flavio\Arquitetura\Academic\Domain\Student\{EventPublication, Student, StudentRegistered, StudentRepository};

class StudentEnroll 
{
    private StudentRepository $studentRepository;
    private EventPublication $publicate;

    public function __construct(StudentRepository $studentRepository, EventPublication $publicate)
    {
        $this->studentRepository = $studentRepository;
        $this->publicate = $publicate;
    }

    public function execute(StudentEnrollDTO $data): void 
    {
        $student = Student::withCPFNameEmail($data->studentCPF, $data->studentName, $data->studentEmail);
        $this->studentRepository->add($student);

        $event = new StudentRegistered($student->cpf());
        $this->publicate->publicate($event);
    }
}

?>