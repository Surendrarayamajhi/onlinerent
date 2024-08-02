<?php
include 'DB.php';
include 'Helper.php';

$query = "SELECT m.*, u.u_name AS sender_name FROM messages m INNER JOIN users u ON m.sender_id = u.u_id WHERE m.sender_id = $logged_user_id OR m.receiver_id = $logged_user_id ORDER BY m.created_at DESC";

$result = mysqli_query($conn, $query);
$recentChatUsersList = array();
while ($row = mysqli_fetch_array($result)) {
    $senderId = $row['sender_id'];
    if (isAlreadyFetched($senderId)) {
        continue; // Skip the duplicate entry
    }
    echo getUserName($senderId) . '<br />';
    echo $row['sender_name'] . '  ' . $senderId . '  ' . $row['receiver_id'] . '<br>';

    if ($row['receiver_id'] == $logged_user_id) {
        // Messages where $logged_user_id is the message receiver_id
        echo "You received this message: " . $row['message'] . "<br>";
    } else {
        // Messages where $logged_user_id is the message sender_id
        echo "You sent this message: " . $row['message'] . "<br>";
    }

    $recentChatUsersList[] = $senderId;
}
