<?php
$input = file('input.txt');

foreach($input as $id => $data) {
    preg_match('/#(\d+) @ (\d+),(\d+): (\d+)x(\d+)/', $data, $match);
    $input[$id] = [
        'id' => $match[1],
        'x' => $match[2],
        'y' => $match[3],
        'w' => $match[4],
        'h' => $match[5]
    ];
}

$tiles = [];
$numOverlapTiles = 0;
foreach($input as $data) {
    for ($x = $data['x']; $x < $data['x'] + $data['w']; ++$x) {
        for ($y = $data['y']; $y < $data['y'] + $data['h']; ++$y) {
            $tiles[$x.','.$y] = ($tiles[$x.','.$y] || 0) + 1;
        }
    }
}

foreach(array_values($tiles) as $tile) {
    if ($tile > 1) ++$numOverlapTiles;
}

echo $numOverlapTiles;