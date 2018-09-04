<?php

namespace BrainGames\Cli;

function genQuestionEven($textAnswer)
{
    $result = rand(1, getrandmax());
    $textAnswer.= $result;
    return [$result, $textAnswer];
}

function checkQuestionEven($question, $answer, $text)
{
    $question = isEven($question) ? "yes" : "no";
    if ($answer === $question) {
        printMessage($text['correct']);
    } else {
        printWrong($text['wrong'], $answer, $question);
    }
    return $answer === $question ? true : false;
}

function runEven()
{
    runTextGame(
        "Answer \"yes\" if number even otherwise answer \"no\".",
        function ($textAnswer) {
            return genQuestionEven($textAnswer);
        },
        function ($question, $answer, $text) {
            return checkQuestionEven($question, $answer, $text);
        }
    );
}
