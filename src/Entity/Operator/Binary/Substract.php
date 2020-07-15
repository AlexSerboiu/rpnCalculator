<?php


namespace App\Entity\Operator\Binary;

use App\Entity\Operand\AbstractOperand;
use App\Entity\Operator\AbstractOperator;

/**
 * Class Substract
 * @package App\Entity\Operator\Binary
 */
class Substract
    extends AbstractOperator
{

    private const SUBSTRACT_OPERATOR = '-';

    /**
     * Late static bind
     *
     * @param string $singleEntity
     * @return self
     */
    public static function init(string $singleEntity): AbstractOperator
    {
        if (self::SUBSTRACT_OPERATOR !== $singleEntity) {
            throw new \RuntimeException('Unexpected behaviour! Aborting!');
        }

        return new self();
    }

    /**
     * Can return either a float (for numeric operands) or bool (for other operands e.g Socket)
     *
     * @param $firstOperand
     * @param $secondOperand
     * @return float
     */
    public function applyOperator(AbstractOperand $firstOperand, AbstractOperand $secondOperand)
    {
        return $secondOperand->getValue() - $firstOperand->getValue();
    }
}