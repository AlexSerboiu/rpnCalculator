<?php


namespace App\Entity\Operator\Binary;


use App\Entity\Operand\AbstractOperand;
use App\Exception\InvalidInputException;
use App\Entity\Operator\AbstractOperator;

/**
 * Class Divide
 * @author Alex Serboiu <alexandru.serboiu@gmail.com>
 *
 * @package App\Entity\Operator\Binary
 *
 */
class Divide
    extends AbstractOperator
{
    private const DIVIDE_OPERATOR = '/';

    /**
     * Late static bind
     *
     * @param string $singleEntity
     * @return self
     */
    public static function init(string $singleEntity): AbstractOperator
    {
        if (self::DIVIDE_OPERATOR !== $singleEntity) {
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
     * @throws InvalidInputException
     */
    public function applyOperator(AbstractOperand $firstOperand, AbstractOperand $secondOperand)
    {
        if (0 === $firstOperand->getValue()) {
            throw new InvalidInputException('Could not divide by 0');
        }
        return $secondOperand->getValue() / $firstOperand->getValue();
    }
}