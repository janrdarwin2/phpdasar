<!-- 
Arrays
An array in PHP is actually an ordered map. A map is a type that associates values to keys. This type is optimized for several different uses; it can be treated as an array, list (vector), hash table (an implementation of a map), dictionary, collection, stack, queue, and probably more. As array values can be other arrays, trees and multidimensional arrays are also possible.

Explanation of those data structures is beyond the scope of this manual, but at least one example is provided for each of them. For more information, look towards the considerable literature that exists about this broad topic. 

Syntax ¶
Specifying with array() ¶
An array can be created using the array() language construct. It takes any number of comma-separated key => value pairs as arguments.

array(
    key  => value,
    key2 => value2,
    key3 => value3,
    ...
)
The comma after the last array element is optional and can be omitted. This is usually done for single-line arrays, i.e. array(1, 2) is preferred over array(1, 2, ). For multi-line arrays on the other hand the trailing comma is commonly used, as it allows easier addition of new elements at the end.

Note:

A short array syntax exists which replaces array() with [].
-->

<?php
$hari = array("Senin", "Selasa", "Rabu" );
$bulan = ["Januari", "Februari", "Maret"];
$arr1 = [123, "tulisan", false];
// Menampilkan Arrays
// var_dump() / print_r()
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";
echo($arr1[0]);
?>


