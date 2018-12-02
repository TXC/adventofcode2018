<?php
$input = file('input.txt');
$total_twos = 0;
$total_threes = 0;
foreach($input as $data) {
    $count = count_chars($data, 1);
    $twos = 0;
    $threes = 0;
    foreach($count as $i => $val) {
        if($val == 2 && $twos == 0) {
            $twos++;
            $total_twos++;
        } else if ($val == 3 && $threes == 0) {
            $threes++;
            $total_threes++;
        }
    }
}
echo ($total_twos * $total_threes) . PHP_EOL;