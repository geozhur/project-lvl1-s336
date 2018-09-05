<?php

namespace BrainGames\Balance;

use function \BrainGames\Common\runTextGame;

function getBalanceNum($num)
{
    $arr = str_split(strval($num));

    $isBalance = false;

    while (!$isBalance) {
        $max = max($arr);
        $min = min($arr);

        if ($max - $min > 1) {
            $keyMax = array_search($max, $arr);
            $keyMin = array_search($min, $arr);
            $arr[$keyMax] -= 1;
            $arr[$keyMin] += 1;
        } else {
            $isBalance = true;
        }
    }

    sort($arr);
    return implode($arr);
}

function getQuestionAndRightAnswerBalance()
{
    $num = rand(100, 10000);

    $rightAnswer = getBalanceNum($num);
    $question = $num;
    return [$question, $rightAnswer];
}

function runBalance()
{
    runTextGame(
        "Balance the given number.",
        function () {
            return \BrainGames\Balance\getQuestionAndRightAnswerBalance();
        }
    );
}
