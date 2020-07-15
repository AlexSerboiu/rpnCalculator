<?php


namespace App\Entity\Operand;

/**
 * Class AbstractOperand
 * @package App\Entity\Operand
 */
abstract class AbstractOperand
{
    /**
     * @var float
     */
    protected $value;


    /**
     * @return string
     */
    public function getValue() : float
    {
       return (float) $this->value;
    }
    /**
     * Late static binding
     *
     * @param $entity
     * @return mixed
     */
    public static function getOperand($entity)
    {
        return static::init($entity);
    }


    abstract protected static function init($entity);


}