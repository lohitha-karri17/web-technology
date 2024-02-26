<?php 
    session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['uname']) && isset($_POST['psw'])) {
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
       $_SESSION['uname'] = $_POST['uname'];

        $con = new mysqli("localhost","root","","details");
        if($con->connect_error) 
        {
            die("failed to connect : ".$con->connect_error);
        }
        else 
        {
            $stmt = $con->prepare("select * from users2 where uname= ? and password= ?");
            $stmt->bind_param("ss", $uname,$psw);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows >0) {
               $data =$stmt_result->fetch_assoc();
               if($data['password']== $psw) {
                    $_SESSION['uname'] = $uname;  
                    header("Location:main.php");
                    exit();
                }
            }
            else {
                // window.alert("error");
                echo '<script>alert("Please provide Valid Username/Password");</script>';
                // header("Location: login.html");
                // exit();
            }
        }
        // Rest of your code...
    } 
    else {
        header("Location: login.php?error=1");
        exit();
     }
    
}
?>