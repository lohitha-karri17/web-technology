<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>register</title>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <style>
  body {
    background-image:url('bg2.jpg');
    background-repeat: no-repeat;
    background-size:cover;
    font-family: 'Poppins', sans-serif;
    margin:0 auto;
}
    .container {
    max-width: 700px;
    margin: 50px auto;
    }
    form {
        border: 1px solid #1A33FF;
        background: #ecf5fc;
        padding: 40px 50px 45px;
    }
    .form-control:focus {
        border-color: #000;
        box-shadow: none;
    }
    .error {
        color: red;
        font-weight: 400;
        display: block;
        padding: 6px 0;
        font-size: 14px;
    }
    .form-control.error {
        border-color: red;
        padding: .375rem .75rem;
    }
  </style>
  </head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4" style="font-weight:bold;">Register</h2>
    <!-- Form validation script -->
   
    <!-- Contact form -->
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
    include 'db_reg.php';  
    $name = checkInput($_POST["name"]) ?? null;
    $email = checkInput($_POST["email"]) ?? null;
    $branch = checkInput($_POST["branch"]) ?? null;
    $year = checkInput($_POST["year"]) ?? null;
    $section = checkInput($_POST["section"]) ?? null;
    $password = checkInput($_POST["password"]) ?? null;

    $sql = "Select * from student where username='$name'"; 


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
        $nameErr = '
            <div class="error">
                Only letters and white space allowed.
            </div>';
        // <?php echo "showName($name)"; 
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

    <form action="" method="post" novalidate>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Student Name</label>
        <div class="col-sm-8">
          
          <input type="text" name="name" id="name" class="form-control"  >
          <!-- Error -->
          <?php echo $nameEmptyErr; ?>
          <?php echo $nameErr; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
          <input type="email" name="email" class="form-control">
          <!-- Error -->
          <?php echo $emailEmptyErr; ?>
          <?php echo $emailErr; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Branch</label>
        <div class="col-sm-8">
          <select id="branch" name="branch" class="form-control">
            <option value="--" selected>--</option>
            <option value="cse">CSE</option>
            <option value="ece">ECE</option>
            <option value="it">IT</option>
            <option value="mech">MECH</option>
          </select>
          <!-- Error -->
          <?php echo $branchEmptyErr; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Year</label>
        <div class="col-sm-8">
          <select id="year" name="year" class="form-control">
            <option value="--" selected>--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>

            <!-- <option value="mech">MECH</option> -->
          </select>
          <!-- Error -->
          <?php echo $yearEmptyErr; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Section</label>
        <div class="col-sm-8">
          <select id="section" name="section" class="form-control">
            <option value="--" selected>--</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <!-- <option value="mech">MECH</option> -->
          </select>
          <!-- Error -->
          <?php echo $sectionEmptyErr; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
          <input type="password" name="password" class="form-control" visible>
          <!-- Error -->
          <?php echo $passwordEmptyErr; ?>
          <?php echo $passErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-12 mt-3">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <!-- <script>
  function showName(n){
    document.getElementById('name').innerHTML="n";
  }
</script> -->
</body>
</html>