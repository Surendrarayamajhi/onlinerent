

<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "myrent_db");
if ($conn) {
    // echo "Success DB Connection!";
} else {
    echo die("Failed") . mysqli_connect_error();
}
global $logged_user_id;

$recentChatUsersList = array();


function isAlreadyFetchedNew($senderId)
{
    global $recentChatUsersList;

    if (in_array($senderId, $recentChatUsersList)) {
        return true;
    }
    array_push($recentChatUsersList, $senderId);
    return false;
}
function formatTimestamp($timestamp)
{
    return date('M j, Y g:i A', strtotime($timestamp));
}




$receiverId = $_COOKIE['receiverId'];
$senderId = $_COOKIE['senderId'];

$query = "SELECT m.*, u.u_name AS sender_name FROM messages m INNER JOIN users u ON m.sender_id = u.u_id WHERE m.sender_id = $senderId OR m.receiver_id = $senderId ORDER BY m.created_at DESC";

$recentChatUserQuery = mysqli_query($conn, $query);
// $num = mysqli_num_rows($recentChatUserQuery);
// echo '<h1>' . $num . '<h1/>';




// ob_start(); // Start output buffering


if (mysqli_num_rows($recentChatUserQuery) > 0) {
    while ($row = mysqli_fetch_assoc($recentChatUserQuery)) {
        $userId = $row['sender_id'];
        $username = $row['sender_name'];
        $createdAt =  formatTimestamp($row['created_at']);
        $message = $row['message'];




        // if(in_array($userId, $recentChatUsersList) != true){
        //     array_push($recentChatUsersList, $userId);
        // if ($userId != $senderId ) {
        if (isAlreadyFetchedNew($userId)) {
            continue;
        }

        if ($userId == $senderId) {
            continue;
        }
        if ($userId ==  $receiverId) {
            echo '<a href="Chat.php?userid=' . $userId . '" class="list-group-item list-group-item-action active  text-black rounded-0">';
        } else {
            echo '<a href="Chat.php?userid=' . $userId . '" class="list-group-item list-group-item-action  text-black rounded-0">';
        }

        echo '<div class="media d-flex align-items-start gap-2">';
        echo '<div class="rounded-circle d-flex justify-content-center align-items-start mt-2" style="font-size:15px;"><i class="fa-solid fa-user"></i></div>';
        echo '<div class="media-body ml-4">';
        echo '<div class="d-flex align-items-center justify-content-between mb-1 w-100">';
        echo '<h6 class="mb-0">' . $username . '</h6> <small class="fs-12 mt-0 mb-0 ">   &nbsp'     .      $createdAt . '</small>';
        echo '</div>';


        echo '<p class="text-small mb-0 text-nowrap overflow-hidden" style="width: 280px; white-space: nowrap;">';
        echo $message;
        echo '</p>';






        echo '</div>';
        echo '</div>';
        echo '</a>';
    }
}

// echo '<h1>' . $num . '<h1/>';

// Display the user information in the HTML template

// }
// } 
else {
    echo 'No recent chat users found.';
}
// $messagesContent = ob_get_clean(); // Get the output buffer content
// echo $messagesContent; // Return the HTML content of the messages
// echo '<h1>' . $num . '<h1/>';
?>