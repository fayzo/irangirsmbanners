<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   $mystring = 'house_for_sale';
   $matches = 'house_for_sale';
   $matchess = 'house_for_sale';
   $findme   = 'vale';
   echo $pos = strpos($mystring, $findme);
   echo $sub = substr($mystring,1)."reba aha";
   echo $sub =(substr($mystring,-4) == 'sale')? 'sale' : 'rent';
// Provides: Hll Wrld f PHP
// $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$vowels = "o";
$onlyconsonants = str_replace($vowels, "_", "Hello World of PHP");
   echo var_dump($onlyconsonants).'<br>';
   // Note our use of ===.  Simply == would not work as expected
   // because the position of 'a' was the 0th (first) character.
   if ($pos === false) {
       echo "The string '$findme' was not found in the string '$mystring'. <br>";
   } else {
       echo "The string '$findme' was found in the string '$mystring'. <br>";
       echo " and exists at position $pos";
   }
    preg_match('/(s)(a)*(l)(e)/', 'sale', $matches);
    var_dump($matches);


    $text = 'house_for_sale.';

// this echoes "is is a Simple text." because 'i' is matched first
echo strpbrk($text, 'sale').'<br>';
 ?>
</body>
</html>