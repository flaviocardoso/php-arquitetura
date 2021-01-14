<?php 
namespace Flavio\Arquitetura\Gamification\Infra\Seal;

use Flavio\Arquitetura\Domain\CPF;
use Flavio\Arquitetura\Gamification\Domain\Seal\Seal;
use Flavio\Arquitetura\Gamification\Domain\Seal\SealRepository;

class SealMemoryRepository implements SealRepository
{
    private array $seals = [];

    public function add(Seal $seal): void
    {
        $this->seals[] = $seal;
    }

    public function sealWithCPF(CPF $cpf)
    {
        return array_filter($this->seals, fn (Seal $seal) => $seal->cpf() == $cpf);
    }
}