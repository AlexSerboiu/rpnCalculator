# rpnCalculator

## Introduction
Reverse Polish notation (RPN), also known as Polish postfix notation or simply postfix notation, is a mathematical notation in which operators follow their operands, 
in contrast to Polish notation (PN), in which operators precede their operands. 
It does not need any parentheses as long as each operator has a fixed number of operands. 
The description "Polish" refers to the nationality of logician Jan Łukasiewicz, who invented Polish notation in 1924. (source: Wikipedia.com)

To implement it i choose to use two stacks, one of operands and one of operators. After the user introduces the numbers and the operators, the program group this info in two arrays.
In order to actually solve the given equation, I iterate over the operators stack, popping each time the last two elements from the operands stack. Depending on operand, a separate class
is called and the operation is done accordingly.

## Technical choices

It may look like an overkill to write multiple classes for a problem that could have been solved in 100-200 lines but I like the code to be modular, easy to understand and easy to scale.
So each method should do only one thing, this way the code is separated, the debugging is pretty easy and easy to implement unitTests. 

I used a separate class to read the users input, two separate handlers (one for each stack), one class for each operator, with one interface that all classes implement.

Let's say that we need to add a new operator to the calculator. All we have to do is to create a class for it, and implement the logic in Calculator class and that's all.

## Things left and TODO's

UnitTesting is an important part of any application in order to keep the code functional so i think that the code coverage for unitTests should be as higher as possible.

## How to run the code

To run the rpnCalculator all you have to do is to download the project, have a version of PHP 7.2^ installed and run the index.php from CLI (php -f index.php).
After that you will have to introduce your data, using the following pattern. "X Operands separated by ' '(spaces) and X-1 Operators" (e.g. 5 5 5 8 + + -), then press Enter and 
introduce the key to submit the input. The keys are "q" or "quit".
