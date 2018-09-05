<?php

namespace BrainGames\Gcd;

use function \BrainGames\Common\runTextGame;

function getQuestionAndRightAnswerGcd($textQuestion)
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $n1 = $num1;
    $n2 = $num2;

    while ($n1 != $n2) {
        if ($n1 > $n2) {
            $n1 = $n1 - $n2;
        } else {
            $n2 = $n2 - $n1;
        }
    }

    $textQuestion .= $num1 . " " . $num2;
    return [$textQuestion, $n2];
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
