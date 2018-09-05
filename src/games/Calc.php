<?php

namespace BrainGames\Calc;

use function \BrainGames\Common\runTextGame;

function getQuestionAndRightAnswerCalc($textQuestion)
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    switch (rand(1, 3)) {
        case 1:
            $act = "+";
            $rightAnswer = $num1 + $num2;
            break;
        case 2:
            $act = "-";
            $rightAnswer = $num1 - $num2;
            break;
        case 3:
            $act = "*";
            $rightAnswer = $num1 * $num2;
            break;
    }
    $textQuestion .= $num1 . " " . $act . " " . $num2;
    return [$textQuestion, $rightAnswer];
}

function runCalc()
{
    runTextGame(
        "What is the result of the expression?",
        3,
        function ($textQuestion) {
            return \BrainGames\Calc\getQuestionAndRightAnswerCalc($textQuestion);
        }
    );
}
