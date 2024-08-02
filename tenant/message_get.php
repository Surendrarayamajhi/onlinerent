<?php include '../global_backend/DB.php'  ?>
<?php
$receiverId = 46;
$senderId = 45; // ID of the sender user
$receiverId = $_COOKIE['receiverId'];
$senderId = $_COOKIE['senderId'];
// $receiverId = 46; // ID of the receiver user
function formatTimestampGet($timestamp)
{
    return date('M j, Y g:i A', strtotime($timestamp));
}
$query = "SELECT * FROM messages 
          WHERE (sender_id = $senderId AND receiver_id = $receiverId) 
          OR (sender_id = $receiverId AND receiver_id = $senderId) 
          ORDER BY created_at ASC";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

ob_start(); // Start output buffering
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['sender_id'] == $receiverId) {
        // Message sent by the logged in user (sender)
?>
        <div class="media w-50 mb-3 d-flex align-items-start gap-2">
            <div class="rounded-circle d-flex justify-content-center align-items-center bg-secondary" style="min-width:50px;min-height:40px;font-size:20px;"><i class="fa-solid fa-user"></i></div>
            <div class="media-body ml-3">
                <div class="bg-light rounded py-2 px-3 mb-2">
                    <p class="text-small mb-0 text-muted"><?php echo $row['message']; ?></p>
                    <!-- <p class="text-small mb-0 text-muted">Receiver Id: <?php echo $receiverId; ?></p>
                    <p class="text-small mb-0 text-muted">Sender ID: <?php echo $senderId; ?></p> -->
                </div>
                <p class="small text-muted"><?php echo formatTimestampGet($row['created_at']); ?></p>
            </div>
        </div>
    <?php
    } else {
        // Message received by the logged in user (receiver)
    ?>
        <div class="w-100 d-flex justify-content-end">
            <div class="media w-50 ml-auto mb-3">
                <div class="media-body">
                    <div class="bg-primary rounded py-2 px-3 mb-2">
                        <p class="text-small mb-0 text-white"><?php echo $row['message']; ?></p>
                    </div>
                    <p class="small text-muted"><?php echo formatTimestampGet($row['created_at']); ?></p>
                </div>
            </div>
        </div>
<?php
    }
}
$messagesContent = ob_get_clean(); // Get the output buffer content
echo $messagesContent; // Return the HTML content of the messages
?>