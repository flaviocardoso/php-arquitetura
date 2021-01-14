<?php 
namespace Flavio\Arquitetura\Academic\App\Recommendation;

use Flavio\Arquitetura\Academic\Domain\Student\Student;

interface RecommendationSendEmail 
{
    public function SendTo(Student $student): void;
}

?>