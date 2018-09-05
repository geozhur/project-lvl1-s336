<?php

namespace BrainGames\Cli;

use function \cli\line;

function run()
{
    $questionName = "May I have your name?";
    $helloName = "Hello, %s!";
    line();
    line('Welcome to the Brain Game!');
    \BrainGames\Common\getName($questionName, $helloName);
}
