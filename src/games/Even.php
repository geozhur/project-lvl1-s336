<?php

namespace BrainGames\Even;

use function \BrainGames\Common\runTextGame;

function isEven($num)
{
    return $num % 2 ? false : true;
}

function getQuestionAndRightAnswerEven($textQuestion)
{
    $rand = rand(1, getrandmax());
    $textQuestion .= $rand;
    $rightAnswer = isEven($rand) ? "yes" : "no";
    return [$textQuestion, $rightAnswer];
}

function runEven()
{
    runTextGame(
        "Answer \"yes\" if number even otherwise answer \"no\".",
        3,
        function ($textQuestion) {
            return \BrainGames\Even\getQuestionAndRightAnswerEven($textQuestion);
        }
    );
}
