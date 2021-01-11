<?php 
namespace Flavio\Arquitetura\Infra\Student;

use Flavio\Arquitetura\Domain\Student\PasswordCipher;

class PasswordCipherMD5 implements PasswordCipher 
{
    public function cipher(string $password): string
    {
        return md5($password);
    }

    public function verify(string $textPassword, string $cipherPassword): bool
    {
        return md5($textPassword) === $cipherPassword;
    }
}