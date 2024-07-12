<?php
for ($j = 100; $j >= 1; $j--) {
    $rep = false;
    for ($i = 2; $i < ($j / 2); $i++) {
        if ($j % $i === 0) {
            $rep = true;
            break;
        }
    }
    if (! $rep)
        echo $j . "\n";
}

