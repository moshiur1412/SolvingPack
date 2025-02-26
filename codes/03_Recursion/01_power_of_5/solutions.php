<?php
function isPowerOfFive($n) {
    if ($n <= 0) {
        return false;
    }

    while ($n % 5 == 0) {
        $n /= 5;
    }

    return $n == 1;
}

// উদাহরণ রান করা
$testCases = [25, 4, 1, 125, 30];

foreach ($testCases as $n) {
    echo "Input: $n -> Output: " . (isPowerOfFive($n) ? "true" : "false") . "\n";
}
