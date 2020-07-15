<?php


namespace App\Entity\Operator\Handler;

use App\Entity\Operator\Binary\Add;
use App\Entity\Operator\Binary\Divide;
use App\Exception\InvalidInputException;
use App\Entity\Operator\Binary\Multiply;
use App\Entity\Operator\AbstractOperator;
use App\Entity\Operator\Binary\Substract;

/**
 * Class OperatorHandler
 * @package App\Entity\Operator\Handler
 */
class OperatorHandler
{
    /***
     * @var AbstractOperator[]
     */
    protected $operatorStack = [];

    /**
     * @param string $input
     *
     * @throws InvalidInputException
     */
    public function setOperatorStackFromInput(string $input)
    {
        $inputParts = explode(" ", $input);
        foreach ($inputParts as $singleEntity) {
            if ($singleEntity != (float)$singleEntity) {
                continue;
            }
            switch ($singleEntity) {
                case "+":
                    $this->operatorStack[] = Add::getOperator($singleEntity);
                    break;
                case "-":
                    $this->operatorStack[] = Substract::getOperator($singleEntity);
                    break;
                case "/":
                    $this->operatorStack[] = Divide::getOperator($singleEntity);
                    break;
                case "*":
                    $this->operatorStack[] = Multiply::getOperator($singleEntity);
                    break;
                default:
                    break;

            }
        }
    }

    /**
     * @return AbstractOperator[]
     */
    public function getOperatorStack(): array
    {
        return $this->operatorStack;
    }
}