<?php


namespace App\Action;

use App\Entity\Utility\Reader;
use App\Entity\Operand\FloatOperand;
use App\Exception\InvalidInputException;
use App\Entity\Operand\Handler\OperandHandler;
use App\Entity\Operator\Handler\OperatorHandler;

/**
 * Class Calculator
 * @author Alex Serboiu <alexandru.serboiu@gmail.com>
 *
 * @package App\Action
 *
 */
class Calculator
{
    /**
     * @var OperandHandler
     */
    protected $operandHandler;

    /**
     * @var OperatorHandler
     */
    protected $operatorHandler;

    /**
     * Calculator constructor.
     * @param OperandHandler $operationHandler
     * @param OperatorHandler $operatorHandler
     */
    public function __construct(OperandHandler $operandHandler, OperatorHandler $operatorHandler)
    {
        $this->operandHandler  = $operandHandler;
        $this->operatorHandler = $operatorHandler;
        $this->reader          = new Reader();
    }


    /**
     *
     */
    public function __invoke()
    {

        try {

            $input = $this->reader->read();

            $this->operatorHandler->setOperatorStackFromInput($input);
            $this->operandHandler->setOperandStackFromInput($input);


            $operatorsStack = $this->operatorHandler->getOperatorStack();
            $operandsStack  = $this->operandHandler->getOperandStack();


            // Check if there are enough operators and operands
            if (count($this->operandHandler->getOperandStack()) - count($this->operatorHandler->getOperatorStack()) !== 1) {
                throw new InvalidInputException("Please add the correct number of operands and operators");
            }

            // Iterate over operators and apply them to the operands
            foreach ($operatorsStack as $operator) {
                $firstOperand  = array_pop($operandsStack);
                $secondOperand = array_pop($operandsStack);

                $partialResult = $operator->applyOperator($firstOperand, $secondOperand);
                $operandsStack[] = new FloatOperand($partialResult);
            }

            echo "\n Result is : " . $partialResult;


        } catch (\Throwable $e) {
            echo sprintf('Error encountered. Error Message : %s. Aborting!', $e->getMessage());
        }
    }
}