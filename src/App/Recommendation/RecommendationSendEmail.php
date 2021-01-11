<?php 
namespace Flavio\Arquitetura\App\Recommendation;

use Flavio\Arquitetura\Domain\Student\Student;

interface RecommendationSendEmail 
{
    public function SendTo(Student $student): void;
}

?>