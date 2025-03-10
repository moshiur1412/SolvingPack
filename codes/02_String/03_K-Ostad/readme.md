## **📌 K-Ostad স্ট্রিং রূপান্তর সমস্যা 📌**  
দুটি স্ট্রিং **K-Ostad** হয় যদি **সর্বাধিক K সংখ্যক অপারেশন** ব্যবহার করে একটিকে অন্যটিতে রূপান্তর করা যায়।  

### **✅ অনুমোদিত অপারেশনসমূহ:**  
1️⃣ **অক্ষর যোগ করা**  
2️⃣ **অক্ষর মুছে ফেলা**  
3️⃣ **অক্ষর পরিবর্তন করা**  
4️⃣ **কোনো দুটি অক্ষর অদলবদল করা**  

---

## **⚙️ অ্যালগরিদম ব্যাখ্যা**  
1️⃣ **দুটি স্ট্রিংয়ের দৈর্ঘ্য বের করা হবে**।  
2️⃣ **লেভেনস্টেইন ডিস্ট্যান্স** (সম্পাদনা দূরত্ব) নির্ণয় করা হবে।  
3️⃣ যদি লেভেনস্টেইন ডিস্ট্যান্স ≤ K হয়, তাহলে **"Yes"** ফেরত দেওয়া হবে, নতুবা **"No"**।  
4️⃣ **অদলবদল (swap) অপারেশন চেক করা হবে**— যদি অদলবদল করে K-র মধ্যে রূপান্তর সম্ভব হয়, তাহলে **"Yes"**।  

---

## **💻 PHP কোড**  
```php
function levenshteinDistance($str1, $str2) {
    $m = strlen($str1);
    $n = strlen($str2);
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    for ($i = 0; $i <= $m; $i++) {
        for ($j = 0; $j <= $n; $j++) {
            if ($i == 0) {
                $dp[$i][$j] = $j;
            } elseif ($j == 0) {
                $dp[$i][$j] = $i;
            } elseif ($str1[$i - 1] == $str2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1];
            } else {
                $dp[$i][$j] = 1 + min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]);
            }
        }
    }
    return $dp[$m][$n];
}

function countMismatchedPositions($str1, $str2) {
    $mismatches = 0;
    $len = min(strlen($str1), strlen($str2));

    for ($i = 0; $i < $len; $i++) {
        if ($str1[$i] !== $str2[$i]) {
            $mismatches++;
        }
    }
    return $mismatches;
}

function isKOstad($str1, $str2, $k) {
    // Step 1: Check direct edit distance
    $editDistance = levenshteinDistance($str1, $str2);
    
    if ($editDistance <= $k) {
        return "Yes";
    }

    // Step 2: Check if swap operations can make them equal
    if (strlen($str1) === strlen($str2)) {
        $mismatchCount = countMismatchedPositions($str1, $str2);
        if ($mismatchCount / 2 <= $k) {
            return "Yes";
        }
    }

    return "No";
}

// উদাহরণ রান করা
echo isKOstad("anagram", "grammar", 3) . "\n";  // আউটপুট: Yes
echo isKOstad("ostad", "boss", 1) . "\n";       // আউটপুট: No
```

---

## **🔎 কিভাবে কাজ করে?**  
✅ **ধাপ ১:** `levenshteinDistance()` ফাংশনের মাধ্যমে **সম্পাদনা দূরত্ব (edit distance)** নির্ণয় করা হয়।  
✅ **ধাপ ২:** যদি **সম্পাদনা দূরত্ব ≤ K হয়, তাহলে "Yes" রিটার্ন করা হয়**।  
✅ **ধাপ ৩:** `canSwap()` ফাংশনের মাধ্যমে **swap অপারেশন চেক করা হয়**।  
✅ **ধাপ ৪:** যদি **swap-এর মাধ্যমে রূপান্তর সম্ভব হয়, তাহলে "Yes" ফেরত দেওয়া হয়**।  
✅ **ধাপ ৫:** অন্যথায়, **"No" রিটার্ন করা হয়**।  

---

## **🖥️ আউটপুট:**  
```
Yes
No
```

---

## **⏳ টাইম কমপ্লেক্সিটি বিশ্লেষণ**  

### **🔹 লেভেনস্টেইন ডিস্ট্যান্সের টাইম কমপ্লেক্সিটি:**  
- **O(m × n)** (যেখানে m ও n হলো স্ট্রিংয়ের দৈর্ঘ্য)  

### **🔹 Swap চেকিং টাইম কমপ্লেক্সিটি:**  
- **O(n log n)** (কারণ `sort()` করা হয়)  

### **🔹 পূর্ণ অ্যালগরিদমের টাইম কমপ্লেক্সিটি:**  
\[
O(m \times n) + O(n \log n) \approx O(m \times n)
\]

---

## **💾 স্পেস কমপ্লেক্সিটি বিশ্লেষণ**  

### **🔹 অতিরিক্ত মেমোরি ব্যবহার:**  
- `dp` টেবিল **O(m × n) স্পেস নেয়**।  
- `sort()` ব্যবহার করায় **O(n) অতিরিক্ত স্পেস নেয়**।  

### **🔹 পূর্ণ স্পেস কমপ্লেক্সিটি:**  
\[
O(m \times n)
\]

---

## **📊 চূড়ান্ত বিশ্লেষণ:**  

| কমপ্লেক্সিটির ধরন | মান |
|---------------|-------|
| **টাইম কমপ্লেক্সিটি** | **O(m × n)** |
| **স্পেস কমপ্লেক্সিটি** | **O(m × n)** |

---

## **🔑 মূল পয়েন্টসমূহ**  
✅ **সম্পাদনা দূরত্ব নির্ণয় করে K-Ostad যাচাই করা হয়**।  
✅ **Swap অপারেশন প্রয়োগ করে আরও কার্যকর রূপান্তর খোঁজা হয়**।  
✅ **টাইম কমপ্লেক্সিটি O(m × n), যা মাঝারি দৈর্ঘ্যের স্ট্রিংয়ের জন্য কার্যকর**।  

---

## **📊 সারসংক্ষেপ**  
- **প্রথমে লেভেনস্টেইন ডিস্ট্যান্স বের করা হয়**।  
- **এরপর swap অপারেশন প্রয়োগ করে যাচাই করা হয়**।  
- **যদি সর্বাধিক K অপারেশনের মধ্যে রূপান্তর সম্ভব হয়, তাহলে "Yes" ফেরত দেওয়া হয়, নতুবা "No"**।