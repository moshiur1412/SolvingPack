<?php
function findKthCharacter($k) {
    $word = "a";

    while (strlen($word) < $k) {
        $newPart = "";
        for ($i = 0; $i < strlen($word); $i++) {
            $newPart .= chr((ord($word[$i]) - ord('a') + 1) % 26 + ord('a'));
        }
        $word .= $newPart;
    }

    return $word[$k - 1];
}

// উদাহরণ রান করা
echo findKthCharacter(5) . "\n";  // Output: "b"
echo findKthCharacter(10) . "\n"; // Output: "c"
