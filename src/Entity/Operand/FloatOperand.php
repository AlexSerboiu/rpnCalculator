<?php


namespace App\Entity\Operand;

/**
 * Class FloatOperand
 * @package App\Entity\Operand
 */
class FloatOperand
    extends AbstractOperand
{
    /**
     * FloatOperand constructor.
     */
    public function __construct($value)
    {
        $this->value = $value;
    }


    /**
     * @param $value
     * @return FloatOperand
     */
    protected static function init($value)
    {
        return new self($value);
    }
}