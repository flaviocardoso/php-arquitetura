<?php 
namespace Flavio\Arquitetura\Academic\Domain\Recommendation;

use Flavio\Arquitetura\Academic\Domain\Student\Student;

class Recommendation 
{
    private Student $indicative;
    private Student $indicated;
    private \DateTimeImmutable $data;

    public function __construct(Student $indicative, Student $indicated) {
        $this->indicated = $indicated;
        $this->indicative = $indicative;

        $this->data = new \DateTimeImmutable();
    }
}

?>