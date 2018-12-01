<?php
$input = file('input.txt');
$seen = [];
$result = 0;
while(true) {
    foreach($input as $data) {
        $result += $data;

        if($seen[$result]) {
            echo $result . PHP_EOL;
            die(0);
        }
        $seen[$result] = true;
    }
}