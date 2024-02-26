<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['uname']) && isset($_POST['post_id'])) {
        $uname = $_SESSION['uname'];
        $postId = $_POST['post_id'];

        // Perform your database check for existing like
        $con = new mysqli("localhost", "root", "", "details");
        if ($con->connect_error) {
            die("failed to connect : " . $con->connect_error);
        }

        // Check if the user has already liked the post
        $stmtCheck = $con->prepare("SELECT * FROM likes WHERE uname = ? AND postid = ?");
        $stmtCheck->bind_param("si", $uname, $postId);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // User has already liked the post, remove the like
            
            $stmtRemoveLike = $con->prepare("DELETE FROM likes WHERE uname = ? AND postid = ?");
            $stmtRemoveLike->bind_param("si", $uname, $postId);
            $stmtRemoveLike->execute();
            $stmtRemoveLike->close();
        } else {
            // User has not liked the post, add a new like
            $stmtAddLike = $con->prepare("INSERT INTO likes (uname, postid) VALUES (?, ?)");
            $stmtAddLike->bind_param("si", $uname, $postId);
            $stmtAddLike->execute();
            $stmtAddLike->close();
        }

        // Get the updated like count and echo it back
        $likeCount = getLikeCount($con, $postId);
        echo $likeCount;

        $stmtCheck->close();
        $con->close();
        exit();
    }
}
?>

<?php
// Helper function to get like count
function getLikeCount($con, $postId) {
    $stmt = $con->prepare("SELECT COUNT(*) as count FROM likes WHERE postid = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['count'];
}
?>
