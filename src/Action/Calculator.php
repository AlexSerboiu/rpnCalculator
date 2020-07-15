<?php


namespace App\Action;

use App\Entity\Utility\Reader;
use App\Entity\Operand\FloatOperand;
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

            // Clear input - exitMarker and "enter"
            array_pop($operandsStack);
            array_pop($operandsStack);

            // Iterate over operators and apply them to the operands
            foreach ($operatorsStack as $operator) {
                echo '1' .  print_r($operandsStack,true);

                $firstOperand  = array_pop($operandsStack);
                $secondOperand = array_pop($operandsStack);

                echo "values : \n";
                echo $firstOperand->getValue();
                echo $secondOperand->getValue();
                $partialResult = $operator->applyOperator($firstOperand, $secondOperand);
                echo '2' . print_r($operandsStack,true);
                $operandsStack[] = new FloatOperand($partialResult);

                echo '3' . print_r($operandsStack,true);


                echo $partialResult;
            }


        } catch (\Throwable $e) {
            echo sprintf('Error encountered. Error Message : %s. Aborting!', $e->getMessage());
        }
    }
}