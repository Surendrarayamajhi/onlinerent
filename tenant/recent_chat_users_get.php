
<?php
$conn = mysqli_connect("localhost", "root", "", "myrent_db");
if ($conn) {
    // echo "Success DB Connection!";
} else {
    echo die("Failed") . mysqli_connect_error();
}

$recentChatUsersList = array();

$receiverId = $_COOKIE['receiverId'];
$senderId = $_COOKIE['senderId'];
function runQueryNew($query)
{
    global $conn;
    try {
        $res = mysqli_query($conn, $query);
        if ($res === false) {
            throw new Exception(mysqli_error($conn));
        }
        return $res;
    } catch (Exception $e) {
        if (mysqli_errno($conn) == 1062) {
            echo '<script>
            window.location.href = "../global_html/RegisterError.php";
          </script>';
        } else {
            echo 'Error: ' . $e->getMessage();
        }
        return false;
    }
}
function isAlreadyFetchedNew($senderId)
{
    global $recentChatUsersList;

    if (in_array($senderId, $recentChatUsersList)) {
        return true;
    }
    array_push($recentChatUsersList, $senderId);
    return false;
}

function getOppositeChatUserIdNew($loggedUserId, $receiverId, $sid)
{
    if ($loggedUserId == $receiverId) {
        return $sid;
    } else {
        return $receiverId;
    }
}

function getUserNameNew($user_id)
{
    $query = "SELECT u_name FROM users WHERE u_id = $user_id";
    $result = runQueryNew($query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['u_name'];
    } else {
        return 'Unknown'; // User ID not found or query failed
    }
}

function formatTimestamp($timestamp)
{
    return date('M j, Y g:i A', strtotime($timestamp));
}

$query = "SELECT m.m_id, m.sender_id, m.created_at, m.message, 
          (SELECT u_name FROM users WHERE u_id = m.sender_id) AS sendername, 
          m.receiver_id, 
          (SELECT u_name FROM users WHERE u_id = m.receiver_id) AS receivername 
          FROM messages AS m
          WHERE (m.sender_id = $senderId OR m.receiver_id = $senderId)
          AND m.created_at = (
              SELECT MAX(created_at) 
              FROM messages 
              WHERE (sender_id = m.sender_id AND receiver_id = m.receiver_id) 
              OR (sender_id = m.receiver_id AND receiver_id = m.sender_id)
          )
          ORDER BY m.created_at DESC";

$recentChatUserQuery = mysqli_query($conn, $query);

if (mysqli_num_rows($recentChatUserQuery) > 0) {
    while ($row = mysqli_fetch_assoc($recentChatUserQuery)) {
        $userId = $row['sender_id'];
        $messageReceiverId = $row['receiver_id'];
        $username = $row['sendername'];
        $createdAt =  formatTimestamp($row['created_at']);
     
        $message = $row['message'];

        $oppositeChatUserId =  getOppositeChatUserIdNew($senderId, $messageReceiverId, $userId);
        if (isAlreadyFetchedNew($oppositeChatUserId)) {
            continue;
        }
        if ($messageReceiverId == $userId) {
            continue;
        }
        $username = getUserNameNew($oppositeChatUserId);
        if($oppositeChatUserId == $_COOKIE['receiverId']) {
// echo 'yes'. $_COOKIE['receiverId'];
            echo '<a href="Chat.php?userid=' . $oppositeChatUserId . '" class="list-group-item list-group-item-action active  text-black rounded-0">';

        }else{
            // echo 'no' . $_COOKIE['receiverId'];
            echo '<a href="Chat.php?userid=' . $oppositeChatUserId . '" class="list-group-item list-group-item-action  text-black rounded-0">';
        }
       
        
        echo '<div class="media d-flex align-items-start gap-2">';
        echo '<div class="rounded-circle d-flex justify-content-center align-items-start mt-2" style="font-size:15px;"><i class="fa-solid fa-user"></i></div>';
        echo '<div class="media-body ml-4">';
        echo '<div class="d-flex align-items-center justify-content-between mb-1">';
        echo '<h6 class="mb-0 text-black">' . $username   .   '</h6><small class="fs-13">   &nbsp'     .      $createdAt . '</small>';
        echo '</div>';
        echo '<p class="font-italic mb-0 text-small one-line text-black" style="line-height: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' . $message . '</p>';
    
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo 'No recent chat users found.';
}
