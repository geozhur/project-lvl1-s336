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

function getQuestionAndRightAnswerGcd()
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);

    $rightAnswer = getGcd($num1, $num2);
    $question = "{$num1} {$num2}";
    return [$question, $rightAnswer];
}

function runGcd()
{
    runTextGame(
        "Find the greatest common divisor of given numbers.",
        function () {
            return \BrainGames\Gcd\getQuestionAndRightAnswerGcd();
        }
    );
}
