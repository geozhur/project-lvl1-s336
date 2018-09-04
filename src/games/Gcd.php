<?php

namespace BrainGames\Cli;

function genQuestionGcd($textAnswer)
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $n1 = $num1;
    $n2 = $num2;
    
    while ($num1 != $num2) {
        if ($num1 > $num2) {
            $num1 =  $num1 - $num2;
        } else {
            $num2  = $num2 - $num1;
        }
    }

    $textAnswer .= $n1." ".$n2;
    return [$num2, $textAnswer];
}

function checkQuestionGcd($question, $answer, $text)
{
    if ($answer == $question) {
        printMessage($text['correct']);
    } else {
        printWrong($text['wrong'], $answer, $question);
    }
    return $answer == $question ? true : false;
}

function runGcd()
{
    runTextGame(
        "Find the greatest common divisor of given numbers.",
        function ($textAnswer) {
            return genQuestionGcd($textAnswer);
        },
        function ($question, $answer, $text) {
            return checkQuestionGcd($question, $answer, $text);
        }
    );
}
