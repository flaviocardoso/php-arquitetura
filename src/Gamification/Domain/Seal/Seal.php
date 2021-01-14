<?php 
namespace Flavio\Arquitetura\Gamification\Domain\Seal;

use Flavio\Arquitetura\Domain\CPF;

class Seal 
{
    private CPF $cpf;
    private string $seal;

    public function __construct(CPF $cpf, string $seal)
    {
        $this->cpf = $cpf;
        $this->seal = $seal;
    }

    public function cpf(): CPF
    {
        return $this->cpf;
    }

    public function __toString(): string
    {
        return $this->seal;
    }
}

?>