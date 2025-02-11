<?php
function generate($numRows) {
    $result = [];
    
    for ($row_num = 0; $row_num < $numRows; $row_num++) {
        $row = array_fill(0, $row_num + 1, null); // Create a row of appropriate length
        $row[0] = $row[$row_num] = 1; // First and last elements are always 1
        
        for ($j = 1; $j < $row_num; $j++) {
            $row[$j] = $result[$row_num - 1][$j - 1] + $result[$row_num - 1][$j]; // Sum of two numbers above
        }
        
        $result[] = $row;
    }
    
    return $result;
}

// Example Usage:
$numRows = 5;
print_r(generate($numRows));
?>
