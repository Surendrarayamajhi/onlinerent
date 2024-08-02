<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>
<?php

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $query = "SELECT * FROM posts WHERE p_id = $postId";
    $result = runQuery($query);

    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $title = $post['p_title'];
        $category = $post['p_category'];
        $address = $post['p_address'];


        $postId = $post['p_id'];
        $userId = $post['user_id'];
        $city = $post['p_city'];
        $price = $post['p_price'];
        $description = $post['p_description'];
        $latitude = $post['p_latitude'];
        $longitude = $post['p_longitude'];
        $status = $post['p_status'];
        $created = $post['p_created'];

        // for images 
        $imgQuery = "SELECT * from post_images where post_id = '$postId'";
        $images = runQuery($imgQuery);
    }
} else {
    header('Location:Posts.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- leaflet  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" /> -->
    <!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> -->

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



        .btn-img-remove {
            height: fit-content;
        }

        .file {
            min-width: 120px;
        }

        #map {
            height: 400px;
            width: 100%;
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
            <h4>Edit Post</h4>
            <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="inputEmail4" value="<?php echo $title ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Category</label>


                    <select class="form-select form-select" name="category" aria-label=".form-select-sm example">


                        <?php
                        foreach ($categoryLists as $categoryId => $category) {
                            $selected = ($categoryId == $selectedCategory) ? 'selected' : '';
                            echo '<option value="' . $categoryId . '" ' . $selected . '>' . $category['name'] . '</option>';
                        }
                        ?>



                    </select>
                </div>
                <div class="col-4">

                    <label for="inputCity" class="form-label">City</label>
                    <select class="form-select form-select" name="city" aria-label=".form-select-sm example">
                        <option selected>Select City</option>
                        <?php
                        $selectedCityNumber = $city;
                        foreach ($cityLists as $cityNumber => $city) {
                            $cityName = $city['name'];
                            $selected = ($cityNumber == $selectedCityNumber) ? 'selected' : '';
                            echo '<option value="' . $cityNumber . '" ' . $selected . '>' . $cityName . '</option>';
                        }
                        ?>
                        <!-- <option selected>Select City</option>
                            <option value="1">Itahari</option>
                            <option value="2">Dharan</option>
                            <option value="2">Three Room</option>
                            <option value="3">1BHK</option>
                            <option value="3">Flat</option> -->
                    </select>

                </div>


                <div class="col-4">

                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="<?php echo $address; ?>">



                </div>
                <div class="col-4">
                    <label for="inputAddress" class="form-label">Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                        <?php
                        foreach ($statusLists as $key => $value) {
                            $selected = ($key == $status) ? 'selected' : '';
                            echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                        }
                        ?>

                    </select>




                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="inputAddress2" placeholder="Price per month" value="<?php echo $price ?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Rent Description</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Rent Description " id="floatingTextarea" name="description"><?php echo $description ?></textarea>
                        <label for="floatingTextarea">Description.. </label>
                    </div>
                </div>

                <?php


                if ($images && mysqli_num_rows($images) > 0) {

                    while ($img = mysqli_fetch_assoc($images)) {
                        $imagePath = $img['post_images'];
                        $imgId = $img['post_images_id'];
                        echo '<div class="col-3 col-img">';
                        echo '<img src="../images/' . $imagePath . '" class="d-block w-100" alt="..." style="width: 100px;max-height:200px;min-height:200px;object-fit:contain;border-radius:5px">';
                        echo '<a href="PostImageDel.php?id=' . $imgId . '&postId=' . $postId . '" class="btn btn-danger btn-sm mt-2">Remove</a>';

                        echo '</div>';
                    }
                }
                ?>

                <!-- <div class="col-2">

                            <img src="../images/hero (2).jpg" style="width: 150px;object-fit:contain;border-radius:5px" />
                            <button class="btn btn-danger btn-sm mt-2">Remove</button>

                        </div> -->


                <div class="col-2 lists " id="default-file">
                    <div>
                        <label for="formFile" class="form-label">Images</label>
                        <input class="form-control mt-2 file col-img" type="file" name="input_img_1" id="formFile">
                    </div>



                </div>
                <button id="add-image-btn addMore" class="btn btn-outline-primary" type="button" onclick="addImg();">Add More Image</button>
                <div class="col-6">
                    <div id="map">

                    </div>

                </div>
                <div class="col-6">

                    <div class="d-flex flex-column gap-2">
                        <button onclick="getCurrentLocation();" type="button" class="btn btn-danger btn-sm" id="btnGetLoc">Get My Location</button>
                        <p class="mb-0 mt-1 text-danger">Enter Latitude and Longitude values manually below for more accuracy! <a href="https://maps.google.com/" target="_blank">Google Maps</a></p>
                        <label for="inputAddress" class="form-label d-block mb-0">Latitude</label>
                        <input type="text" name="inputLat" class="form-control" id="inputLat" placeholder="eg: 23.XXXX" value="<?php echo $latitude; ?>">
                        <label for="inputAddress" class="form-label d-block mb-0">Longitude</label>
                        <input type="text" name="inputLong" class="form-control" id="inputLong" placeholder="eg: 87.XXXXX" value="<?php echo $longitude; ?>">
                        <button onclick="changeLoc();" type="button" class="btn btn-primary btn-sm">Update Latitude and Longitude on Map</button>
                    </div>

                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100 btn-sm" name="btnEdit">Edit Post</button>
                </div>
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
                <div class="sidebar__link active_menu_link">
                    <i class="fa-solid fa-list-ul"></i>
                    <a href="Posts.php">Posts</a>
                </div>
                <div class="sidebar__link">
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

    <!-- leaflet  -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/mapEdit.js"></script>

    <script>
        const addForm = document.getElementById('add-image-btn');
        const list = document.querySelector('.lists');

        var existingNoOfImg = document.querySelectorAll('.col-img');
        if (existingNoOfImg.length >= 7) {
            document.getElementById('default-file').style.display = "none";
        }
        console.log(existingNoOfImg)
        console.log(existingNoOfImg.length, 'len')


        var maxImg = 6;

        const generateTemplate = (i) => {
            const imgDiv = document.createElement('div');
            imgDiv.classList.add('d-flex', 'gap-2', 'align-items-center');
            imgDiv.classList.add('col-img'); // Added class for image div
            imgDiv.id = `img${i}`;

            const inputFile = document.createElement('input');
            inputFile.classList.add('form-control', 'mt-2', 'file');
            inputFile.type = 'file';
            inputFile.name = `input_img_${i}`;
            inputFile.id = `formFile`;

            const removeBtn = document.createElement('button');
            removeBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-img-remove');
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', removeImg);

            imgDiv.appendChild(inputFile);
            imgDiv.appendChild(removeBtn);
            list.appendChild(imgDiv);
        };

        function removeImg(event) {
            const removeBtn = event.target;
            const imgDiv = removeBtn.parentNode;
            imgDiv.remove();
            document.getElementById('default-file').style.display = ""; // Show the default-file input when an image is removed
        }

        function addImg() {
            existingNoOfImg = document.querySelectorAll('.col-img').length;
            console.log('ei', existingNoOfImg);
            if (existingNoOfImg >= maxImg) {
                alert('No more images can be added!');
                return;
            }
            generateTemplate(existingNoOfImg + 1);
            if (existingNoOfImg > maxImg) {
                alert('no more image be added');
                // document.getElementById('default-file').style.display = "none";
            }
        }
    </script>
</body>
<?php
if (isset($_REQUEST['btnEdit'])) {
    // Retrieve form data
    $title = $_POST["title"];
    $category = $_POST["category"];
    $city_id = $_POST["city"];
    $address = $_POST["address"];
    $status_id = $_POST['status'];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $lat = $_POST["inputLat"];
    $long = $_POST["inputLong"];

    $filename = $_FILES["input_img_1"]["name"]; //fileName
    $tempname = $_FILES["input_img_1"]["tmp_name"]; //fullPath



    $query = "UPDATE posts
        SET p_title = '$title',
        p_category = '$category',
        p_city = '$city_id',
        p_address = '$address',
        p_status = '$status_id',
        p_price = '$price',
        p_description = '$description',
        p_latitude = '$lat',
        p_longitude = '$long'
        WHERE p_id = '$postId'";

    // Execute the query
    $result = runQuery($query);

    for ($i = 1; $i <= 6; $i++) {
        // Check if the image file exists in the $_FILES array
        if (isset($_FILES["input_img_$i"]) && $_FILES["input_img_$i"]["error"] == 0) {
            $filename = $_FILES["input_img_$i"]["name"];
            $tempname = $_FILES["input_img_$i"]["tmp_name"];

            // Move the uploaded image to the desired folder
            $folder = "../images/" . $filename;
            move_uploaded_file($tempname, $folder);

            // Insert the image into the 'post_images' table
            $imgInsert = "INSERT INTO post_images (post_images, post_id, status) VALUES ('$filename', '$postId', 'active')";
            $imgResult = runQuery($imgInsert);

            if ($imgResult) {
                // echo 'Image Insert done';
            } else {
                // echo "Error: " . mysqli_error($conn);
            }
        }
    }
    echo "<script>window.location.href='PostView.php?id=$postId';</script>";
}
?>


</html>