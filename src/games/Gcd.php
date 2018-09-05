<?php

namespace BrainGames\Gcd;

use function \BrainGames\Common\runTextGame;

function getGcd($num1, $num2)
{
    while ($num1 != $num2) {
        if ($num1 > $num2) {
            $num1 = $num1 - $num2;
        } else {
            $num2 = $num2 - $num1;
        }
    }

    return $num2;
}

function getQuestionAndRightAnswerGcd($textQuestion)
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);

    $rightAnswer = getGcd($num1, $num2);
    $textQuestion .= $num1 . " " . $num2;
    return [$textQuestion, $rightAnswer];
}

function runGcd()
{
    runTextGame(
        "Find the greatest common divisor of given numbers.",
        3,
        function ($textQuestion) {
            return \BrainGames\Gcd\getQuestionAndRightAnswerGcd($textQuestion);
        }
    );
}
