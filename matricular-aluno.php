<?php

use Flavio\Arquitetura\App\StudentEnroll\StudentEnroll;
use Flavio\Arquitetura\App\StudentEnroll\StudentEnrollDTO;
use Flavio\Arquitetura\Domain\Student\EventPublication;
use Flavio\Arquitetura\Domain\Student\LogStudentRegistered;
use Flavio\Arquitetura\Infra\Student\StudentMemoryRepository;

require 'vendor/autoload.php';

$cpf = '123.456.789-90';
$nome = 'Robert Dixon';
$email = 'exemple@exemple.com';
$ddd = '21';
$num = '33333333';

$publicate = new EventPublication();
$publicate->addListener(new LogStudentRegistered());
$useCase = new StudentEnroll(new StudentMemoryRepository(), $publicate);

$useCase->execute(new StudentEnrollDTO ($cpf, $nome, $email));