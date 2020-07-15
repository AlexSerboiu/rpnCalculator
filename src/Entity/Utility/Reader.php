<?php


namespace App\Entity\Utility;

/**
 * Class Reader
 * @package App\Entity\Utility
 */
class Reader
{

    /**
     * Define an array with all inputs that stop execution
     */
    protected const STOP_EXECUTION_CHARS = [
        'q',
        'quit'
        //EndOfFile
    ];

    /**
     *
     */
    public function read(): string
    {
        echo "Welcome to my Reverse Polish Notation Calculator \n";

        $inputHandler = fopen("php://stdin", "r");

        $result = '';
        do {
            $input  = rtrim(fgets($inputHandler, 128));
            $result .= $input . ' ';
        } while (!in_array(strtolower($input), self::STOP_EXECUTION_CHARS, true));

        fclose($inputHandler);

        return $result;
    }
}