<?php


namespace App\Entity\Operator\Binary;

use App\Entity\Operand\AbstractOperand;
use App\Entity\Operator\AbstractOperator;

/***
 * Class Multiply
 * @package App\Entity\Operator\Binary
 */
class Multiply
    extends AbstractOperator
{

    private const MULTIPLY_OPERATOR = '*';

    /**
     * Late static bind
     *
     * @param string $singleEntity
     * @return self
     */
    public static function init(string $singleEntity): AbstractOperator
    {
        if (self::MULTIPLY_OPERATOR !== $singleEntity) {
            throw new \RuntimeException('Unexpected behaviour! Aborting!');
        }

        return new self();
    }

    /**
     * Can return either a float (for numeric operands) or bool (for other operands e.g Socket)
     *
     * @param $firstOperand
     * @param $secondOperand
     * @return mixed
     */
    public function applyOperator(AbstractOperand $firstOperand, AbstractOperand $secondOperand)
    {
        return $firstOperand->getValue() * $secondOperand->getValue();
    }
}