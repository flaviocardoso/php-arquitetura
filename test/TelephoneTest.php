<?php
namespace Flavio\Arquitetura\Test;

use Flavio\Arquitetura\Domain\Student\Telephone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase 
{
    public function testTelephoneDevePoderSerRepresentadoComoString() 
    {
        $telefone = new Telephone('21', '999999999');
        $this->assertSame('(21) 999999999', (string) $telefone);
    }

    public function testTelephoneComDDDInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("DDD inválido");
        new Telephone('ddd', '999999999');
    }

    public function testTelefoneComNumeroInvalidoNaoDeveExister()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Número de telefone inválido");
        new Telephone('21', 'número');
    }
}