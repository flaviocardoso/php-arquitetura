<?php 
namespace Flavio\Arquitetura\Infra\Student;

use Flavio\Arquitetura\Domain\Student\PasswordCipher;

class PasswordCipherPHP implements PasswordCipher 
{
    public function cipher(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }

    public function verify(string $textPassword, string $cipherPassword): bool
    {
        return password_verify($textPassword, $cipherPassword);
    }
}