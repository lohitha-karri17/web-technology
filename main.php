<?php
require_once('log.php');
if (!isset($_SESSION['uname'])) {
    header("Location: login.php");
    exit();
}
// Rest of your code
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body{
            margin: 0 ;
            font-family: 'Poppins';     
        }
        .top{
            height: 8vh;
            position: relative;
            /* width: 100%; */
            background-color: rgb(255, 255, 255);
            box-shadow: 10px 0px 15px rgb(158, 158, 158);
        }
        .search{
            height: 4vh;
            width: 660px;
            margin-left: 150px;
            /* text-align: center; */
            /* margin-left: 10px; */
            background-color: rgb(255, 255, 255);
            float:left;
            color: grey;
            border-radius: 20px;
            box-shadow:0px 0px 5px rgb(158, 158, 158) ;
        }
        .bottom{
            height: 92vh;
            /* background-color: rgb(165, 172, 172); */
        }
        .left{
            width: 20%;
            height: 100%;
            float: left;
            position: relative;
            background-color: rgb(254, 249, 249);
            box-shadow: 0px 10px 15px rgb(158, 158, 158);
        }
        .right{
            width: 80%;
            float: left;
            height: 100%;
            background-color: rgb(248, 248, 239);
        }
        .r1{
             width:70%;
             float: left;
             height: 100%;
             background-color: rgb(250, 255, 255);
             overflow-y: scroll; 
                scrollbar-width: thin; 
                scrollbar-color: transparent transparent;
        }
        .r2{
                width: 30%;
                height: 100%;
                float: left;
                background-color: rgb(230, 247, 241);
                /* border-radius: 10px; */
                overflow-y: scroll; 
                scrollbar-width: thin; 
                scrollbar-color: transparent transparent;
        }
        #r2::-webkit-scrollbar-thumb {
        background-color: transparent;
        }
        #r2::-webkit-scrollbar-track {
        background-color: transparent;
        }
        #r1::-webkit-scrollbar-thumb {
        background-color: transparent;
        }
        #r1::-webkit-scrollbar-track {
        background-color: transparent;
        }
        .leftl{
            list-style: none;
        }
        .leftl li{
            text-align: center;
            margin: 20px;
            padding: 10px;
            display: block;
            margin-left: 0px;
            /* float: left; */
            height: 15px;width: 210px;
            background-color:  rgb(236, 191, 65);
            border-radius: 25px;
        }
        li a:hover{
            color: rgb(255, 255, 255);
            background-color:rgb(236, 191, 65,0.2) ;
        }
        /* .rtop{
            width: 100%;
            height: 10%;
            background-color: rgb(255, 255, 255);
            box-shadow:  10px 0px 15px rgb(158, 158, 158);
        } */
        #post{
            height: 440px;
            width: 550px;
            /* overflow: hidden; */
            border-radius:10px;
            border: 1px solid rgb(253, 253, 253);
            box-shadow:  0px 5px 15px rgb(158, 158, 158);
        }
        .p1{
            height: 20%;
            border-radius: 0px;
            width: 100%;
            background-color: rgb(255, 255, 255);
        }
        .p1 img{
            margin: 20px;
            float: left;
        }
        #uname{
            float: left;
            margin: 30px;
            margin-left: 0px;
        }
        #follow{
            text-align: center;
            color: skyblue;
            border-radius: 20px;
            height: 25px;width: 70px;
            background-color: rgb(255, 255, 255);
            float: right;margin-right: 40px;
            margin: 30px;
            border: 1px solid skyblue;
        }
        .p2{
            height: 10%;
            width: 100%;
            display: flex;
            background-color: rgb(255, 255, 255);
        }
        .p3{
            height: 60%;
            width: 100%;
            background-color: rgb(255, 255, 255);
        }
        .p3 img{
            /* margin:0 auto; */
            margin-left: 40px;
        }
        .p4{
            height: 10%;
            width: 100%;
            background-color: rgb(255, 255, 255);
        }
        #new{
            /* text-align: center; */
            height: 240px;
            width: 310px;
            border: 1px solid rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: 5px 0px 15px rgb(172, 172, 172);
            /* background-color: black; */
        }
        .like-button,.comment-button{
            /* padding:1px; */
            background-color:rgb(255,255,255);
            border:0px solid black;
            /* margin-bottom:3px; */
            /* height:20px; */
            /* border-radius:4px; */
        }
        #popup-window {
            position:fixed;
            width: 300px;
            /* height: 200px; */
            min-height: 200px;
            max-height: 50%;
            background: white;
            border: 0px solid black;
            border-radius:20px;
            box-shadow: 5px 0px 15px rgb(172, 172, 172);
            padding: 10px;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 10;
            display: none;
            }   
        
    </style>
</head>

<body>
    <div class="top">
        <img style="margin: 10px;float:left;" src="img/title.png" height="40px">
        <img style="margin: 18px;margin-left: 70px;float:left;" src="img/img2.jpg" height="25px" width="30px">
        <p class="search">
            <img src="img/search.jpg" style="margin: 7px;" height="17px"> 
        </p>
        <!-- <a href="#" id="popup-link">Click here to open pop-up</a> -->
        <img style="margin: 10px;margin-left: 50px;margin-top: 15px;" id="postUpload" src="img/postupload.png" width="35px" height="35px">
        <img style="margin: 10px;margin-left: 200px;margin-top: 15px;"  src="img/msg1.png" width="40px" height="35px">
       <img style="margin: 9px;margin-left: 25px;" id="logout" src="img/logout.png" height="40px" width="40px">
<script>
    document.getElementById("logout").addEventListener("click", function() {
        window.location.href = "logout.php";
    });
</script>

    </div>
    <div class="bottom">
        <div class="left">
            <ul class="leftl">
                <li><a>Home</a></li>
                <li><a>Academics</a></li>
                <li><a>Clubs</a> </li>
                <li><a>Organizations</a></li>
                <li><a>Events</a></li>
                <li><a>Discussions</a></li>
                <li><a>Resources</a></li>
                <li><a>Social & Networking</a></li>
                <li><a>Sports</a></li>
                <li><a>Transport</a></li>
                <li><a>Alumni</a></li>
                <li><a>Innovation</a></li>
            </ul>
        </div>
        <?php

function getLikeCount($postId) {
    $con = new mysqli("localhost", "root", "", "details");
    $stmt = $con->prepare("SELECT COUNT(*) as count FROM likes WHERE postid = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['count'];
}
function getCommentCount($postId) {
    $con = new mysqli("localhost", "root", "", "details");
    $stmt = $con->prepare("SELECT COUNT(*) as count FROM comments WHERE postid = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['count'];
}
?>
        <div class="right">
            <div class="r1">
                <div class="rb">
                    <br>
                    
                    <table style="margin: 0 auto;">
                        <tr>
                            <td id="post" id="post1">
                                <div class="p1" >
                                    <img src="img/profile.jpg" width="50px" height="50px">
                                    <p id="uname">Admin@anits</p>
                                    <p id="follow">Follow</p>
                                </div>
                                <div class="p2">
                                    <p id="caption">&nbsp;&nbsp; 🌟 Welcome, Students! 🚀 #NewBeginnings</p>
                                    
                                </div>
                                <div class="p3">
                                        <img src="img/post2.jpg" height="260px" width="460px">
                                </div>
                                <div class="p4">
                                   
                                <button style="font-family: 'Poppins';" onclick="likeFun1()" class="like-button" data-post-id="1"><img style="height:24px;width:24px;margin-top:0px;" id="p_like1" src="img/likeBefore.png"></button>
                                    <!-- Display like count -->
                                    <span id="like-count-1"><?php echo getLikeCount(1); ?></span>
                                    <!-- <img class="likeIcon" data-post-id="1" src="img/likeC.jpg" width="27px" height="27px">
                                   
                                    <p id="like1">count</p> -->
                                    <button  style="font-family: 'Poppins';" id="cmnt" class="comment-button" data-post-id="1"><img style="height:30px;width:27px;margin-top:0px;" id="p_cmnt" src="img/comment2.jpg"></button>
                                    <!-- Display comment count -->
                                    <span id="comment-count-1"><?php echo getCommentCount(1); ?></span>
                                    
                                    <!-- <img class="cmnt" src="img/comment2.jpg"  width="30px" height="36px" >
                                    <p id="cmnt1">count</p> -->
                                </div>
                
                            </td>
                            

                        </tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

                        <tr>
                            <td id="post" id="post2">
                                <div class="p1" >
                                    <img src="img/profile.jpg" width="50px" height="50px">
                                    <p id="uname">sree_18</p>
                                    <p id="follow">Follow</p>
                                </div>
                                <div class="p2">
                                    <p id="caption">&nbsp;&nbsp; Event Announcement!! 📢 </p>
                                    
                                </div>
                                <div class="p3">
                                        <img src="img/post3.jpg" height="260px" width="460px">
                                </div>
                                <div class="p4">
                                   
                                <button style="font-family: 'Poppins';" class="like-button" onclick="likeFun2()" data-post-id="2"><img style="height:24px;width:24px;margin-top:0px;" id="p_like2" src="img/likeBefore.png"></button>
                                    <!-- Display like count -->
                                    <span id="like-count-2"><?php echo getLikeCount(2); ?></span>
                                    <!-- <img class="likeIcon" data-post-id="1" src="img/likeC.jpg" width="27px" height="27px">
                                   
                                    <p id="like1">count</p> -->
                                    <button style="font-family: 'Poppins';" class="comment-button" data-post-id="2"><img style="height:30px;width:27px;margin-top:0px;" id="p_cmnt" src="img/comment2.jpg"></button>
                                    <!-- Display comment count -->
                                    <span id="comment-count-2"><?php echo getCommentCount(2); ?></span>
                                    
                                    <!-- <img class="cmnt" src="img/comment2.jpg"  width="30px" height="36px" >
                                    <p id="cmnt1">count</p> -->
                                </div>
                
                            </td>
                            

                        </tr>
                    </table>
                </div>
            </div>
            <div id="popup-window" class="popup-window">
                            <h2>Comments</h2><hr>
                            <!-- <p>This is a pop-up window.</p> -->
                            <div id="comments-container1"></div>

                            <!-- <p>hfvtf</p> -->

                            <button id="close-button">Close</button>
                    </div> 
            <div class="r2" id="r2">
                <h3 style="text-align: center;">Latest News</h3>
                <hr>
                <table style="margin: 0 auto;">
                    <tr >
                        <td style="overflow: hidden;" id="new" >
                            <img style="overflow: hidden;" src="img/new1.jpg" width="310px" height="177px">
                            <p style="text-align:center;">NSS PLANTATION</p>
                        </td>
                        
                    </tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                    <tr>
                        <td style="overflow: hidden;" id="new" >
                            <img style="overflow: hidden;" src="img/NEW2.jpeg" width="310px" height="177px">
                            <p style="text-align:center;">REPUBLIC DAY CELEBRATIONS</p>
                        </td>
                    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                   </tr>
                   <tr>
                    <td style="overflow: hidden;" id="new" >
                        <img style="overflow: hidden;" src="img/NEW3.jpeg" width="310px" height="177px">
                        <p style="text-align:center;">FLASHMOB 2022</p>
                    </td>
                    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                  </tr>
                  <tr>
                    <td style="overflow: hidden;" id="new" >
                        <img style="overflow: hidden;" src="img/NEW4.jpeg" width="310px" height="177px">
                        <p style="text-align:center;">CURSORS 2022</p>
                    </td>
                  </tr>
                  
                </table>
            </div>
        </div>
    </div>
    <script>
       $(document).ready(function() {
    // Click event for the comment button
    $('.comment-button').click(function() {
        // Prevent the default action of the button
        event.preventDefault();

        // Get the postId from data-post-id attribute
        var postId = $(this).data('post-id');

        // AJAX call to fetch comments for the post
        $.ajax({
            url: 'comments.php', // Replace with your PHP file to fetch comments
            type: 'POST',
            data: {postId: postId},
            success: function(response) {
                // Display comments in the popup box
                $('#comments-container1').html(response);
                $('#popup-window').show(); // Show the popup div
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error fetching comments. Please try again.');
            }
        });
    });
});


    </script>
<script>
        var bool1=false;
        var bool2=false;

    function likeFun1(){
        if(!bool1)
        {
        document.getElementById('p_like1').src="img/like.jpg";
        bool1=true;
        }
        else{
        document.getElementById('p_like1').src="img/likeBefore.png";
        bool1=false;
        }
    }
    function likeFun2(){
        if(!bool2)
        {
        document.getElementById('p_like2').src="img/like.jpg";
        bool2=true;
        }
        else{
        document.getElementById('p_like2').src="img/likeBefore.png";
        bool2=false;
        }
    }
    
</script>
<script>
  var popupLink = document.getElementById("cmnt");
  var popupWindow = document.getElementById("popup-window");
  var closeButton = document.getElementById("close-button");
  popupLink.addEventListener("click", function(event) {
    event.preventDefault();
    popupWindow.style.display = "block";
  });
  closeButton.addEventListener("click", function() {
    popupWindow.style.display = "none";
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // JavaScript for handling likes and comments
    $(document).ready(function(){
        // Like button click event
        $('.like-button').click(function(){
            var postId = $(this).data('post-id');
            // Send an Ajax request to update likes
            $.ajax({
                type: 'POST',
                url: 'update_likes.php',
                data: { post_id: postId },
                success: function(response) {
                    // Update the like count on the page
                    $('#like-count-' + postId).text(response);
                }
            });
        });

        // Comment button click event
        $('.comment-button').click(function(){
            // Get post ID and comment text from user input (you need to implement this)
            var postId = $(this).data('post-id');
            var commentText = prompt('Enter your comment:');
            
            // Send an Ajax request to update comments
            $.ajax({
                type: 'POST',
                url: 'update_comments.php',
                data: { post_id: postId, comment_text: commentText },
                success: function(response) {
                    // Update the comment count on the page
                    $('#comment-count-' + postId).text(response);
                }
            });
        });
    });
</script>

</body>
</html>




