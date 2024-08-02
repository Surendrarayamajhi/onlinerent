<?php include '../global_backend/Helper.php';
isTenent();
?>
<?php
$isIdProvided = true;
if (isset($_GET['userid'])) {
    $rid = $_GET['userid'];
} else if (isset($_REQUEST['postId'])) {
    $receiverId = $_REQUEST['postId'];
    $rid = getUserIdFromPostId($receiverId);
} else {
    $isIdProvided = false;
    $rid = $logged_user_id;
}


setcookie("receiverId", $rid, time() + (86400 * 10), "/");
setcookie("senderId", $logged_user_id, time() + (86400 * 10), "/");

// Retrieve the sender and receiver IDs from the cookies
$senderId = $_COOKIE['senderId'];
$receiverId = $_COOKIE['receiverId'];
// $recentChatUsersList = array();



// $query = "SELECT m.m_id, m.sender_id, m.created_at, m.message, 
//           (SELECT u_name FROM users WHERE u_id = m.sender_id) AS sendername, 
//           m.receiver_id, 
//           (SELECT u_name FROM users WHERE u_id = m.receiver_id) AS receivername 
//           FROM messages AS m
//           WHERE (m.sender_id = $logged_user_id OR m.receiver_id = $logged_user_id)
//           AND m.created_at = (
//               SELECT MAX(created_at) 
//               FROM messages 
//               WHERE (sender_id = m.sender_id AND receiver_id = m.receiver_id) 
//               OR (sender_id = m.receiver_id AND receiver_id = m.sender_id)
//           )
//           ORDER BY m.created_at DESC";


// $recentChatUserQuery = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bs css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/Chat.css">
    <style>
        .css-chat-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px !important;
        }

        .chat-box a {
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent shadow" id='nav'>
            <div class="container-fluid css-container">
                <a class="navbar-brand text-black" href="home.php">OnlineRent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-black"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="home.php">Home</a>
                        </li>
                    </ul>
                    <!-- <span><a href="Chat.php" class="btn btn-primary mx-2">Chat</a></span> -->
                    <?php
                    include 'codeNavRemainingLinks.php';
                    include 'codeNavAuth.php';
                    ?>
                </div>
            </div>
        </nav>
    </div>

    <div class="css-chat-wrap pt-4">
        <div class="container row rounded-lg overflow-hidden shadow">
            <!-- Users box-->
            <div class="col-4 px-0">
                <div class="bg-white">
                    <div class="bg-gray px-4 py-2 bg-light">
                        <p class="h5 mb-0 py-1">Recent Chat</p>
                    </div>
                    <div class="messages-box">
                        <div class="list-group rounded-0" id="recent_chat_box">
                            <?php
                            // if (mysqli_num_rows($recentChatUserQuery) > 0) {
                            //     while ($row = mysqli_fetch_assoc($recentChatUserQuery)) {
                            //         $userId = $row['sender_id'];
                            //         $messageReceiverId = $row['receiver_id'];
                            //         $username = $row['sendername'];
                            //         $createdAt = $row['created_at'];
                            //         $message = $row['message'];

                            //         $oppositeChatUserId =  getOppositeChatUserId($logged_user_id, $messageReceiverId, $userId);

                            //         if (isAlreadyFetched($oppositeChatUserId)) {
                            //             continue;
                            //         }

                            //         $username = getUserName($oppositeChatUserId);





                            //         echo '<a href="Chat.php?userid=' . $oppositeChatUserId . '" class="list-group-item list-group-item-action  text-white rounded-0">';
                            //         echo '<div class="media d-flex align-items-start gap-2">';
                            //         echo '<div class="rounded-circle d-flex justify-content-center align-items-start mt-2" style="font-size:15px;"><i class="fa-solid fa-user"></i></div>';
                            //         echo '<div class="media-body ml-4">';
                            //         echo '<div class="d-flex align-items-center justify-content-between mb-1">';
                            //         echo '<h6 class="mb-0">' . $username . '</h6><small class="small font-weight-bold">' . $createdAt . '</small>';
                            //         echo '</div>';
                            //         echo '<p class="font-italic mb-0 text-small one-line" style="line-height: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' . $message . '</p>';
                            //         echo '</div>';
                            //         echo '</div>';
                            //         echo '</a>';
                            //     }
                            // } else {
                            //     echo 'No recent chat users found.';
                            // }



                            include 'recent_chat_users_get.php';
                            ?>
                        </div>


                    </div>
                </div>
            </div>
            <!-- Chat Box-->
            <div class="col-8 px-0">

                <div class="px-4 py-5 chat-box bg-white" id="chat-box">
                    <!-- sender receiver  -->
                    <?php include 'message_get.php' ?>
                    <span id="span-hidden"></span>
                </div>
                <!-- Typing area -->
                <!-- <form action="" class="bg-light" id="message-form" method="POST">
                                    <div class="input-group">
                                        <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light" name="message" id="inputMessage">
                                        <div class="input-group-append">
                                            <button id="button-addon2" type="submit" class="btn btn-link btn-send" name="submit"><i class="fa fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> -->

                <?php if ($isIdProvided) { ?>
                    <form id="message-form" method="POST" class="bg-light" style="border-top: 1px solid #aaa;">
                        <div class="input-group">
                            <input type="hidden" name="rid" value="<?php echo $rid; ?>" id="inputRid">
                            <input type="text" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light" id="inputMessage">
                            <div class="input-group-append mt-3">
                                <button id="button-addon2" type="submit" class="btn btn-link btn-send" name="submit"><i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>


</body>
<!-- bs cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jquery cdn  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        var rid = 0;
        var box = document.getElementById('chat-box');
        var span = document.getElementById('span-hidden');
        $('#message-form').submit(function(event) {
            event.preventDefault(); // prevent the form from submitting normally
            var inputRid = document.getElementById('inputRid');
            rid = parseInt(inputRid.value);

            console.log("ff", rid);
            var formData = $(this).serialize(); // get form data
            formData += '&rid=' + encodeURIComponent(rid); // add testData to the form data
            $.ajax({
                type: 'POST',
                url: 'message_send.php',
                data: formData,
                success: function(response) {
                    // alert(response); // show success message
                    $('#message-form')[0].reset(); // reset form fields
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText); // show error message
                }
            });
        });


        box.scrollTop = span.offsetTop;
        span.scrollIntoView({
            behavior: 'smooth'
        });


        //AJAX recent chat users 
        function fetchRecentChatUsers() {
            $.ajax({
                url: 'recent_chat_users_get.php', // Replace with the actual server-side script URL
                type: 'GET',
                success: function(response) {
                    $('#recent_chat_box').html(response);
                },
                error: function() {
                    $('#recent_chat_box').html('<p>Error occurred while fetching recent chat users.</p>');
                }
            });
        }

        // Initial load of recent chat users 
        fetchRecentChatUsers();

        // Set an interval to periodically update the recent chat users list
        setInterval(function() {
            fetchRecentChatUsers();
        }, 30000); // Update every 5 seconds (adjust the interval as needed)

    });


    // Update message display via AJAX every 5 seconds
    function getMessage() {
        setInterval(function() {
            $.ajax({
                url: 'message_get.php',
                success: function(data) {
                    document.getElementById('chat-box').innerHTML = data;
                }
            });


        }, 1000);
    }
    getMessage();
</script>

</html>