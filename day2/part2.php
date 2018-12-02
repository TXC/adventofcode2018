<?php
$input = file('input.txt');

$shortest = -1;
foreach($input as $data) {
    foreach($input as $data2) {
        if($data == $data2) {
            continue;
        }
        $lev = levenshtein($data, $data2);
        if ($lev <= $shortest || $shortest < 0) {
            $boxes = [$data, $data2];
            $shortest = $lev;
        }
    }
}
var_dump($boxes);
