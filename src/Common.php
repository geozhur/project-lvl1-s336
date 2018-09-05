<?php

namespace BrainGames\Common;

use function \cli\line;
use function \cli\prompt;

function getName($question, $helloname)
{
    line();
    $name = prompt($question);
    line($helloname, $name);
    line();
    return $name;
}

function getText()
{
    return array(
        'welcome' => "Welcome to the Brain Game!",
        'condition' => "What is the result of the expression?",
        'wrong' => "'%s' is wrong answer ;(. Correct answer was '%s'",
        'bed' => "Let's try again, %s",
        'good' => "Congratulations, %s",
        'correct' => "Correct!",
        'question' => "Question: ",
        'answer' => "Your answer",
        'questionName' => "May I have your name?",
        'helloName' => "Hello, %s!",
    );
}

function runTextGame($condition, $numberQuestions, $getQuestionAndRightAnswer)
{
    $text = getText();
    $text['condition'] = $condition;

    line();
    line($text['welcome']);
    line($text['condition']);
    $name = getName($text['questionName'], $text['helloName']);
    $flag = false;
    for ($i = 0; $i < $numberQuestions; $i++) {
        [$textQuestion, $rightAnswer] = $getQuestionAndRightAnswer($text['question']);

        line($textQuestion);
        $answer = prompt($text['answer']);

        if ($answer == $rightAnswer) {
            line($text['correct']);
            $flag = true;
        } else {
            line($text['wrong'], $answer, $rightAnswer);
            $flag = false;
            break;
        }
    }

    if ($flag) {
        line($text['good'], $name);
    } else {
        line($text['bed'], $name);
    }
}
