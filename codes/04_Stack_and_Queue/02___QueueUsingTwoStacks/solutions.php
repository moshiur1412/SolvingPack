<?php

class QueueUsingTwoStacks {
    private $s1 = [];
    private $s2 = [];

    // এনকিউ (enqueue)
    public function enqueue($x) {
        array_push($this->s1, $x);
    }

    // ডিকিউ (dequeue)
    public function dequeue() {
        if (empty($this->s2)) {
            while (!empty($this->s1)) {
                array_push($this->s2, array_pop($this->s1));
            }
        }

        return empty($this->s2) ? -1 : array_pop($this->s2);
    }

    // ফ্রন্ট এলিমেন্ট রিটার্ন করা (remove না করে)
    public function front() {
        if (empty($this->s2)) {
            while (!empty($this->s1)) {
                array_push($this->s2, array_pop($this->s1));
            }
        }

        return empty($this->s2) ? -1 : end($this->s2);
    }
}

// ইনপুট প্রসেসিং
$q = intval(trim(fgets(STDIN)));
$queue = new QueueUsingTwoStacks();

for ($i = 0; $i < $q; $i++) {
    $input = explode(" ", trim(fgets(STDIN)));
    
    if ($input[0] == "1") {
        $queue->enqueue(intval($input[1]));
    } elseif ($input[0] == "2") {
        echo $queue->dequeue() . "\n";
    } elseif ($input[0] == "3") {
        echo $queue->front() . "\n";
    }
}