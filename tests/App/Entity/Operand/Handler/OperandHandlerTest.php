<?php

namespace App\Entity\Operand\Handler;

use PHPUnit\Framework\TestCase;

/**
 * Class OperandHandlerTest
 * @author Alex Serboiu <alexandru.serboiu@gmail.com>
 *
 * @package App\Entity\Operand\Handler
 *
 */
class OperandHandlerTest extends TestCase
{
    /***
     * @dataProvider providerForOperandStack
     *
     * @param string $input
     * @param $expected
     */
    public function testGetOperandStack(string $input, int $expected)
    {
        $handler = new OperandHandler();

        $handler->setOperandStackFromInput($input);
        $operandStack = $handler->getOperandStack();

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
                'expected' => '1',
            ],
            'case 1' => [
                'input' => '5 5 5 8 + + - q',
                'expected' => '4',
            ],
            'case 2' => [
                'input' => '5 21 31 qwe ewq - -',
                'expected' => '3',
            ],
        ];
    }
}
