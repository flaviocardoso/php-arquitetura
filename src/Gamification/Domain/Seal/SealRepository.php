<?php 
namespace Flavio\Arquitetura\Gamification\Domain\Seal;

use Flavio\Arquitetura\Domain\CPF;

interface SealRepository 
{
    public function add(Seal $seal): void;
    public function sealWithCPF(CPF $cpf);
}