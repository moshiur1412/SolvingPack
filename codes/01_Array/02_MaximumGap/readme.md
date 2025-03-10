### **📌 সর্বাধিক পার্থক্য (Maximum Gap) 📌**  
একটি অ্যারের **সর্বাধিক পার্থক্য** বের করা হয় — অর্থাৎ, অ্যারেটি **ক্রমানুসারে সাজানোর পর পরপর দুটি সংখ্যার মধ্যে সর্বাধিক পার্থক্য** নির্ণয় করা হয়।  

---

## **⚙️ অ্যালগরিদম ব্যাখ্যা**  
1️⃣ যদি অ্যারের **দৈর্ঘ্য ২-এর কম** হয়, তাহলে **`0` ফেরত দেওয়া হবে**।  
2️⃣ অ্যারেটি **ক্রমানুসারে সাজানো হবে**।  
3️⃣ পরপর দুটি সংখ্যার **পার্থক্য বের করে সর্বোচ্চটি রাখা হবে**।  
4️⃣ অবশেষে **সেই সর্বাধিক পার্থক্য রিটার্ন করা হবে**।  

---

## **💻 PHP কোড**  
```php
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
```

---

## **🔎 কিভাবে কাজ করে?**  
✅ **ধাপ ১:** অ্যারের দৈর্ঘ্য **২-এর কম হলে `0` রিটার্ন করি**।  
✅ **ধাপ ২:** `sort()` ফাংশন ব্যবহার করে **অ্যারেটি ক্রমানুসারে সাজাই**।  
✅ **ধাপ ৩:** একটি `for` লুপ চালিয়ে **প্রতিটি উপাদানের পার্থক্য বের করি**।  
✅ **ধাপ ৪:** **সর্বোচ্চ পার্থক্যটি `maxGap` ভেরিয়েবলে সংরক্ষণ করি**।  
✅ **ধাপ ৫:** **ফলাফল প্রিন্ট করি**।  

---

## **🖥️ আউটপুট:**  
```
3
0
```

---

## **⏳ টাইম কমপ্লেক্সিটি বিশ্লেষণ**  

### **🔹 `sort($nums)` এর টাইম কমপ্লেক্সিটি:**  
PHP-তে `sort()` ফাংশন সাধারণত **QuickSort বা TimSort** ব্যবহার করে, যার গড় ক্ষেত্রে **O(n log n)** সময় লাগে।

### **🔹 `for` লুপের টাইম কমপ্লেক্সিটি:**  
```php
for ($i = 1; $i < count($nums); $i++) 
```
- এটি `n-1` বার চলে, যা **O(n)**।

### **🔹 পূর্ণ অ্যালগরিদমের টাইম কমপ্লেক্সিটি:**  
\[
O(n \log n) + O(n) = O(n \log n)
\]
অতএব, **পূর্ণ অ্যালগরিদমের টাইম কমপ্লেক্সিটি: O(n log n)**।

---

## **💾 স্পেস কমপ্লেক্সিটি বিশ্লেষণ**  

### **🔹 অতিরিক্ত মেমোরি ব্যবহার:**  
- আমরা **শুধুমাত্র একটি ভেরিয়েবল (`maxGap`) ব্যবহার করছি**।  
- `sort($nums)` ইনপুট অ্যারেতে **ইন-প্লেস** পরিবর্তন করে, তাই অতিরিক্ত মেমোরি নেয় না।  

### **🔹 পূর্ণ স্পেস কমপ্লেক্সিটি:**  
\[
O(1)
\]

---

## **📊 চূড়ান্ত বিশ্লেষণ:**  

| কমপ্লেক্সিটির ধরন | মান |
|---------------|-------|
| **টাইম কমপ্লেক্সিটি** | **O(n log n)** |
| **স্পেস কমপ্লেক্সিটি** | **O(1)** |

---

## **🔑 মূল পয়েন্টসমূহ**  
✅ **টাইম কমপ্লেক্সিটি O(n log n)** → কারণ অ্যারে সাজাতে `sort()` ব্যবহৃত হয়েছে।  
✅ **স্পেস কমপ্লেক্সিটি O(1)** → কারণ অতিরিক্ত মেমোরি ব্যবহার করা হয়নি।  
✅ **সর্বোচ্চ পার্থক্য বের করতে সহজ এবং কার্যকরী পদ্ধতি**।  

---

## **📊 সারসংক্ষেপ**  
- প্রথমে **অ্যারেটি সাজানো হয়েছে**।  
- এরপর **পরপর দুটি উপাদানের পার্থক্য বের করা হয়েছে**।  
- **সর্বোচ্চ পার্থক্য রিটার্ন করা হয়েছে**।