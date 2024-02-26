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
            padding: 0;
            font-family: 'Poppins';     
        }
        .top{
            height: 8vh;
            position: relative;
            /* width: 100%; */
            background-color: rgb(255, 255, 255);
            box-shadow: 10px 0px 15px rgb(158, 158, 158);
        }
         /* .search{
            height: 4vh;
            width: 660px;
            margin-left: 150px;
           
            background-color: rgb(255, 255, 255);
            float:left;
            color: grey;
            border-radius: 20px;
            box-shadow:0px 0px 5px rgb(158, 158, 158) ;
        }  */
        .search {
            /* padding-top:10px; */
            /* margin-top: 100px; */
            margin:10px;
            float:left;
            margin-left:200px;
            /* margin-left: 500px; */
            height:4vh;
            width:500px;
            background-color:rgb(255, 255, 255);
            border-radius: 20px;
            color:grey;
            box-shadow:0px 0px 10px rgb(158, 158, 158) ;

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
        }
        .r2{
                width: 30%;
                height: 100%;
                float: left;
                background-color: rgb(194, 245, 227);
                border-radius: 10px;
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
            height: 12px;width: 210px;
            background-color:  rgb(236, 191, 65);
            border-radius: 25px;
        }
        li a:hover{
            color: rgb(255, 255, 255);
            background-color:rgb(236, 191, 65,0.2) ;
        }
        #post{
            height: 440px;
            width: 550px;
            overflow: hidden;
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
        #like{
            float: left;
            margin: 13px;
        }
        #cmnt{
            float: left;
            margin: 10px;
        }
        #like1,#cmnt1{
            float: left;
        }
        #new{
            /* text-align: center; */
            height: 240px;
            width: 310px;
            border: 1px solid rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: 5px 0px 15px rgb(172, 172, 172);
            background-color:white;

        }
        .comment-icon {
    cursor: pointer;
}

.popup-container {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.popup-content {
    position: relative;
}

.close-btn {
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
}

textarea {
    width: 100%;
    height: 80px;
    resize: none;
    margin-bottom: 10px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}
        

        

    </style>
</head>
<body>
    <div class="top">
        <img   style="float:left;" src="title.jpg" height="40px" >
        <img   style ="float:left; margin:10px; padding-left: 90px;" src="info.jpg" height="25px">
        <p class="search">
            <img src="search.jpg" height="20px">
        </p>
        <img src="comment.jpg" height="35px" width="40px" style=" margin-left:200px; margin-top: 10px;">
        <img src="profile.jpg" height="40px" width="40px" style="margin-left:200px; margin-top: 10px;">
    </div>
    <div class="bottom">
        <div class="left">
             <ul class="leftl">
                <li><a>Home</a></li>
                <li>Academics</li>
                <li>Clubs </li>
                <li>Organizations</li>
                <li>Events</li>
                <li>Discussions</li>
                <li>Resources</li>
                <li>Social & Networking</li>
                <li>Sports</li>
                <li>Transport</li>
                <li>Alumni</li>
                <li>Innovation</li>
            </ul> 
        </div>
        <div class="right">
            <div class="r1">
                <div class="rb">
                    <br>
                    <table style="margin: 0 auto;">
                        <tr>
                            <td id="post">
                                <div class="p1">
                                    <img src="img/profile.jpg" width="50px" height="50px">
                                    <p id="uname">Admin@anits</p>
                                    <p id="follow">Follow</p>
                                </div>
                                <div class="p2">
                                    <p id="caption">&nbsp;&nbsp; 🌟 Welcome, Students! 🚀 #NewBeginnings</p>
                                    
                                </div>
                                <div class="p3">
                                        <img src="post2.jpg" height="260px" width="460px">
                                </div>
                                <div class="p4">
                                    <img id="like" src="likeC.jpg" width="27px" height="27px">
                                    <p id="like1">0</p>
                                    <div id="comment-icon" onclick="showCommentBox()">
                                    <img id="cmnt" src="comment2.jpg"  width="30px" height="36px" >
                                    <p id="cmnt1">0</p>
                                    </div>
                                    <div class="popup-container" id="commentPopup">
                                        <div class="popup-content">
                                            <span class="close-btn" onclick="hideCommentBox()">&times;</span>
                                            <form id="commentForm" onsubmit="addComment(); return false;">
                                                <textarea id="commentText" placeholder="Add a comment"></textarea>
                                                <button type="submit">Add Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="r2">
                <h3 style="text-align: center;">Latest News</h3>
                <hr>
                <table style="margin: 0 auto;">
                    <tr >
                        <td id="new" id="n1" >
                            <img src="https://www.thespruce.com/thmb/NDbyD3OE7ICtG9aBiEz4Jr8Fhos=/2121x1414/filters:fill(auto,1)/cropped-hands-planting-sapling-in-dirt-998567842-5c436bcd4cedfd000103d01c.jpg" height="150px" width="310px">
                            <p align="center">NSS plantation</p>
                        </td>
                    <br>
                    <tr>
                        <td id="new"></td>
                   </tr>
                   <tr>
                    <td id="new"></td>
                   </tr>
                   
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('like').addEventListener('click',function(){
            var likeCount= parseInt(document.getElementById('like1').innerText);
            likeCount++;
            document.getElementById('like').src='like.jpg';
            document.getElementById('like1').innerText = likeCount;
        });
        document.getElementById('cmnt').addEventListener('click', function () {
        //,Get the current comment count
         var commentCount = parseInt(document.getElementById('cmnt1').innerText);

         // Update the comment count
         commentCount++;

        // // Update the UI with the new comment count
         document.getElementById('cmnt1').innerText = commentCount;

        // Update the database
        updateDatabase(parseInt(document.getElementById('like1').innerText),commentCount);
    });
    function showCommentBox() {
    document.getElementById("commentPopup").style.display = "block";
}

function hideCommentBox() {
    document.getElementById("commentPopup").style.display = "none";
}

function addComment() {
    var commentText = document.getElementById("commentText").value;
    if (commentText.trim() !== "") {
        // Add the new comment to the commentsData array
        commentsData.push(commentText);

        // Update the UI
        displayComments();
        updateCommentsCount();

        // Clear the input field
        document.getElementById("commentText").value = "";
    }
}

function updateCommentsCount() {
    const commentsCount = document.getElementById("cmnt1");
    const count = commentsData.length;
    commentsCount.textContent = count + (count === 1 ? " comment" : " comments");
}


    </script>

</body>
</html>