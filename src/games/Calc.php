<?php

namespace BrainGames\Cli;

function genQuestionCalc($textAnswer)
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);

    switch (rand(1, 3)) {
        case 1:
            $act = "+";
            $result = $num1 + $num2;
            break;
        case 2:
            $act = "-";
            $result = $num1 - $num2;
            break;
        case 3:
            $act = "*";
            $result = $num1 * $num2;
            break;
    }

    $textAnswer .= $num1." ".$act." ".$num2;

    return [$result, $textAnswer];
}

function runCalc()
{
    $condition = 'What is the result of the expression?';
    $wrong = "'%s' is wrong answer ;(. Correct answer was '%s'";
    $bed = "Let's try again, %s";
    $good = "Congratulations, %s";
    $correct = "Correct!";
    $textAnswer = "Question: ";
    $textQuestion = "Your answer";
    $questionName = "May I have your name?";
    $helloName = "Hello, %s!";

    printWelcome();
    printMessage($condition);
    $name = getName($questionName, $helloName);
    $flag = false;
    for ($i = 0; $i < 3; $i++) {
        [$result, $textAnswerGen] = genQuestionCalc($textAnswer);

        $flag = checkQuestion(
            $textAnswerGen,
            $textQuestion,
            $result,
            function ($question, $answer) use ($correct, $wrong) {
                if ($answer == $question) {
                    printMessage($correct);
                } else {
                    printWrong($wrong, $answer, $question);
                }
                return $answer == $question ? true : false;
            }
        );

        if (!$flag) {
            break;
        }
    }

    if ($flag) {
        printName($good, $name);
    } else {
        printName($bed, $name);
    }
}
