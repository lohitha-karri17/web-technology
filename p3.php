<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")  
{ 
     // Process form data 
     $name = $_POST["name"]; 
     $email = $_POST["email"]; 
     if (!empty($name) && !empty($email)) { 
          // Save data to database 
          // Redirect to a thank you page 
          header("Location: p7.php"); 
          exit(); 
     } 
} 
if ($condition) { 
    header("Location: newpage.php"); 
    exit(); 
} 

?>