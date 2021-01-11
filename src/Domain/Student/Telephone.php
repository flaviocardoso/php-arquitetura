<?php 
namespace Flavio\Arquitetura\Domain\Student;

class Telephone 
{
    private string $ddd;
    private string $num;

    public function __construct(string $ddd, string $num)
    {
        $this->setDDD($ddd);
        $this->setNums($num);
    }

    private function setDDD(string $ddd)
    {
        if (preg_match('/\d{2}/', $ddd) !== 1) {
            throw new \InvalidArgumentException("DDD inválido");            
        }

        return $this->ddd = $ddd;
    }

    private function setNums(string $num)
    {
        if (preg_match('/\d{8,9}/', $num) !== 1) {
            throw new \InvalidArgumentException ("Número de telefone inválido");            
        }

        return $this->num = $num;
    }

    public function ddd(): string 
    {
        return $this->ddd;
    }

    public function num(): string 
    {
        return $this->num;
    }

    public function __toString() 
    {
        return "({$this->ddd}) {$this->num}";
    }
}

?>