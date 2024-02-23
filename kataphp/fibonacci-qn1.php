<?php

// Function to generate Fibonacci numbers within a specified range
function fibonacciInRange($start, $end)
{
    // Initialize an empty array to store Fibonacci numbers
    $fibonacciSeries = [];
    // Start with the first Fibonacci number
    $fib1 = 0;
    // Start with the second Fibonacci number
    $fib2 = 1;

    // Handle cases where start is less than or equal to 1
    if ($start <= 1) {
        // Add 0 to the series
        $fibonacciSeries[] = 0;
        // Add 1 to the series
        $fibonacciSeries[] = 1;
    }

    $nextTerm = $fib1 + $fib2;

    // Iterate while the next term is within the range
    while ($nextTerm <= $end) {
        // Check if next term is within the range and not already added
        if ($nextTerm >= $start) {
            $fibonacciSeries[] = $nextTerm;
        }
        // Update the first Fibonacci number
        $fib1 = $fib2;
        // Update the second Fibonacci number
        $fib2 = $nextTerm;
        // Calculate the next Fibonacci number
        $nextTerm = $fib1 + $fib2;
    }
    // Return the array of Fibonacci numbers
    return $fibonacciSeries;
}

// Function to print Fibonacci numbers starting from the 7th position within a range
function printFibonacciInRange($start, $end)
{
    // Get the series
    $fibonacciSeries = fibonacciInRange($start, $end);
    // Initialize an array to store selected Fibonacci numbers
    $tobeReturned = [];
    // Iterate through the Fibonacci series
    foreach ($fibonacciSeries as $key => $value) {
        // Check if the index is greater than or equal to 6
        if ($key >= 6) {
            // Add the Fibonacci number to the selected array
            $tobeReturned[] = $value;
        }
    }
    // Sort the selected Fibonacci numbers in descending order
    rsort($tobeReturned);
    // Return the sorted and selected Fibonacci numbers
    return $tobeReturned;
}
// Start range for Fibonacci numbers
$startRange = 0;
// End range for Fibonacci numbers
$endRange = 100;
// Print the selected Fibonacci numbers within the range
print_r(printFibonacciInRange($startRange, $endRange));
