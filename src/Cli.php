<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    printWelcome();
    getName();
}

function printWelcome()
{
    line();
    line('Welcome to the Brain Game!');
}

function getName($question, $helloname)
{
    line();
    $name = prompt($question);
    printName($helloName, $name);
    return $name;
}

function printName($text, $name)
{
    line($text, $name);
}

function printMessage($condition)
{
    line($condition);
}

function printWrong($wrong, $answer, $question)
{
    line($wrong, $answer, $question);
}

function checkQuestion($textAnswer, $textQuestion, $question, $condfunc)
{
    line($textAnswer, $question);
    $answer = prompt($textQuestion);

    if ($condfunc($question, $answer)) {
        return true;
    }

    return false;
}

function isEven($num)
{
    return $num % 2 ? false : true;
}
