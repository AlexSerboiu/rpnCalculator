<?php

namespace App\Entity\Operator\Handler;


use PHPUnit\Framework\TestCase;

/**
 * Class OperatorHandlerTest
 * @author Alex Serboiu <alexandru.serboiu@gmail.com>
 *
 * @package App\Entity\Operator\Handler
 *
 */
class OperatorHandlerTest extends TestCase
{

    /**
     * @param string $input
     * @param int $expected
     * @throws \App\Exception\InvalidInputException
     */
    public function testGetOperatorStack(string $input, int $expected)
    {
        $handler = new OperatorHandler();

        $handler->setOperatorStackFromInput($input);
        $operandStack = $handler->getOperatorStack();

        self::assertSame($expected, count($operandStack));
    }

    /**
     * @return array
     */
    public function providerForOperandStack()
    {
        return [
            'case 0' => [
                'input' => '12',
                'expected' => '0',
            ],
            'case 1' => [
                'input' => '5 5 5 8 + + - q',
                'expected' => '3',
            ],
            'case 2' => [
                'input' => '5 21 31 qwe ewq - -',
                'expected' => '2',
            ],
            'case 3' => [
                'input' => '12 31 32 12 211 + * - / q',
                'expected' => '4',
            ],
        ];
    }
}
