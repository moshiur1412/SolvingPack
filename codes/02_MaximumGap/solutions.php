<?php

function maximumGap($nums) {
    if (count($nums) < 2) {
        return 0;
    }

    sort($nums); // ক্রমানুসারে সাজানো
    $maxGap = 0;

    for ($i = 1; $i < count($nums); $i++) {
        $maxGap = max($maxGap, $nums[$i] - $nums[$i - 1]);
    }

    return $maxGap;
}

// উদাহরণ রান করা
$nums1 = [3,6,9,1];
$nums2 = [10];

echo maximumGap($nums1) . "\n"; // আউটপুট: 3
echo maximumGap($nums2) . "\n"; // আউটপুট: 0
