<?php


namespace App\Entity\Operator;

use http\Exception\RuntimeException;
use App\Entity\Operator\Binary\BinaryOperatorInterface;

/**
 * Class AbstractOperator
 * @package App\Entity\Operator
 */
abstract class AbstractOperator
    implements BinaryOperatorInterface
{
    /**
     *
     */
    public const OPERATORS_COLLECTION = [
        '+',
        '-',
        '/',
        '*',
        /* '**' ExponentialOperator */
        /* 'F' FileOperator */
    ];

    /**
     * @param $singleEntity
     */
    public static function init(string $singleEntity)
    {
        throw new \RuntimeException('Function not implemented');
    }

    /***
     * @param $singleEntity
     * @return AbstractOperator
     */
    public static function getOperator(string $singleEntity)
    {
        return static::init($singleEntity);
    }


}