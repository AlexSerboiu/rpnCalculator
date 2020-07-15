<?php


namespace App\Entity\Operand\Handler;

use App\Entity\Utility\Reader;
use App\Entity\Operand\FloatOperand;
use App\Entity\Operand\AbstractOperand;
use App\Entity\Operator\AbstractOperator;

/**
 * Class OperandHandler
 * @package App\Entity\Operand\Handler
 */
class OperandHandler
{

    /***
     * @var AbstractOperand[]
     */
    protected $operandStack = [];

    /**
     * @param string $input
     */
    public function setOperandStackFromInput(string $input)
    {
        $inputParts = explode(" ", $input);

        foreach ($inputParts as $singleEntity) {

            // For the moment - More conditions needs to be added for new features
            if ($singleEntity != (float)$singleEntity || in_array($singleEntity, AbstractOperator::OPERATORS_COLLECTION)) {
                continue;
            }

            $this->operandStack[] = FloatOperand::getOperand($singleEntity);
        }
    }

    /**
     * @return AbstractOperand[]
     */
    public function getOperandStack(): array
    {
        return $this->operandStack;
    }
}