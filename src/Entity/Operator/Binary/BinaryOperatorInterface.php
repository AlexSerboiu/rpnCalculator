<?php


namespace App\Entity\Operator\Binary;


use App\Entity\Operand\AbstractOperand;
use App\Entity\Operator\AbstractOperator;

/**
 * Interface BinaryOperatorInterface
 * @package App\Entity\Operator\Binary
 */
interface BinaryOperatorInterface
{
    /**
     * Can return either a float (for numeric operands) or bool (for other operands e.g Socket)
     *
     * @param $firstOperand
     * @param $secondOperand
     * @return mixed
     */
    public function applyOperator(AbstractOperand $firstOperand, AbstractOperand $secondOperand);

}