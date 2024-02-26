<?php
// Error messages
$nameEmptyErr = "";
$emailEmptyErr = "";
$branchEmptyErr = "";
$yearEmptyErr = "";
$sectionEmptyErr = "";
$passwordEmptyErr = "";
$nameErr = "";
$emailErr = "";
$passErr="";
if (isset($_POST["submit"])) {
    // Set form variables
    $name = checkInput($_POST["name"]) ?? null;
    $email = checkInput($_POST["email"]) ?? null;
    $branch = checkInput($_POST["branch"]) ?? null;
    $year = checkInput($_POST["year"]) ?? null;
    $section = checkInput($_POST["section"]) ?? null;
    $password = checkInput($_POST["password"]) ?? null;




    // $education = checkInput($_POST["education"]);
    // $gender = checkInput($_POST["gender"]);
    // $hoby = $_POST["hoby"] ?? null;
    // $comment = checkInput($_POST["comment"]) ?? null;
    // Name validation
    if (empty($name)) {
        $nameEmptyErr = '<div class="error">
                Name can not be left blank.
            </div>';
        
    } // Allow letters and white space 
    else if (!preg_match("/^[a-zA-Z ]*$/", $name) ) {
        $nameErr = '<div class="error">
                Only letters and white space allowed.
            </div>';
    } else {
        // echo $name . '<br>';
    }
    // Email validation
    if (empty($email)) {
        $emailEmptyErr = '<div class="error">
                Email can not be left blank.
            </div>';
    } // E-mail format validation
    else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
        $emailErr = '<div class="error">
                    Email format is not valid.
            </div>';
    } else {
        // echo $email . '<br>';
    }

    // Select option validation
    if (empty($branch)) {
        $branchEmptyErr = '<div class="error">
        Specify your year.
            </div>';
    } else {
        // echo $education . '<br>';
    }

    // Radio button validation
    if (empty($year)) {
        $yearEmptyErr = '<div class="error">
                Specify your year.
            </div>';
    } else {
        // echo $gender . '<br>';
    }
    if (empty($section)) {
        $sectionEmptyErr = '<div class="error">
                Specify your year.
            </div>';
    } else {
        // echo $gender . '<br>';
    }
    if (empty($password)) {
        $passwordEmptyErr = '<div class="error">
                Password cannot be empty.
            </div>';
    } else {
        // echo $gender . '<br>';
    }
    
   
}
function checkInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>