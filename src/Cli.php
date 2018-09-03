<?php

namespace BrainGames\Cli;

use function \cli\line;

class Cli 
{ 
    public function run() 
    {
        line('Welcome to the Brain Game!');
        line();
        $name = \cli\prompt('May I have your name?');
        line("Hello, %s!", $name);
    }
}