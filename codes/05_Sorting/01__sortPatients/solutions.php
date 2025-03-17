<?php
function sortPatients($patients) {
    usort($patients, function($a, $b) {
        if ($b[3] == $a[3]) {
            return $a[2] - $b[2]; // বয়স অনুসারে বাড়ন্ত ক্রম (Ascending)
        }
        return $b[3] - $a[3]; // সংকট মাত্রা অনুযায়ী কমে আসা ক্রম (Descending)
    });

    return $patients;
}

// ইনপুট নেওয়া
$n = intval(trim(fgets(STDIN))); // রোগীর সংখ্যা
$patients = [];

for ($i = 0; $i < $n; $i++) {
    $patients[] = explode(" ", trim(fgets(STDIN)));
}

// সাজানো ও আউটপুট
$sortedPatients = sortPatients($patients);

foreach ($sortedPatients as $patient) {
    echo implode(" ", $patient) . "\n";
}