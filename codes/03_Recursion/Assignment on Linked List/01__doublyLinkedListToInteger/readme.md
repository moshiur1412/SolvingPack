### **🌟 সংখ্যা এবং Doubly Linked List (LL) রূপান্তর 🌟**

আমাদের কাজ দুইটি:  

✅ **Task 1:** একটি পূর্ণসংখ্যাকে (integer) Doubly Linked List (LL)-এ রূপান্তর করা।  
✅ **Task 2:** Doubly Linked List (LL) থেকে আবার পূর্ণসংখ্যা (integer) বের করা।  

---

## **📌 অ্যালগরিদম ব্যাখ্যা:**  

### 🔹 প্রথম ফাংশন (integer → LL):  
- যদি সংখ্যা ঋণাত্মক হয়, তাহলে প্রথমে `'-'` নোড যোগ করবো।  
- এরপর সংখ্যার প্রত্যেক ডিজিট নিয়ে আলাদা নোড তৈরি করবো।  
- প্রতিটি নোডের মধ্যে আগের (`prev`) এবং পরের (`next`) নোডের সংযোগ থাকবে।  

### 🔹 দ্বিতীয় ফাংশন (LL → integer):  
- যদি প্রথম নোড `'-'` হয়, তাহলে সংখ্যাটি ঋণাত্মক হবে।  
- এরপর বাকি ডিজিটগুলো নিয়ে সংখ্যা গঠন করবো।  

---

## **💻 PHP কোড:**  

```php
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
```

---

## **🖥️ আউটপুট:**  

```
Input: 25
First function (LL): 2 <-> 5
Second function (Integer): 25
-----------------------------
Input: -4
First function (LL): - <-> 4
Second function (Integer): -4
-----------------------------
```

---

## **⏳ টাইম কমপ্লেক্সিটি বিশ্লেষণ**

| অপারেশন | কমপ্লেক্সিটি |
|----------|--------------|
| **Integer → LL** | O(d), যেখানে d = ডিজিট সংখ্যা |
| **LL → Integer** | O(d) |

---

## **💾 স্পেস কমপ্লেক্সিটি বিশ্লেষণ**  

- Linked List তৈরি করতে **O(d)** স্পেস লাগে।  
- অস্থায়ী স্ট্রিং বা ভেরিয়েবল নিয়েও **O(d)** স্পেস।  

---

## **🔑 মূল পয়েন্টসমূহ**  
✅ **Doubly Linked List**-এ ডিজিট যোগ করা হয়েছে।  
✅ ঋণাত্মক সংখ্যার জন্য `'-'` চিহ্ন সংরক্ষণ করা হয়েছে।  
✅ সহজ ও কার্যকরভাবে সংখ্যা এবং Linked List রূপান্তর হয়েছে।  

---

## **📢 সারসংক্ষেপ:**  
- ✅ সংখ্যা থেকে Doubly Linked List এবং আবার সংখ্যা বের করার সমাধান।  
- ✅ টাইম কমপ্লেক্সিটি O(d) এবং স্পেস কমপ্লেক্সিটি O(d)।  
- ✅ সহজবোধ্য এবং সুন্দরভাবে গঠিত কোড।  

---
