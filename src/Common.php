<?php

namespace BrainGames\Common;

use function \cli\line;
use function \cli\prompt;

function runTextGame($condition, $getQuestionAndRightAnswer)
{
    $numberQuestions = 3;
    
    line();
    line("Welcome to the Brain Game!");
    line($condition);
    line();
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line();
    for ($i = 0; $i < $numberQuestions; $i++) {
        [$question, $rightAnswer] = $getQuestionAndRightAnswer();

        line("Question: " . $question);
        $answer = prompt("Your answer");

        if ($answer == $rightAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $rightAnswer);
            line("Let's try again, %s", $name);
            exit;
        }
    }

    line("Congratulations, %s!", $name);
}
