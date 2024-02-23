<?php
/**
 * // Regular expression solution.
 */
$paragraph = "This is a paragraph and it has to find 256781123456, testemail@gmail.com and https://kanzucode.com/";

// Function to extract email address using regex
function extractEmail($text) {
    $regex = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
    preg_match($regex, $text, $email);
    return $email ? $email[0] : null;
}

// Function to extract phone number using regex
function extractPhoneNumber($text) {
    $regex = '/\b\d{9,}\b/';
    preg_match($regex, $text, $phoneNumbers);
    return $phoneNumbers ? $phoneNumbers[0] : null;
}

// Function to extract URL using regex
function extractURL($text) {
    $regex = '/(https?|ftp):\/\/[^\s\/$.?#].[^\s]*/i';
    preg_match($regex, $text, $urls);
    return $urls ? $urls[0] : null;
}



$email = extractEmail($paragraph);
$phoneNumber = extractPhoneNumber($paragraph);
$url = extractURL($paragraph);

echo "Email: " . $email . "\n";
echo "Phone Number: " . $phoneNumber . "\n";
echo "URL: " . $url . "\n";





/**
 * 
 * // Without regular expression
 */


$paragraph = "This is a paragraph and it has to find 256781123456, testemail@gmail.com and https://kanzucode.com/";

// Function to extract email address without regex
function email($text) {
    $words = explode(" ", $text);
    foreach ($words as $word) {
        if (strpos($word, "@") !== false && strpos($word, ".") !== false) {
            return $word;
        }
    }
    return null;
}

// Function to extract phone number without regex
function phone($text) {
    $words = explode(" ", $text);
    foreach ($words as $word) {
        // Remove non-numeric characters
        $word = preg_replace("/\D/", '', $word); 
        if (is_numeric($word) && strlen($word) >= 9) {
            return $word;
        }
    }
    return null;
}

// Function to extract URL without regex
function url($text) {
    $words = explode(" ", $text);
    foreach ($words as $word) {
        if (strpos($word, "http://") === 0 || strpos($word, "https://") === 0) {
            return $word;
        }
    }
    return null;
}

$email = email($paragraph);
$phoneNumber = phone($paragraph);
$url = url($paragraph);

echo "Email (without regex): " . $email . "\n";
echo "Phone Number (without regex): " .$phoneNumber . "\n";
echo "URL (without regex): " . $url . "\n";





