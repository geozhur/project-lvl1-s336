<?php

namespace BrainGames\Calc;

use function \BrainGames\Common\runTextGame;

function getQuestionAndRightAnswerCalc()
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
    $question = $num1 . " " . $act . " " . $num2;
    return [$question, $rightAnswer];
}

function runCalc()
{
    runTextGame(
        "What is the result of the expression?",
        function () {
            return \BrainGames\Calc\getQuestionAndRightAnswerCalc();
        }
    );
}
