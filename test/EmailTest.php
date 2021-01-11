<?php 
namespace Flavio\Arquitetura\Test;

use Flavio\Arquitetura\Domain\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase 
{
    public function testEmailNoFormatoInvalidoNaoDevePorderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Endereço de e-mail inválido');
        new Email('email inválido');
    }

    public function testEmailDevePoderSerRepresentadoComoString()
    {
        $email = new Email('endereco@example.com');
        $this->assertSame('endereco@example.com', (string) $email);
    }
}