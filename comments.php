<?php
// Establish database connection (replace these with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch comments based on postId received via AJAX
if (isset($_POST['postId'])) {
    $postId = $_POST['postId'];

    // Prepare and execute SQL query to fetch comments for the specified postId
    $stmt = $conn->prepare("SELECT uname, comment_text FROM comments WHERE postid = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any comments
    if ($result->num_rows > 0) {
        // Output comments as HTML
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row['uname'] . ":</strong> " . $row['comment_text'] . "</p>";
        }
    } else {
        echo "No comments found.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If postId is not received, return an error message
    echo "Error: postId not received.";
}
?>
