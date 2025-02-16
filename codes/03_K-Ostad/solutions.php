<?php

function levenshteinDistance($str1, $str2) {
    $m = strlen($str1);
    $n = strlen($str2);
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    for ($i = 0; $i <= $m; $i++) {
        for ($j = 0; $j <= $n; $j++) {
            if ($i == 0) {
                $dp[$i][$j] = $j;
            } elseif ($j == 0) {
                $dp[$i][$j] = $i;
            } elseif ($str1[$i - 1] == $str2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1];
            } else {
                $dp[$i][$j] = 1 + min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]);
            }
        }
    }
    return $dp[$m][$n];
}

function countMismatchedPositions($str1, $str2) {
    $mismatches = 0;
    $len = min(strlen($str1), strlen($str2));

    for ($i = 0; $i < $len; $i++) {
        if ($str1[$i] !== $str2[$i]) {
            $mismatches++;
        }
    }
    return $mismatches;
}

function isKOstad($str1, $str2, $k) {
    // Step 1: Check direct edit distance
    $editDistance = levenshteinDistance($str1, $str2);
    
    if ($editDistance <= $k) {
        return "Yes";
    }

    // Step 2: Check if swap operations can make them equal
    if (strlen($str1) === strlen($str2)) {
        $mismatchCount = countMismatchedPositions($str1, $str2);
        if ($mismatchCount / 2 <= $k) {
            return "Yes";
        }
    }

    return "No";
}

// উদাহরণ রান করা
echo isKOstad("anagram", "grammar", 3) . "\n";  // আউটপুট: Yes
echo isKOstad("ostad", "boss", 1) . "\n";       // আউটপুট: No
