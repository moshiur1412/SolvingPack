<?php
class ListNode {
    public $val;
    public $next = null;

    public function __construct($val) {
        $this->val = $val;
    }
}

// লিংকড লিস্ট তৈরি ফাংশন
function createLinkedList($elements) {
    $head = null;
    $current = null;

    foreach ($elements as $val) {
        $node = new ListNode($val);
        if ($head === null) {
            $head = $node;
        } else {
            $current->next = $node;
        }
        $current = $node;
    }

    return $head;
}

// লিংকড লিস্ট থেকে মান ডিলিট করার ফাংশন
function deleteFromLinkedList($head, $array) {
    $deleteValues = array_flip($array); // খুঁজতে সুবিধার জন্য
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $prev = $dummy;
    $current = $head;

    while ($current !== null) {
        if (isset($deleteValues[$current->val])) {
            $prev->next = $current->next; // ডিলিট
        } else {
            $prev = $current;
        }
        $current = $current->next;
    }

    return $dummy->next;
}

// লিংকড লিস্ট প্রিন্ট ফাংশন
function printLinkedList($head) {
    $values = [];
    while ($head !== null) {
        $values[] = $head->val;
        $head = $head->next;
    }
    echo "[" . implode(", ", $values) . "]\n";
}

// উদাহরণ রান করা
$testCases = [
    [
        'array' => [1, 2, 3],
        'linkedList' => [1, 2, 3, 4, 5]
    ],
    [
        'array' => [5],
        'linkedList' => [1, 2, 3, 4]
    ]
];

foreach ($testCases as $testCase) {
    echo "Input array: [" . implode(", ", $testCase['array']) . "]\n";
    echo "Input linked list: [" . implode(", ", $testCase['linkedList']) . "]\n";
    $head = createLinkedList($testCase['linkedList']);
    $modifiedHead = deleteFromLinkedList($head, $testCase['array']);
    echo "Output: ";
    printLinkedList($modifiedHead);
    echo "-----------------------------\n";
}