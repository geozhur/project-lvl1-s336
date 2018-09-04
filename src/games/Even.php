<?php

namespace BrainGames\Cli;

function genQuestionEven($textAnswer)
{
    $result = rand(1, getrandmax());
    $textAnswer.= $result;

    return [$result, $textAnswer];
}

function runEven()
{
    $condition = 'Answer "yes" if number even otherwise answer "no".';
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
        [$result, $textAnswerGen] = genQuestionEven($textAnswer);

        $flag = checkQuestion(
            $textAnswerGen,
            $textQuestion,
            $result,
            function ($question, $answer) use ($correct, $wrong) {
                $question = isEven($question) ? "yes" : "no";
                if ($answer === $question) {
                    printMessage($correct);
                } else {
                    printWrong($wrong, $answer, $question);
                }
                return $answer === $question ? true : false;
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
