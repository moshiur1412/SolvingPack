<?php

function encryptString($s) {
    $n = strlen($s);
    $encrypted = "";
    $i = 0;

    while ($i < $n) {
        $count = 1;
        while ($i + 1 < $n && $s[$i] == $s[$i + 1]) {
            $count++;
            $i++;
        }
        $encrypted .= $s[$i] . $count;
        $i++;
    }

    return strrev($encrypted);
}

function decryptString($s) {
    $reversed = strrev($s);
    $decrypted = "";
    $n = strlen($reversed);
    $i = 0;

    while ($i < $n) {
        $char = $reversed[$i];
        $i++;
        $count = 0;

        while ($i < $n && is_numeric($reversed[$i])) {
            $count = $count * 10 + (int)$reversed[$i];
            $i++;
        }

        $decrypted .= str_repeat($char, $count);
    }

    return $decrypted;
}

// উদাহরণ রান করা
$input1 = "aaaaaaaaaaa";
$encrypted1 = encryptString($input1);
$decrypted1 = decryptString($encrypted1);

$input2 = "ostad";
$encrypted2 = encryptString($input2);
$decrypted2 = decryptString($encrypted2);

echo "Input: $input1\n";
echo "Encrypted: $encrypted1\n"; // আউটপুট: 11a
echo "Decrypted: $decrypted1\n"; // আউটপুট: aaaaaaaaaaa

echo "\n";

echo "Input: $input2\n";
echo "Encrypted: $encrypted2\n"; // আউটপুট: 1d1a1t1s1o
echo "Decrypted: $decrypted2\n"; // আউটপুট: ostad