<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>

<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap  CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- leaflet  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="./style/styles.css" />
    <title>OnlineRent Admin</title>
    <style>
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
                <?php include 'nav.php' ?>
            </div>
        </nav>
        <main>
            <div class="main__container">
                <h4>Add Post</h4>
                <form class="row g-3 mb-4" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Category</label>
                        <select class="form-select form-select" name="category" aria-label=".form-select-sm example" required>
                            <option selected>Select Category</option>
                            <?php
                            foreach ($categoryLists as $categoryId => $category) {
                                $categoryName = $category['name'];
                                $isActive = $category['isActive'];

                                if ($isActive) {
                                    echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                                }
                            }
                            ?>
                        </select>


                    </div>
                    <div class="col-6">

                        <label for="inputCity" class="form-label">City</label>
                        <select class="form-select form-select-sm" name="city" aria-label=".form-select-sm example" required>
                            <option selected>Select City</option>
                            <?php
                            foreach ($cityLists as $cityNumber => $city) {
                                $cityName = $city['name'];
                                $isActive = $city['isActive'];

                                if ($isActive) {
                                    echo '<option value="' . $cityNumber . '">' . $cityName . '</option>';
                                }
                            }
                            ?>
                        </select>


                    </div>
                    <div class="col-6">

                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>



                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="inputAddress2" placeholder="Price per month" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Rent Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Rent Description " id="floatingTextarea" name="description"></textarea>
                            <label for="floatingTextarea">Description.. </label>
                        </div>
                    </div>
                    <div class="col-12 lists">
                        <label for="formFile" class="form-label">Images</label>
                        <!-- <p class="text-danger">Note: It only supports Images</p> -->
                        <input class="form-control mt-2 file" type="file" name="input_img_1" id="formFile" required>
                    </div>
                    <button id="add-image-btn addMore" class="btn btn-outline-primary" type="button" onclick="addImg();">Add More Image</button>
                    <div class="col-6">
                        <div id="map">

                        </div>

                    </div>
                    <div class="col-6">

                        <div class="d-flex flex-column gap-2">
                            <button onclick="getCurrentLocation();" type="button" class="btn btn-danger btn-sm" id="btnGetLoc"><i class="fa-solid fa-location-crosshairs"></i> | Get My Location</button>
                            <p class="mb-0 mt-1 text-danger">Enter Latitude and Longitude values manually below for more accuracy! <a href="https://maps.google.com/" target="_blank">Google Maps</a></p>
                            <label for="inputAddress" class="form-label d-block mb-0">Latitude</label>
                            <input type="text" name="inputLat" class="form-control" id="inputLat" placeholder="eg: 23.XXXX" value="1.0">
                            <label for="inputAddress" class="form-label d-block mb-0">Longitude</label>
                            <input type="text" name="inputLong" class="form-control" id="inputLong" placeholder="eg: 87.XXXXX" value="1.0">
                            <button onclick="changeLoc();" type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-map-location-dot"></i> | Update Latitude and Longitude on Map</button>
                        </div>

                    </div>
                    <div class="col-12 mb-4">
                        <button type="submit" class="btn btn-primary w-100 btn-sm" name="btnAdd">Add Post</button>
                        <p class="fs-6">Please be patient while adding property. It may take a while, depending on image size.</p>
                    </div>
                    <!-- <img src="../images/hero (2).jpg" /> -->
                </form>
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
                <div class="sidebar__link active_menu_link">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
    <!-- leaflet  -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="./js/script.js"></script>
    <script src="./js/map.js"></script>
    <script>
        const addForm = document.querySelector('.addMore');
        const list = document.querySelector('.lists');

        var noOfImg = 1;


        const generateTemplate = (i) => {
            const imgDiv = document.createElement('div');
            imgDiv.classList.add('d-flex', 'gap-2', 'align-items-center');
            imgDiv.id = `img${i}`;

            const inputFile = document.createElement('input');
            inputFile.classList.add('form-control', 'mt-2', 'file');
            inputFile.type = 'file';
            inputFile.name = `input_img_${i}`;
            inputFile.id = `formFile`;
            inputFile.required = true; // Add the required attribute

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
        }



        function addImg() {
            noOfImg = list.children.length;
            if (noOfImg == 7) {
                alert('No more images can be added!')
                return;
            }
            generateTemplate(noOfImg);
            console.log(list.children.length);
        }
    </script>

</body>
<?php
if (isset($_REQUEST['btnAdd'])) {
    // Retrieve form data
    $title = $_POST["title"];
    $category = $_POST["category"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $lat = $_POST["inputLat"];
    $long = $_POST["inputLong"];

    $filename = $_FILES["input_img_1"]["name"]; //fileName

    $tempname = $_FILES["input_img_1"]["tmp_name"]; //fullPath
    $folder = "../images/" . $filename;
    move_uploaded_file($tempname, $folder);

    // Display the retrieved data
    // echo "Title: " . $title . "<br>";
    // echo "Category: " . $category . "<br>";
    // echo "City: " . $city . "<br>";
    // echo "Address: " . $address . "<br>";
    // echo "Price: " . $price . "<br>";
    // echo "Description: " . $description . "<br>";
    // echo "Lat: " . $lat . "<br>";
    // echo "Long: " . $long . "<br>";
    // echo 'Filename' . $filename . '<br>';

    // Prepare the SQL query to insert data into the posts table
    $query = "INSERT INTO posts (p_title, user_id, p_category, p_city, p_address, p_price, p_description, p_latitude, p_longitude, p_status)
              VALUES ('$title', '$logged_user_id', '$category', '$city', '$address', '$price', '$description', '$lat', '$long', 1)";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Data inserted successfully
        echo "Data inserted into the posts table.";
    } else {
        // Failed to insert data
        echo "Error: " . mysqli_error($conn);
    }

    //get primary key
    $query = "SELECT MAX(p_id) AS largest_id FROM posts";
    $row = runQuery($query);
    $row = mysqli_fetch_assoc($row);
    $largestId = $row['largest_id'];
    echo $largestId;


    // Loop through each uploaded image
    for ($i = 1; $i <= 6; $i++) {
        // Check if the image file exists in the $_FILES array
        if (isset($_FILES["input_img_$i"]) && $_FILES["input_img_$i"]["error"] == 0) {
            $filename = $_FILES["input_img_$i"]["name"];

            $tempname = $_FILES["input_img_$i"]["tmp_name"];

            // Move the uploaded image to the desired folder
            $folder = "../images/" . $filename;
            move_uploaded_file($tempname, $folder);

            // Insert the image into the 'post_images' table
            $imgInsert = "INSERT INTO post_images (post_images, post_id, status) VALUES ('$filename', '$largestId', 'active')";
            $imgResult = runQuery($imgInsert);

            if ($imgResult) {
                echo 'Image Insert done';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }






    // Close the database connection
    mysqli_close($conn);
    exit();
}
?>

</html>