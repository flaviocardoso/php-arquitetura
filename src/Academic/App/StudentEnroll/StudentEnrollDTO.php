<?php 
namespace Flavio\Arquitetura\Academic\App\StudentEnroll;

class StudentEnrollDTO
{
    public string $studentCPF;
    public string $studentName;
    public string $studentEmail;

    public function __construct(string $cpf, string $name, string $email)
    {
        $this->studentCPF = $cpf;
        $this->studentName = $name;
        $this->studentEmail = $email;
    }
}