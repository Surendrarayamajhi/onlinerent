<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>
<?php
$rid = 46;
$isIdProvided = true;
if (isset($_GET['userid'])) {
    $rid = $_GET['userid'];
} else {
    $isIdProvided = false;
}
setcookie("receiverId", $rid, time() + (86400 * 10), "/");
setcookie("senderId", $logged_user_id, time() + (86400 * 10), "/");



// Retrieve the sender and receiver IDs from the cookies
$senderId = $_COOKIE['senderId'];
$receiverId = $_COOKIE['receiverId'];

// $recentChatUsersList = array();



$query = "SELECT m.*, u.u_name AS sender_name FROM messages m INNER JOIN users u ON m.sender_id = u.u_id WHERE m.sender_id = $senderId OR m.receiver_id = $senderId ORDER BY m.created_at DESC";
$recentChatUserQuery = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/styles.css" />
    <link rel="stylesheet" href="./style/Chat.css" />
    <title>OnlineRent Admin</title>
</head>

<body id="body">
    <div class="css-container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">

            </div>
            <div class="navbar__right">

                <!-- <a href="#">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a> -->
                <!-- <a href="#">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </a> -->
                <?php include 'nav.php' ?>
            </div>
        </nav>

        <main>

            <div class="main__container">

                <div class="">


                    <div class="row rounded-lg overflow-hidden shadow">
                        <!-- Users box-->
                        <div class="col-4 px-0">
                            <div class="bg-white">

                                <div class="bg-gray px-4 py-2 bg-light">
                                    <p class="h5 mb-0 py-1">Recent Chat</p>
                                </div>

                                <div class="messages-box overflow-hidden">
                                    <div class="list-group  rounded-0" id="recent_chat_box">


                                        <!-- ajax call page START  -->

                                        <?php include 'recent_chat_users_get.php'; ?>

                                        <!-- ajax call page END  -->



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
                                <form id="message-form" method="POST" class="bg-light">
                                    <div class="input-group">
                                        <input type="hidden" name="message" value="<?php echo $logged_user_id; ?>" id="inputSid">
                                        <input type="text" placeholder="Type a message" name="message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light" id="inputMessage">
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

            </div>
        </main>

        <div id="sidebar">
            <div class="sidebar__title">

                <div class="sidebar__img ">
                     
                    <h1 style="margin-right: 20px;">OnlineRent</h1>
                </div>
                <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link ">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <a href="Dashboard.php">Dashboard</a>
                </div>

                <div class="sidebar__link">
                    <i class="fa-solid fa-plus"></i>
                    <a href="PostAdd.php">Add Post</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-building-o"></i>
                    <a href="Posts.php">Posts</a>
                </div>

                <div class="sidebar__link">
                    <i class="fa-solid fa-users"></i>
                    <a href="Interested.php">Interested Users</a>
                </div>

                <div class="sidebar__link active_menu_link">
                    <i class="fa-solid fa-comments"></i>
                    <a href="Chat.php">Chat</a>
                </div>

                <h2>LEAVE</h2>

                <div class="sidebar__logout">
                    <i class="fa fa-power-off"></i>
                    <a href="../tenant/Logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./js/script.js"></script>
    <!-- <script src="./js/chat.js"></script> -->



    <script>
        $(document).ready(function() {
            var box = document.getElementById('chat-box');
            var span = document.getElementById('span-hidden');
            $('#message-form').submit(function(event) {
                event.preventDefault(); // prevent the form from submitting normally
                var formData = $(this).serialize(); // get form data
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


            var chatBox = document.getElementById('chat-box');

            // Scroll the chat box to the bottom
            chatBox.scrollTop = chatBox.scrollHeight;

            function getCookieValue(name) {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i].trim();
                    if (cookie.startsWith(name + '=')) {
                        return cookie.substring(name.length + 1);
                    }
                }
                return '';
            }


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
            }, 4000); // Update every 5 seconds (adjust the interval as needed)


            //ADD active class 

            if (getCookieValue('receiverId')) {
                var receiverId = getCookieValue('receiverId');
            }

            // Find all elements with the class 'list-group-item'
            var listItems = document.getElementsByClassName('list-group-item');

            // Loop through the list items
            for (var i = 0; i < listItems.length; i++) {
                var listItem = listItems[i];

                // Get the userId from the href attribute
                var userId = listItem.getAttribute('href').split('=')[1];

                // Check if the userId matches the receiverId
                if (userId == receiverId) {
                    // Add the 'active' class to the listItem
                    listItem.classList.add('active');
                }
            }


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

                box.scrollTop = span.offsetTop;
                span.scrollIntoView({
                    behavior: 'smooth'
                });

            }, 500);
        }
        getMessage();
    </script>
</body>


</html>