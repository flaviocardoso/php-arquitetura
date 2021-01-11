<?php 
namespace Flavio\Arquitetura\Domain\Student;

interface PasswordCipher 
{
    public function cipher(string $password): string;
    public function verify(string $textPassword, string $cipherPassword): bool;
}

?>