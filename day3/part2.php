<?php
$input = file('input.txt');
/*
$input = [];
$input[] = '#1 @ 1,3: 4x4';
$input[] = '#2 @ 3,1: 4x4';
$input[] = '#3 @ 5,5: 2x2';
*/
foreach($input as $id => $data) {
    preg_match('/#(\d+) @ (\d+),(\d+): (\d+)x(\d+)/', $data, $match);
    $input[$id] = [
        'id' => (int) $match[1],
        'x' => (int) $match[2],
        'y' => (int) $match[3],
        'w' => (int) $match[4],
        'h' => (int) $match[5]
    ];
}

function overlap($a, $b) {
    $result = (
        ( $a['x'] < ($b['x'] + $b['w']) )
        && ( $a['y'] < ($b['y'] + $b['h']) )
        && ( $b['x'] < ($a['x'] + $a['w']) )
        && ( $b['y'] < ($a['y'] + $a['h']) )
    );
    return $result;
}

foreach($input as $data) {
    $found = true;
    foreach($input as $data2) {
        if ($data['id'] == $data2['id']) {
            continue;
        }
        if (overlap($data, $data2)) {
            $found = false;
            break;
        }

        if ($found) {
            echo $data['id'] . PHP_EOL;
        }
    }
}