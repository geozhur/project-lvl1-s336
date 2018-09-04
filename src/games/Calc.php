<?php

namespace BrainGames\Cli;

function genQuestionCalc($textAnswer)
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    switch (rand(1, 3)) {
        case 1:
            $act = "+";
            $result = $num1 + $num2;
            break;
        case 2:
            $act = "-";
            $result = $num1 - $num2;
            break;
        case 3:
            $act = "*";
            $result = $num1 * $num2;
            break;
    }
    $textAnswer .= $num1." ".$act." ".$num2;
    return [$result, $textAnswer];
}

function checkQuestionCalc($question, $answer, $text)
{
    if ($answer == $question) {
        printMessage($text['correct']);
    } else {
        printWrong($text['wrong'], $answer, $question);
    }
    return $answer == $question ? true : false;
}

function runCalc()
{
    runTextGame(
        "What is the result of the expression?",
        function ($textAnswer) {
            return genQuestionCalc($textAnswer);
        },
        function ($question, $answer, $text) {
            return checkQuestionCalc($question, $answer, $text);
        }
    );
}
