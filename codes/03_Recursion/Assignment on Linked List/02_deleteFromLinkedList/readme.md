### **🌟 Linked List থেকে নির্দিষ্ট মানগুলো ডিলিট করা 🌟**

আমাদের কাজ:  

✅ **একটি অ্যারে ও লিংকড লিস্ট তৈরি করা।**  
✅ **লিংকড লিস্ট থেকে এমন সব নোড ডিলিট করা, যেগুলোর মান অ্যারেতে আছে।**  
✅ **পরিবর্তিত লিংকড লিস্ট প্রিন্ট করা।**

---

## **📌 অ্যালগরিদম ব্যাখ্যা:**  

1️⃣ প্রথমে লিংকড লিস্ট তৈরি করবো।  
2️⃣ অ্যারেতে থাকা প্রত্যেকটি মানের জন্য লিংকড লিস্ট চেক করবো।  
3️⃣ যেসব নোডের মান অ্যারেতে আছে, সেগুলো ডিলিট করবো।  
4️⃣ শেষে আপডেট হওয়া লিংকড লিস্ট প্রিন্ট করবো।  

---

## **💻 PHP কোড:**  

```php
// লিংকড লিস্টের নোড ক্লাস
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
```

---

## **🖥️ আউটপুট:**  

```
Input array: [1, 2, 3]
Input linked list: [1, 2, 3, 4, 5]
Output: [4, 5]
-----------------------------
Input array: [5]
Input linked list: [1, 2, 3, 4]
Output: [1, 2, 3, 4]
-----------------------------
```

---

## **⏳ টাইম কমপ্লেক্সিটি বিশ্লেষণ**  

| অপারেশন | কমপ্লেক্সিটি |
|----------|--------------|
| অ্যারে খুঁজে বের করা | O(1) (array_flip এর মাধ্যমে দ্রুত খোঁজ) |
| লিংকড লিস্ট ট্রাভার্স | O(n) |
| **মোট টাইম কমপ্লেক্সিটি** | **O(n)** |

---

## **💾 স্পেস কমপ্লেক্সিটি বিশ্লেষণ**  

| অপারেশন | স্পেস কমপ্লেক্সিটি |
|----------|--------------------|
| অ্যারে রূপান্তর (flip) | O(m) (m = অ্যারের আকার) |
| লিংকড লিস্ট | O(1) অতিরিক্ত স্পেস (নোড গুলো আগেই ছিল) |

---

## **🔑 মূল পয়েন্টসমূহ**  
✅ লিংকড লিস্ট থেকে একাধিক মান দ্রুত ডিলিট করা হয়েছে।  
✅ অ্যারে খুঁজে বের করার জন্য **array_flip()** ব্যবহার হয়েছে।  
✅ টাইম কমপ্লেক্সিটি **O(n)** এবং স্পেস কমপ্লেক্সিটি **O(m)**।

---

## **📢 সারসংক্ষেপ:**  
- ✅ লিংকড লিস্ট এবং অ্যারে তৈরি।  
- ✅ লিংকড লিস্ট থেকে অ্যারেতে থাকা মানগুলো ডিলিট।  
- ✅ সময় এবং জায়গার দিক দিয়ে কার্যকর সমাধান।  

---