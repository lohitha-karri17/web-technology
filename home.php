<!DOCTYPE html>
<head>
    <title>WEBPAGE</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body{
            background-size:cover;
            background-image:url("img/bg2.jpg");
            background-repeat: no-repeat;
            height: 98vh;
            display: flex;      
            font-family: 'Poppins';     
        }
        .container{
            box-sizing: border-box;
            overflow: hidden;
            margin: 0 auto;
            margin-top:80px;
            width:80%;
            height: 80%;
            /* display: flex; */
            border-radius: 10px;
            background-color: rgb(255, 255, 255);
            box-shadow: 5px 5px 15px rgb(75, 73, 73);
            /* box-shadow: 0 2px 2px 0 rgb(65, 65, 65), 0 2px 2px 0 rgb(75, 73, 73); */
        }
        .nav{
            height: 20%;
            background-color: rgb(255, 255, 255);
        }
        .left{
            float: left;
            width:40%;
            height: 80%;
            flex: 1;
            background-color: rgb(255, 255, 255);
        }
        .right{
            float: left;
            width: 60%;
            height: 80%;
        }
        .right img{
            /* margin-top: 100px; */
            margin-left: 80px;
            height: 80%;
            width: 700px;
        }
        .p3{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 60px;
            margin-top: 40px;
            font-size: large;
            font-weight: bold;
            height: 50px;
            width: 180px;
            border-radius: 30px;
            /* text-align: center; */
            color: white;
            background-color: rgb(236, 191, 65);
        }
        .p4{
            display: flex;
            justify-content: center;
            align-items: center;
            float: right;
            height: 50px;
            width: 120px;
            color: white;
            border-radius: 30px;
            background-color: rgb(236, 191, 65);
        }
        .title{
            width: 50%;
            float: left;
        }
        .nav1{
            width: 50%;
            float: left;
            /* background-color: aqua; */
        }
        .nav1 ul {
        list-style-type: none;
        margin: 0px;
        padding: 25px;
        /* overflow: hidden; */
        display: flex;
        align-items: center;
        }

        .nav1 li {
        float: left;
        margin: 40px;
        font-size: large;
        font-weight: bold;
        }
        .nav1 li a:link{
            color:black;
            text-decoration:none;
        }
        .nav1 li a:visited{
            color:black;
            text-decoration:none;
        }
        .nav1 li a:hover{
            color:grey;
            text-decoration:none;
        }
        
        .p3 p a:link{color:white;
            text-decoration:none;}
        .p3 p a:visited{color:white;
            text-decoration:none;}
        
    </style>
</head>
<body>
   <div class="container">
    <div class="nav">
     <div class="title">
    <img style="margin-top:40px;margin-left: 40px;" src="img/title.png" height="80px">
     </div>
     <div class="nav1">
        <ul >
            <li><a>Home</a></li>
            <li><a>About Us</a></li>
            <li><a href="login.html">Login</a></li>
            <li class="p4"><a href="register.php">Get Started</a></li>
        </ul>
     </div>
    </div>
    <div class="left">
       
        <div class="p1">
            <p style="color: rgb(12, 5, 150);font-size: 60px;font-weight: bolder;margin-left: 70px;">
                Join Student <br>Community</p>
            </div>
        <div class="p2">
            <p style="text-align: center;font-size: large;">Welcome to  Anits student community, where <br>together, we embark on an exciting journey of<br> growth, learning, and lasting connections.</p>
        </div>
        <div class="p3">
            <p><a href="https://anits.edu.in/" target="_blank" >Read More</a></p>
        </div>
        <!-- <p>jon</p> -->
    </div>
    <div class="right">
       <img src="img/student1.jpg">
    </div>
   </div>
</body>