<?php 
namespace Flavio\Arquitetura\Academic\Domain\Student;

use Flavio\Arquitetura\Academic\Domain\CPF;
use Flavio\Arquitetura\Academic\Domain\Email;

class Student
{
    private CPF $cpf;
    private string $name;
    private Email $email;
    private array $telephones;

    public function __construct(CPF $cpf, string $name, Email $email) {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->telephones = [];
    }

    public static function withCPFNameEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new CPF($cpf), $name, new Email($email));
        
    }

    public function addTelephone(string $ddd, string $num): self
    {
        if (count($this->telephones) === 2) {
            throw new TelephoneExceededTwoNumber();
        }

        $this->telephones[] = new Telephone($ddd, $num);
        return $this;
    }

    public function cpf(): CPF
    {
        return $this->cpf;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string 
    {
        return $this->email;
    }

    /** @return Telephone[] */
    public function telephones(): array
    {
        return $this->telephones;
    }
}

?>