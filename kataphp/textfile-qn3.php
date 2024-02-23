<?php

/**Create a file and name it test-file.txt, add the following text to the file.
 $text = “This is a test file with some dummy text. This text file is small! It’s also very brief, do you want to add some more text to it?”
 */

/**A. Write a function that reads the text from the file and returns an array without any duplicate items.
 Include the file content. 
*/

 
// Read file content
$text = file_get_contents('test-file.txt'); 

// A. Get unique words
function getUniqueWords($text) {
  $words = explode(' ', $text);
  return array_unique($words);

}

$uniqueWords = getUniqueWords($text);
print_r($uniqueWords);






 /**B. Write a function that reads the text from the file and returns an array
  with only the punctuation marks.
*/
// B. Get punctuation marks
function getPunctuation($text) {
  preg_match_all('/[^\w\s]/u', $text, $matches);
  return $matches[0];
}

$punctuation = getPunctuation($text);
print_r($punctuation);