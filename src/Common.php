<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function printWelcome()
{
    line();
    line('Welcome to the Brain Game!');
}

function getName($question, $helloname)
{
    line();
    $name = prompt($question);
    printName($helloname, $name);
    line();
    return $name;
}

function printName($text, $name)
{
    line($text, $name);
}

function printMessage($condition)
{
    line($condition);
}

function printWrong($wrong, $answer, $question)
{
    line($wrong, $answer, $question);
}

function checkQuestion($textAnswer, $text)
{
    line($textAnswer);
    $answer = prompt($text['textQuestion']);

    return $answer;
}

function isEven($num)
{
    return $num % 2 ? false : true;
}

function getText()
{
    return array(
    'condition' => "What is the result of the expression?",
    'wrong' => "'%s' is wrong answer ;(. Correct answer was '%s'",
    'bed' => "Let's try again, %s",
    'good' => "Congratulations, %s",
    'correct' => "Correct!",
    'textAnswer' => "Question: ",
    'textQuestion' => "Your answer",
    'questionName' => "May I have your name?",
    'helloName' => "Hello, %s!"
    );
}

function runTextGame($condition, $genQuestion, $checkQuestion)
{
    $text = getText();
    $text['condition'] = $condition;

    printWelcome();
    printMessage($text['condition']);
    $name = getName($text['questionName'], $text['helloName']);
    $flag = false;
    for ($i = 0; $i < 3; $i++) {
        [$result, $textAnswerGen] = $genQuestion($text['textAnswer']);

        $answer = checkQuestion($textAnswerGen, $text);
        if (!$checkQuestion($result, $answer, $text)) {
            break;
        }
    }

    if ($flag) {
        printName($text['good'], $name);
    } else {
        printName($text['bed'], $name);
    }
}
