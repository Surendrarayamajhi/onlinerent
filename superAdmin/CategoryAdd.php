<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>

<?php
if (!isset($_POST['btnInsert'])) {
    // Do nothing if the button is not clicked
} else if (isset($_POST['btnInsert'])) {
    // Assuming you have your $conn object and runQuery function

    $new_category_name = $_POST['category_name'];

    // You should validate the input and ensure it's unique before inserting

    // Perform the insert operation using your custom runQuery function
    $insert_query = "INSERT INTO category (name) VALUES ('$new_category_name')";
    $result = runQuery($insert_query);

    if ($result) {
        // Redirect to a success page or show a success message
        header("Location: Category.php");
        exit();
    } else {
        // Redirect to an error page or show an error message
        header('Location: ../global_html/Error.php');
        exit();
    }
    exit();
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

        #main-img {
            max-height: 250px;
            object-fit: cover;
            object-position: 100% 0;
            object-position: 0 20%;

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
            <h4>Category Add</h4>



            <!-- Your HTML form code -->
            <form action="CategoryAdd.php" method="POST">
                <div class="col-4 mb-2">
                    <label for="inputCategory" class="form-label text-success fw-bold">Already Listed Categories</label>
                    <select class="form-select form-select" name="category" aria-label=".form-select-sm example" required>
                        <option selected>See Categories</option>
                        <?php
                        foreach ($categoryLists as $categoryNumber => $category) {
                            $categoryName = $category['name'];
                            echo '<option value="' . $categoryNumber . '">' . $categoryName . '</option>';
                        }
                        ?>
                    </select>
                    <hr />
                </div>
                <div class="mb-3">
                    <label for="cn" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="cn" aria-describedby="emailHelp" name="category_name" placeholder="Enter category name">
                    <div id="emailHelp" class="form-text">
                        <p class="text-danger">Enter unique name</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="btnInsert">Add Category</button>
            </form>


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
                <div class="sidebar__link">
                    <i class="fa-solid fa-city "></i>
                    <a href="City.php">Cities</a>
                </div>
                <div class="sidebar__link  active_menu_link">
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
    <script src="./js/script.js"></script>

</body>


</html>
<?php

// UPDATE CITY 

?>