<?php

use App\Action\Calculator;
use App\Entity\Utility\Reader;
use App\Entity\Operand\Handler\OperandHandler;
use App\Entity\Operator\Handler\OperatorHandler;

include 'vendor/autoload.php';



(new Calculator(
    new OperandHandler(),
    new OperatorHandler()
))->__invoke();
