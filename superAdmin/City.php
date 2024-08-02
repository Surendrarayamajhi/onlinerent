<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>
<?php
if (isset($_GET['activeId'])) {
    $cid_to_activate = $_GET['activeId'];


    // Perform the update operation to set isActive to 1
    $activate_query = "UPDATE cityLists SET isActive = 1 WHERE id = $cid_to_activate";
    $result = runQuery($activate_query);

    if ($result) {
        // Redirect or show a success message
        header("Location: City.php");
        exit();
    } else {
        // Redirect or show an error message
        header('Location: ../global_html/Error.php');
        exit();
    }
} elseif (isset($_GET['inactiveId'])) {
    $cid_to_deactivate = $_GET['inactiveId'];


    // Assuming $conn object and your custom runQuery function

    // Perform the update operation to set isActive to 0
    $deactivate_query = "UPDATE cityLists SET isActive = 0 WHERE id = $cid_to_deactivate";
    $result = runQuery($deactivate_query);

    if ($result) {
        // Redirect or show a success message

        header("Location: City.php");
        exit();
    } else {

        // Redirect or show an error message
        header('Location: ../global_html/Error.php');
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- datatable  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <title>OnlineRent Admin</title>
    <style>
        .block {
            display: flex;

        }

        .iconBox {
            color: crimson;
            /* background-color: #ffcfcf; */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
            font-size: 10px;
        }


        .block .statusBox {

            /* background-color: lavender; */
            padding: 10px;

            height: fit-content;

            margin: 10px;
            display: flex;
            gap: 15px;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            gap: 10px;
            border-radius: 20px;

            box-shadow: 8px 3px 10px #888888;
        }

        .infoBox p {
            font-size: 17px;
        }

        .infoBox h1 {
            font-size: 25px;
            margin: 5px 0px;
        }

        .pie-wrap {
            width: 300px;
            height: 300px;
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
                <a href="#">
                    <img width="30" src="assets/avatar.svg" alt="" />
                    <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                </a>
            </div>
        </nav>

        <main class="px-3 py-3">


            <h4>Cities</h4>
            <a href="CityAdd.php"><button class="btn btn-primary mb-3">Add</button></a>
            <table id="myTable" class="table display">
                <thead>
                    <tr>
                        <th>City ID</th>
                        <th>City Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Assuming $cityLists array is defined

                    // foreach ($cityLists as $cid => $name) {
                    //     echo '<tr>';
                    //     echo '<td>' . $cid . '</td>';
                    //     echo '<td>' . $name . '</td>';
                    //     echo '<td>' . $name . '</td>';

                    //     // Add action buttons
                    //     echo '<td>';
                    //     echo '<a href="CityEdit.php?cid=' . $cid . '" class="btn btn-warning btn-sm me-2">Edit</a>';
                    //     // echo '<a href="javascript:void(0);" class="btn btn-danger btn-sm del" onclick="confirmDelete(' . $cid . ');"></a>';
                    //     echo '<a href="City.php?activeId=' . $cid . '" class="btn btn-success btn-sm me-2">Active</a>';
                    //     echo '<a href="City.php?inactiveId=' . $cid . '" class="btn btn-danger btn-sm me-2">Inactive</a>';
                    //     echo '</td>';

                    //     echo '</tr>';
                    // }



                    foreach ($cityLists as $cid => $city) {
                        $name = $city['name'];
                        $isActive = $city['isActive'];

                        echo '<tr>';
                        echo '<td>' . $cid . '</td>';
                        echo '<td>' . $name . '</td>';
                        echo '<td class="' . ($isActive ? 'text-success' : 'text-danger') . '"><p class="fw-bold">' . getActiveLabel($isActive) . '</p></td>';

                        // Add action buttons
                        echo '<td>';
                        echo '<a href="CityEdit.php?cid=' . $cid . '" class="btn btn-warning btn-sm me-2">Edit</a>';

                        if ($isActive) {
                            echo '<a href="City.php?inactiveId=' . $cid . '" class="btn btn-danger btn-sm me-2">Inactive</a>';
                        } else {
                            echo '<a href="City.php?activeId=' . $cid . '" class="btn btn-success btn-sm me-2">Active</a>';
                        }

                        echo '</td>';

                        echo '</tr>';
                    }

                    ?>


                </tbody>
            </table>
        </main>
        <div id="sidebar">
            <div class="sidebar__title">

                <div class="sidebar__img ">
                     
                    <h1 style="margin-right: 20px;">OnlineRent-SuperAdmin</h1>
                </div>
                <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link ">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <a href="Dashboard.php">Dashboard</a>
                </div>
                <!-- <h2>MNG</h2> -->
                <!-- <div class="sidebar__link">
                    <i class="fa-solid fa-plus"></i>
                    <a href="PostAdd.php">Add Post</a>
                </div> -->
                <div class="sidebar__link">
                    <i class="fa-solid fa-list-ul"></i>
                    <a href="Posts.php">Posts</a>
                </div>
                <div class="sidebar__link active_menu_link">
                    <i class="fa-solid fa-city"></i>
                    <a href="City.php">Cities</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-sitemap"></i>
                    <a href="Category.php">Category</a>
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
    <!-- datatable js  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        function confirmDelete(postId) {
            if (confirm("Are you sure you want to delete this post?")) {
                window.location.href = 'City.php?did=' + postId;
            }
        }
    </script>

    <script src="./js/script.js"></script>

</body>


</html>