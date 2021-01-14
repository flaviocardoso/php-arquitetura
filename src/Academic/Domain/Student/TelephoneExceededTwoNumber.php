<?php
namespace Flavio\Arquitetura\Academic\Domain\Student;

class TelephoneExceededTwoNumber extends \DomainException
{
    public function __construct()
    {
        parent::__construct("Telefone não pode exceder o numero de dois telefones");
    }
}