<?php 
namespace Flavio\Arquitetura\Domain;

class CPF 
{
    private string $num;

    public function __construct(string $num)
    {
        $this->setNums($num);
    }

    private function setNums(string $num) 
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if (filter_var($num, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException("CPF inválido");            
        }

        $this->num = $num;
    }

    public function __toString()
    {
        return $this->num;
    }
}

?>