<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>
<?php

//delete posts
if (isset($_GET['did'])) {
    $deleteId = $_GET['did'];

    // Delete the post with the specified postId
    $deleteQuery = "DELETE FROM posts WHERE p_id = '$deleteId'";
    $deleteResult = runQuery($deleteQuery);

    if ($deleteResult) {
        // Delete associated images from the post_images table (assuming the column name is post_id)
        $deleteImagesQuery = "DELETE FROM post_images WHERE post_id = '$deleteId'";
        $deleteImagesResult = runQuery($deleteImagesQuery);

        if ($deleteImagesResult) {
            // Redirect to Posts.php after successful deletion
            echo "<script>window.location.href='Posts.php';</script>";
        } else {
            echo "Error deleting post images: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting post: " . mysqli_error($conn);
    }
}

// Fetch data from the 'posts' table
// Replace with the desired user_id

$query = "SELECT * FROM posts WHERE user_id = $logged_user_id ORDER BY p_created DESC";

$result = runQuery($query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/styles.css" />
    <title>OnlineRent Admin</title>
    <style>
        .table th,
        .table td {
            text-align: center;
        }

        .table th:nth-child(5),
        .table td:nth-child(5) {
            text-align: center;
        }

        .table th:nth-child(6),
        .table td:nth-child(6) {
            text-align: center;
        }
    </style>
</head>

<body id="body">
    <div class="css-container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">
                <!-- <a href="#">Subscribers</a>
          <a href="#">Video Management</a>
          <a class="active_link" href="#">Admin</a> -->
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

                <div class="container">
                    <h4>Posts</h4>
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Address</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Employee data will be added dynamically using JavaScript -->
                            <?php
                            if ($result) {
                                // Generate the table rows dynamically
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $postId = $row['p_id'];
                                    $title = $row['p_title'];
                                    $category_no = $row['p_category'];
                                    $address = $row['p_address'];
                                    $price = $row['p_price']; // Replace with the appropriate contact data

                                    // Output the table row
                                    echo '<tr>';
                                    echo '<td>' . $postId . '</td>';

                                    echo '<td>' . $title . '</td>';
                                    echo '<td>' . getCategory($category_no) . '</td>';
                                    echo '<td>' . $address . '</td>';
                                    echo '<td>' . $price   . '</td>';
                                    // echo '<td><img src="../images/hero (2).jpg" alt="image" class="" width="20%"></td>';
                                    echo '<td class="d-flex gap-2 justify-content-center">';
                                    echo '<a href="PostView.php?id=' . $postId . '" class="btn btn-primary btn-sm">View</a>';
                                    echo '<a href="PostEdit.php?id=' . $postId . '" class="btn btn-warning btn-sm">Edit</a>';
                                    echo '<a href="Posts.php?did=' . $postId . '" class="btn btn-danger btn-sm del">Delete</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>

                        </tbody>
                    </table>



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
                <!-- <h2>MNG</h2> -->
                <div class="sidebar__link">
                    <i class="fa-solid fa-plus"></i>
                    <a href="PostAdd.php">Add Post</a>
                </div>
                <div class="sidebar__link active_menu_link">
                    <i class="fa-solid fa-list-ul"></i>
                    <a href="Posts.php">Posts</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-users"></i>
                    <a href="Interested.php">Interested Users</a>
                </div>

                <div class="sidebar__link">
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- jquery cdn  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="./js/script.js"></script>
    <script>
        $(document).ready(function(e) {
            $('.del').on('click', function(e) {
                e.preventDefault(); //prevent default action

                var me = $(this);
                var href = me.attr('href');
                if (confirm("Confirm delete?")) {
                    window.location.assign(href);
                }

            });

        });
    </script>

</body>

</html>