<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        body {
    background: linear-gradient(to right, #200f27, #3a2043, #6b4081);
    font-family: 'Poppins', sans-serif;
}

#form {
    width: 300px;
    margin: 20vh auto 0 auto;
    padding: 20px;
    background-color: whitesmoke;
    border-radius: 4px;
    border: 2px solid yellow;
    font-size: 12px;
}

#form h1 {
    color: #0f2027;
    text-align: center;
}

#form button {
    padding: 10px;
    margin-top: 10px;
    width: 100%;
    color: white;
    background-color: rgb(41, 57, 194);
    border: none;
    border-radius: 4px;
}

.input-control {
    display: flex;
    flex-direction: column;
}

.input-control input {
    border: 2px solid #f0f0f0;
	border-radius: 4px;
	display: block;
	font-size: 12px;
	padding: 10px;
	width: 100%;
}

.input-control input:focus {
    outline: 0;
}

.input-control.success input {
    border-color: #09c372;
}

.input-control.error input {
    border-color: #ff3860;
}

.input-control .error {
    color: #ff3860;
    font-size: 9px;
    height: 13px;
}
    </style>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <!-- <script defer src="./index.js"></script> -->
</head>
<body>
    <div class="container">
        <form id="form" action="" method="post">
            <h1>Registration</h1>
            <div class="input-control">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Email</label>
                <input id="email" name="email" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input id="password"name="password" type="password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password2">Password again</label>
                <input id="password2" name="password2" type="password">
                <div class="error"></div>
            </div>
            <button type="submit" name="signUp">Sign Up</button>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST["signUp"])) 
    {
     // Get form data
     $name = $_POST["username"];
     $email = $_POST["email"];
    //  $age = $_POST["age"];
     $password = $_POST["password"];
     $confirm_password = $_POST["password2"];
     // Validate form data
     $errors = array();
     if (empty($name))
    {
     $errors[] = "Name is required";
     } 
     elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) 
    {
     $errors[] = "Only letters and white space allowed in Name";
     }
     if (empty($email)) 
    {
     $errors[] = "Email is required";
     } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
     $errors[] = "Invalid email format";
     }
    //  if (empty($age))
    // {
    //  $errors[] = "Age is required";
    //  } 
    // elseif (!is_numeric($age) || $age < 18)
    // {
    //  $errors[] = "Age must be a number greater than or equal to 18";
    //  }
     if (empty($password)) 
    {
     $errors[] = "Password is required";
     } 
    elseif (strlen($password) < 8) 
    {
     $errors[] = "Password must be at least 8 characters long";
     }
     if (empty($confirm_password)) 
    {
     $errors[] = "Confirm Password is required";
     } 
    elseif ($confirm_password != $password) 
    {
     $errors[] = "Passwords do not match";
     }
     // Process form data
     if (empty($errors))
    {
     // Send email to admin or store data in database
     // ...
     // Redirect user to thank you page
     header("Location: register.html");
     exit;
     } 
    else 
    {
     // Display errors to user
     foreach ($errors as $error) 
     {
     echo $error . "<br>";
     }
    }
    }
    ?>
</body>
</html>
