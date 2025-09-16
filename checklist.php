<?php

function getKey(): string {
    if (strncasecmp(PHP_OS, 'WIN', 3) !== 0) {
        system('stty cbreak -echo');
        $char = fgetc(STDIN);
        system('stty sane');
    } else { 
        $char = trim(shell_exec('choice /c YN /n'));
    }
    return strtolower($char);
}

$questions = [
    "Did you delete all the console logs?",
    "Did you change the version of the project?",
    "Did you check the .env files?"
    "Did you check if the build is building?",
];

foreach ($questions as $q) {
    echo "$q [y/n]: ";
    $input = getKey();
    echo "$input\n"; // show what was pressed
    if ($input !== 'y') {
        echo "You are not ready \n";
        exit;
    }
}

echo "Congrats, you are ready \n";

