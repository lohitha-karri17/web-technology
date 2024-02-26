
<?php
session_start();
// include('db_conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['uname']) && isset($_POST['post_id']) && isset($_POST['comment_text'])) {
        $uname = $_SESSION['uname'];
        $postId = $_POST['post_id'];
        $commentText = $_POST['comment_text'];

        // Perform your database update for comments
        // Example: Insert the comment into the 'comments' table
        // Adjust this based on your actual database structure
        $con = new mysqli("localhost", "root", "", "details");
        if ($con->connect_error) {
            die("failed to connect : " . $con->connect_error);
        }

        $stmt = $con->prepare("INSERT INTO comments (uname, postid, comment_text) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $uname, $postId, $commentText);
        $stmt->execute();

        // Get the updated comment count and echo it back
        $commentCount = getCommentCount($con, $postId);
        echo $commentCount;

        $stmt->close();
        $con->close();
        exit();
    }
}
?>

<?php
// Helper function to get comment count
function getCommentCount($con, $postId) {
    $stmt = $con->prepare("SELECT COUNT(*) as count FROM comments WHERE postid = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['count'];
}
?>

