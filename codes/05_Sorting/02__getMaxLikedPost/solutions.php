<?php
function getMaxLikedPost($likes) {
    $maxLikes = max($likes);
    $index = array_search($maxLikes, $likes) + 1; // 1-based index
    return [$index, $maxLikes];
}

// ইনপুট নেওয়া
list($n, $m) = explode(" ", trim(fgets(STDIN))); // পোস্ট সংখ্যা এবং কুয়েরি সংখ্যা
$likes = array_map('intval', explode(" ", trim(fgets(STDIN))));

for ($i = 0; $i < $m; $i++) {
    list($post_no, $like_increase) = explode(" ", trim(fgets(STDIN)));
    
    // পোস্টের লাইক আপডেট করা (0-based index)
    $likes[$post_no - 1] += $like_increase;

    // সর্বোচ্চ লাইকের পোস্ট খুঁজে বের করা
    list($topPost, $topLikes) = getMaxLikedPost($likes);
    
    // আউটপুট প্রিন্ট করা
    echo "$topPost $topLikes\n";
}