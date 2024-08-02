<?php include '../global_backend/Helper.php' ?>
<?php
if (isset($_POST['rid'])) {
    $senderId = $_SESSION['user_id'];
    // $receiverId = $_POST['rid'];// Assign the value of `receiver_id`
    $message = $_POST['message'];
    // $receiverId = $_POST['rid'];

    $receiverId = $_COOKIE['receiverId'];
    $senderId = $_COOKIE['senderId'];

    $query = "INSERT INTO messages (`sender_id`, `receiver_id`, `message`) VALUES ('$senderId','$receiverId', '$message')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));

    } else {
        echo "<script>alert('Message sent successfully!');</script>";
        echo "Form data: ";
        echo "Sender ID: " . $senderId . "<br>";
        echo "Receiver ID: " . $receiverId . "<br>";
        echo "Message: " . $message . "<br>";
    }
}
?>
