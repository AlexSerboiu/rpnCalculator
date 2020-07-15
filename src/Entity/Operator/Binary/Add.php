<?php


namespace App\Entity\Operator\Binary;

use App\Entity\Operand\AbstractOperand;
use App\Entity\Operator\AbstractOperator;

/**
 * Class Add
 * @package App\Entity\Operator\Binary
 */
class Add
    extends AbstractOperator
{
    private const ADD_OPERATOR = '+';

    /**
     * Late static bind
     *
     * @param string $singleEntity
     * @return self
     */
    public static function init(string $singleEntity)
    {
        if (self::ADD_OPERATOR !== $singleEntity) {
            throw new \RuntimeException('Unexpected behaviour! Aborting!');
        }

        return new self();
    }

    /**
     * @param $firstOperand
     * @param $secondOperand
     * @return mixed
     */
    public function applyOperator(AbstractOperand $firstOperand, AbstractOperand $secondOperand)
    {
        return $firstOperand->getValue() + $secondOperand->getValue();
    }
}