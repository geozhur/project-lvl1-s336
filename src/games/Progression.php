<?php

namespace BrainGames\Progression;

use function \BrainGames\Common\runTextGame;

const LENGTH_PROGRESSION = 10;
const MIN_FIRST_ELEM_PROGRESSION = 10;
const MAX_FIRST_ELEM_PROGRESSION = 100;
const MAX_STEP_PROGRESSION = 10;

function getQuestionAndRightAnswerProgression()
{
    $numFirst = rand(MIN_FIRST_ELEM_PROGRESSION, MAX_FIRST_ELEM_PROGRESSION);
    $stepProgression = rand(1, MAX_STEP_PROGRESSION);
    $keyAnswer = rand(0, LENGTH_PROGRESSION - 1);
    $numArr = [];
    $numMax = $numFirst + LENGTH_PROGRESSION * $stepProgression;

    for ($i = $numFirst; $i < $numMax; $i += $stepProgression) {
        $numArr[] = $i;
    }

    $rightAnswer = $numArr[$keyAnswer];
    $numArr[$keyAnswer] = '..';
    $question = implode(' ', $numArr);

    return [$question, $rightAnswer];
}

function runProgression()
{
    runTextGame(
        "What number is missing in this progression?",
        function () {
            return \BrainGames\Progression\getQuestionAndRightAnswerProgression();
        }
    );
}
