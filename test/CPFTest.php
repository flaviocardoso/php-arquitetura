<?php 
namespace Flavio\Arquitetura\Test;

use Flavio\Arquitetura\Domain\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function testCPFComNumeroNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('CPF inválido');
        new CPF('12345678910');
    }

    public function testCPFDevePoderSerReprentadoComoString()
    {
        $cpf = new CPF('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}