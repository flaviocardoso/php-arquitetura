<?php
namespace Flavio\Arquitetura\Test;

use Flavio\Arquitetura\Domain\CPF;
use Flavio\Arquitetura\Domain\Email;
use Flavio\Arquitetura\Domain\Student\Student;
use Flavio\Arquitetura\Domain\Student\TelephoneExceededTwoNumber;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    private Student $student;

    protected function setUp(): void 
    {
        $this->student = Student::withCPFNameEmail(
            '726.938.038-74',
            'Robert Parker',
            'exemplo@exemplo.com'
        );
    }

    public function testAddMoreOfTwoTelephonesShowException() 
    {
        $this->expectException(TelephoneExceededTwoNumber::class);

        $this->student
            ->addTelephone('21', '333333333')
            ->addTelephone('21', '444444444')
            ->addTelephone('21', '555555555');
    }

    public function testAddOneTelefoneItIsOk()
    {
        $this->student->addTelephone('21', '666666666');

        $this->assertCount(1, $this->student->telephones());
    }

    public function testAddTwoTelephoneItIsOk() 
    {
        $this->student->addTelephone('21', '77777777');
        $this->student->addTelephone('21', '88888888');

        $this->assertCount(2, $this->student->telephones());
    }
}