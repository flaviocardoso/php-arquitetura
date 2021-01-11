<?php 
namespace Flavio\Arquitetura\Domain\Student;

use Flavio\Arquitetura\Domain\CPF;
use Flavio\Arquitetura\Domain\Email;

class Student
{
    private string $cpf;
    private string $name;
    private Email $email;
    private array $telephones;

    public function __construct(CPF $cpf, string $name, Email $email) {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public static function withCPFNameEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new CPF($cpf), $name, new Email($email));
        
    }

    public function addTelephone(string $ddd, string $num): self
    {
        $this->telephones[] = new Telephone($ddd, $num);
        return $this;
    }

    public function cpf(): string 
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
        return $this->telephones();
    }
}

?>