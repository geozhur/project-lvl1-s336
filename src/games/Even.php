<?php

namespace BrainGames\Even;

use function \BrainGames\Common\runTextGame;

function isEven($num)
{
    return $num % 2 === 0 ? true : false;
}

function getQuestionAndRightAnswerEven()
{
    $rand = rand(1, getrandmax());
    $question = $rand;
    $rightAnswer = isEven($rand) ? "yes" : "no";
    return [$question, $rightAnswer];
}

function runEven()
{
    runTextGame(
        "Answer \"yes\" if number even otherwise answer \"no\".",
        function () {
            return \BrainGames\Even\getQuestionAndRightAnswerEven();
        }
    );
}
