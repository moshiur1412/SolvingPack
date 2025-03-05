<?php
// নোড ক্লাস
class ListNode {
    public $val;
    public $prev = null;
    public $next = null;

    public function __construct($val) {
        $this->val = $val;
    }
}

// সংখ্যা থেকে Doubly Linked List তৈরি
function integerToDoublyLinkedList($n) {
    $str = strval(abs($n));
    $head = null;
    $prev = null;

    if ($n < 0) {
        $head = new ListNode('-');
        $prev = $head;
    }

    foreach (str_split($str) as $digit) {
        $node = new ListNode($digit);
        if ($prev !== null) {
            $prev->next = $node;
            $node->prev = $prev;
        } else {
            $head = $node;
        }
        $prev = $node;
    }

    return $head;
}

// Doubly Linked List থেকে সংখ্যা তৈরি
function doublyLinkedListToInteger($head) {
    $isNegative = false;
    $numStr = '';

    if ($head->val === '-') {
        $isNegative = true;
        $head = $head->next;
    }

    while ($head !== null) {
        $numStr .= $head->val;
        $head = $head->next;
    }

    $number = intval($numStr);
    return $isNegative ? -$number : $number;
}

// Linked List দেখানোর জন্য হেল্পার ফাংশন
function printDoublyLinkedList($head) {
    $nodes = [];
    while ($head !== null) {
        $nodes[] = $head->val;
        $head = $head->next;
    }
    echo implode(' <-> ', $nodes) . "\n";
}

// উদাহরণ রান করা
$testCases = [25, -4];

foreach ($testCases as $n) {
    echo "Input: $n\n";
    $ll = integerToDoublyLinkedList($n);
    echo "First function (LL): ";
    printDoublyLinkedList($ll);
    $integer = doublyLinkedListToInteger($ll);
    echo "Second function (Integer): $integer\n";
    echo "-----------------------------\n";
}
