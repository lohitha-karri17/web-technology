<?php
// class Person { 
//     public $name; 
//     public $age; 
//     } 
//     $person = new Person(); 
//     $person->name = "John"; 
//     $person->age = 42; 
//     echo $person->name . " is " . $person->age . " years old."; // Output: John is 42 
//     // years.
$day = "Monday"; 
 
switch ($day) { 
  case "Monday": 
    {echo "Today is Monday."; 
        break; }
  case "Tuesday": 
    echo "Today is Tuesday."; 
    break; 
  default: 
    echo "Today is not Monday or Tuesday."; 
}
$ar=array(
    "a1"=>"vidhya",
    "a2"=>"gytyry"
);
function sum(...$numbers) {
    $acc = 0;
    $n=$numbers;
    // foreach ($numbers as $n) {
    //     $acc += $n;
    // }
    for($i=0;$i<3;$i++){
        echo $n[$i];
    }
    return $acc;
}

echo sum(1, 2, 3, 4);
echo $ar["a2"];
echo "\n";
function add_numbers($num1, $num2) { 
    $sum = $num1 + $num2; 
    return $sum; 
 } 
 $result = add_numbers(2, 3); 
 echo $result; // Output: 5 
?>