<?php

function fIsValidLength($input, $minLength, $maxLength) {
   //returns true of false
   //trim empty spaces from beginning and end
   $input = trim($input);
   $IsValid = (strlen($input) >= $minLength && strlen($input) <= $maxLength);
   return $IsValid;
}

//email address
function fIsValidEmail($email) {
   //validate using php filter function. Returns true or false.
   $email = trim($email);
   return filter_var($email, FILTER_VALIDATE_EMAIL);
}

//state abbreviation
function fIsValidStateAbbr($state) {
   $ValidAbbr = array("AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO",
       "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS",
       "RO", "RR", "SC", "SP", "SE", "TO");

   //trim & change to upper case (to match strings in array)
   $state = trim(strtoupper($state));

   //check if a value exists in an array. 
   return in_array($state, $ValidAbbr);
}

//telephone numbers
function fIsValidPhone($phone) {
   //remove delimiters and spaces
   $pattern = "/[-,.()\s]/";
   $phone = preg_replace($pattern, '', $phone);

   //must be 10 digits
   return ((strlen($phone) == 10) && is_numeric($phone));
}

//date
function fIsValidDate($date) {
//date must be in format yyyy-mm-dd or yyyy/mm/dd (RFC 3339 format)
   $date = str_replace('-', '/', $date);
   $test_arr = explode('/', $date);
   if (count($test_arr) == 3 &&
           is_numeric($test_arr[0]) &&
           is_numeric($test_arr[1]) &&
           is_numeric($test_arr[2])) {
      //checkdate($month, $day, $year)
      if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {
         return true;
      } else {
         return false; //invalid date
      }
   } else {
      return false; //invalid format
   }
}
?> 