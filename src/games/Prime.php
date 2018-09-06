<?php

namespace BrainGames\Prime;

use function \BrainGames\Common\runTextGame;

const MAX_NUM_PRIME = 1000;

function isPrime($num)
{
    if ($num == 1) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function getQuestionAndRightAnswerPrime()
{
    $rand = rand(1, MAX_NUM_PRIME);
    $question = $rand;
    $rightAnswer = isPrime($rand) ? "yes" : "no";
    return [$question, $rightAnswer];
}

function runPrime()
{
    runTextGame(
        "Answer \"yes\" if number prime otherwise answer \"no\".",
        function () {
            return \BrainGames\Prime\getQuestionAndRightAnswerPrime();
        }
    );
}
