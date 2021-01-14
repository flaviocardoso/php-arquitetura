<?php 
namespace Flavio\Arquitetura\Academic\Domain;

interface Event 
{
    public function moment(): \DateTimeImmutable;
}

?>