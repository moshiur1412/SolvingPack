<?php

function nextSmallerElement($arr) {
    $n = count($arr);
    $result = array_fill(0, $n, -1); // শুরুতে সবগুলোকে -1 সেট করা হয়
    $stack = [];

    for ($i = $n - 1; $i >= 0; $i--) {
        while (!empty($stack) && end($stack) >= $arr[$i]) {
            array_pop($stack);
        }

        if (!empty($stack)) {
            $result[$i] = end($stack);
        }

        array_push($stack, $arr[$i]);
    }

    return $result;
}

// উদাহরণ রান করা
$testCases = [
    [4, 5, 2, 10, 8],
    [1, 3, 4, 2, 5, 1]
];

foreach ($testCases as $arr) {
    echo "Input: " . implode(" ", $arr) . "\n";
    echo "Output: " . implode(" ", nextSmallerElement($arr)) . "\n\n";
}