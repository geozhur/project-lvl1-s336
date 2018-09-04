<?php

namespace BrainGames\Cli;

function run()
{
    $questionName = "May I have your name?";
    $helloName = "Hello, %s!";
    printWelcome();
    getName($questionName, $helloName);
}
