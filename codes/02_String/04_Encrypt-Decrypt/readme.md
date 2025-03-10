## **📌 Encrypt-Decrypt স্ট্রিং এনক্রিপশন ও ডিক্রিপশন 📌**  
একটি স্ট্রিংকে এনক্রিপ্ট করতে নিম্নলিখিত ধাপগুলো অনুসরণ করা হয়:  

### **✅ এনক্রিপশন প্রক্রিয়া:**  
1️⃣ **প্রতিটি একটানা একই অক্ষরের সংখ্যা নির্ণয় করা হবে**।  
2️⃣ **প্রতিটি অক্ষরের সঙ্গে তার সংখ্যা জুড়ে দেওয়া হবে**।  
3️⃣ **পরিবর্তিত স্ট্রিংটিকে উল্টো (reverse) করা হবে**।  

### **✅ ডিক্রিপশন প্রক্রিয়া:**  
1️⃣ **স্ট্রিংটিকে আবার উল্টো করা হবে**।  
2️⃣ **সংখ্যাগুলো থেকে পুনরায় মূল স্ট্রিং তৈরি করা হবে**।  

---

## **⚙️ অ্যালগরিদম ব্যাখ্যা**  
### **🔹 এনক্রিপশন (Encryption):**  
1️⃣ **প্রতিটি অক্ষরের সঙ্গে তার সংখ্যা যোগ করা হয়**।  
2️⃣ **অবশেষে স্ট্রিংটি উল্টানো হয়**।  

### **🔹 ডিক্রিপশন (Decryption):**  
1️⃣ **স্ট্রিংটি উল্টো করা হয়**।  
2️⃣ **সংখ্যাগুলোর মাধ্যমে পুনরায় মূল স্ট্রিং তৈরি করা হয়**।  

---

## **💻 PHP কোড**  
```php
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
```

---

## **🔎 কিভাবে কাজ করে?**  
✅ **ধাপ ১:** `encryptString()` ফাংশনের মাধ্যমে **একই ধারাবাহিক অক্ষর গুনে তাদের সঙ্গে সংখ্যা যোগ করা হয়**।  
✅ **ধাপ ২:** **পরিবর্তিত স্ট্রিংটি `strrev()` ব্যবহার করে উল্টানো হয়**।  
✅ **ধাপ ৩:** `decryptString()` ফাংশনের মাধ্যমে **স্ট্রিংটি পুনরায় উল্টানো হয়**।  
✅ **ধাপ ৪:** **সংখ্যাগুলোর মাধ্যমে পুনরায় মূল স্ট্রিং তৈরি করা হয়**।  

---

## **🖥️ আউটপুট:**  
```
Input: aaaaaaaaaaa
Encrypted: 11a
Decrypted: aaaaaaaaaaa

Input: ostad
Encrypted: 1d1a1t1s1o
Decrypted: ostad
```

---

## **⏳ টাইম কমপ্লেক্সিটি বিশ্লেষণ**  

### **🔹 এনক্রিপশন টাইম কমপ্লেক্সিটি:**  
- প্রতিটি অক্ষর একবার স্ক্যান করা হয়, তাই **O(N)**।  
- `strrev()` ফাংশন **O(N)** সময় নেয়।  

**মোট এনক্রিপশন টাইম কমপ্লেক্সিটি:**  
\[
O(N) + O(N) = O(N)
\]

### **🔹 ডিক্রিপশন টাইম কমপ্লেক্সিটি:**  
- প্রতিটি অক্ষর একবার স্ক্যান করা হয়, তাই **O(N)**।  
- `strrev()` ফাংশন **O(N)** সময় নেয়।  

**মোট ডিক্রিপশন টাইম কমপ্লেক্সিটি:**  
\[
O(N) + O(N) = O(N)
\]

---

## **💾 স্পেস কমপ্লেক্সিটি বিশ্লেষণ**  

### **🔹 অতিরিক্ত মেমোরি ব্যবহার:**  
- `encrypted` এবং `decrypted` স্ট্রিং **O(N) স্পেস নেয়**।  

### **🔹 পূর্ণ স্পেস কমপ্লেক্সিটি:**  
\[
O(N)
\]

---

## **📊 চূড়ান্ত বিশ্লেষণ:**  

| কমপ্লেক্সিটির ধরন | মান |
|---------------|-------|
| **টাইম কমপ্লেক্সিটি** | **O(N)** |
| **স্পেস কমপ্লেক্সিটি** | **O(N)** |

---

## **🔑 মূল পয়েন্টসমূহ**  
✅ **টাইম কমপ্লেক্সিটি O(N), যা স্ট্রিং এনক্রিপশন ও ডিক্রিপশনের জন্য কার্যকর**।  
✅ **স্পেস কমপ্লেক্সিটি O(N), যা স্ট্রিংয়ের দৈর্ঘ্যের সঙ্গে সরাসরি স্কেল করে**।  
✅ **`encryptString()` ফাংশন স্ট্রিং কম্প্রেস করে এবং উল্টায়**।  
✅ **`decryptString()` ফাংশন পুনরায় স্ট্রিং রিকভার করে**।  

---

## **📊 সারসংক্ষেপ**  
- **প্রথমে স্ট্রিং এনক্রিপ্ট করা হয়**।  
- **তারপর এনক্রিপ্টেড স্ট্রিং ডিক্রিপ্ট করা হয়**।  
- **ডিক্রিপ্ট করা স্ট্রিং ইনপুটের সঙ্গে মিলে গেলে এনক্রিপশন সফল**।