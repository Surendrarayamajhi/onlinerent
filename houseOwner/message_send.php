<?php include '../global_backend/Helper.php' ?>
<?php
$senderId = 45;
$receiverId  = 46;
$receiverId = $_COOKIE['receiverId'];
$senderId = $_COOKIE['senderId'];

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $query = "INSERT INTO messages (`sender_id`, `receiver_id`, `message`) VALUES ('$senderId', '$receiverId', '$message')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        // echo "Message sent successfully!";
    }
}
