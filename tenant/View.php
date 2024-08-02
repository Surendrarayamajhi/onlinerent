<?php include '../global_backend/Helper.php' ?>
<?php
// if (isUserLoggedIn()) {
//     redirectToCurrentUser();
// }
?>
<?php
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    // Fetch the post data from the 'posts' table
    $query = "SELECT * FROM posts WHERE p_id = $postId";
    $result = runQuery($query);

    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $title = $post['p_title'];
        $category = $post['p_category'];
        $address = $post['p_address'];


        $postId = $post['p_id'];
        $userId = $post['user_id'];
        $city_id = $post['p_city'];
        $price = $post['p_price'];
        $description = $post['p_description'];
        $latitude = $post['p_latitude'];
        $longitude = $post['p_longitude'];
        $status_id = $post['p_status'];
        $isApprove_id = $post['is_approved'];
        $created = $post['p_created'];

        // for images 
        $imgQuery = "SELECT * from post_images where post_id = '$postId'";
        $images = runQuery($imgQuery);
    }
}

// Assuming you have a database connection established

// Define the user ID you want to retrieve
$userId = $post['user_id'];

// SQL query to fetch the 'u_contact' field from the 'users' table
$sql = "SELECT u_contact FROM users WHERE u_id = $userId";

// Execute the SQL query
$result = runQuery($sql);

// Check if the query was successful
if ($result) {
    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);

    // Get the 'u_contact' value
    $uContact = $row['u_contact'];

    // Now, $uContact contains the value of 'u_contact' for the specified user ID
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}


//for recommendation START
$queryRecommen = "SELECT * FROM posts where p_status = '1' AND is_approved = 1 AND p_city = $city_id ORDER BY p_created DESC";
$resultRecommen = runQuery($queryRecommen);

//for recommendation  END


if (isset($_GET['interested_id']) && isTenent()) {

    if (isUserLoggedIn()) {

        $postId = $_GET['interested_id'];
        $ownerId = getUserIdFromPostId($postId);

        // $query = "INSERT INTO interested (user_id, post_id,owner_id) VALUES ('$logged_user_id', '$postId','$ownerId')
        //       ON DUPLICATE KEY UPDATE user_id = VALUES(user_id), post_id = VALUES(post_id)";
        $query = "INSERT INTO interested (user_id, post_id, owner_id) VALUES ('$logged_user_id', '$postId', '$ownerId')
          ON DUPLICATE KEY UPDATE user_id = VALUES(user_id), post_id = VALUES(post_id), owner_id = VALUES(owner_id)";

        $res = runQuery($query);
        echo "<script>window.location.href = 'View.php?id=$postId';</script>";
    }
}

if (isset($_GET['uninterested_id']) && isTenent()) {
    if (isUserLoggedIn()) {
        $postId = $_GET['uninterested_id'];
        $query = "DELETE from interested where user_id = '$logged_user_id' AND post_id = '$postId'";
        $res = runQuery($query);
        echo "<script>window.location.href='View.php?id=$postId';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bs css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../global_style/global.css">
    <!-- leaflet  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        .carousel-item img {
            object-fit: cover;
            height: 400px;
        }

        .carousel-caption {
            background-color: white;
            color: black;
            opacity: 0.6;
            border-radius: 5px;


        }

        .carousel-caption p {
            font-weight: 600;
        }

        .carousel-control-next-icon {
            background-color: black;
            padding: 5px;
            border-radius: 50%;
            opacity: 0.6;
            padding: 5px;
            font-size: 15px;
        }

        .css-view-hero {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 25px;
        }


        #map {
            height: 400px;
            width: 100%;
        }


        /* for CSS hover effect START  */
        /* CSS for e-commerce product image effect */
        .product-image-container {
            position: relative;
            overflow: hidden;
            width: 100%;

            /* Adjust the height to match your image dimensions */
        }

        .product-image {
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
            /* Adjust the scale factor to your preference */
            opacity: 0.8;
            /* Adjust the opacity to your preference */
        }

        /* for CSS hover effect END  */

        /* responsive START  */
        @media (max-width: 992px) {
            .css-view-hero {
                display: grid;
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        /* responsive END */
    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-light shadow">
        <div class="container-fluid css-container">
            <a class="navbar-brand text-dark" href="home.php">OnlineRent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-dark bg-light"><i class="fas fa-bars" style="color:#212529; font-size:28px;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    include 'codeNavLinks.php'
                    ?>


                </ul>

                <!-- <span><a href="Chat.php" class="btn btn-outline-primary bg-light mx-2 text-black">Chat</a></span> -->
                <?php
                include 'codeNavRemainingLinks.php';
                include 'codeNavAuth.php';
                ?>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="css-view-hero">

            <div>
                <h5>Photo Gallary</h5>
                <div id="carouselExampleCaptions" class="carousel carousel-dark  slide" data-bs-ride="carousel">

                    <div class="carousel-indicators">
                        <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                        <?php


                        $numImages = mysqli_num_rows($images);
                        if ($images && $numImages > 0) {
                            echo '<div class="carousel-indicators">';
                            for ($i = 0; $i < $numImages; $i++) {
                                $activeClass = ($i === 0) ? 'active' : '';
                                echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $i . '" class="' . $activeClass . '" aria-label="Slide ' . ($i + 1) . '"></button>';
                            }
                            echo '</div>';
                        }

                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        if ($images && mysqli_num_rows($images) > 0) {
                            $active = true;
                            while ($img = mysqli_fetch_assoc($images)) {
                                $imagePath = $img['post_images'];
                                echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                                echo '<img src="../images/' . $imagePath . '" class="d-block w-100" alt="...">';
                                echo '</div>';
                                $active = false;
                            }
                        }
                        ?>




                    </div>
                    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <div class="bg-light d-flex justify-content-center align-items-center p-1 rounded-circle wid">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </div>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <div class="bg-light d-flex justify-content-center align-items-center p-1 rounded-circle wid">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </div>
                    </button>
                </div>
            </div>
            <div class="pt-0 pt-sm-0 pt-md-0 pt-lg-4 mt-0 mt-sm-0  mt-md-0  mt-lg-3">

                <div class="shadow p-3">
                    <h4 class=""><?php echo $title; ?></h4>

                    <div class="d-flex align-items-center gap-3 ad-view-control-wrap ">
                        <?php
                        if (isSessionSet()) {

                            if (checkIfInterested($logged_user_id, $postId)) {
                                echo '<a href="View.php?uninterested_id=' . $postId . '"><button class="btn btn-outline-primary btn-sm">Uninterested</button></a>';
                            } else {
                                echo '<a href="View.php?interested_id=' . $postId . '"><button class="btn btn-outline-primary btn-sm">Interested</button></a>';
                            }
                        } else {
                            echo '<a href="View.php?interested_id=' . $postId . '"><button class="btn btn-outline-primary btn-sm">Interested</button></a>';
                        }


                        ?>
                        <!-- <a href="VIew.php?interested_id=<?php echo $postId ?>"><button class="btn btn-outline-primary btn-sm">Interested</button></a> -->
                        <a href="Chat.php?postId=<?php echo $postId ?>"><button class="btn btn-danger btn-sm">Message</button></a>
                        <!-- <button class="btn btn-outline-none btn-sm btn-fav"><i class="fa-solid fa-heart"></i></button> -->
                    </div>


                </div>


                <div class="shadow p-3 mt-4">
                    <h5 class="mb-2">Description</h5>
                    <p><?php echo $description ?></p>



                </div>
            </div>
        </div>

        <div class="mt-4 pt-1">
            <h5>Information</h5>
            <div class="row  shadow p-3 rounded">
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-danger">City</h6>
                    <p><?php echo getCity($city_id); ?></p>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-danger">Address</h6>
                    <p><?php echo $address; ?></p>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-danger">Price</h6>
                    <p><?php echo $price; ?></p>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-danger">Category</h6>
                    <p><?php echo getCategory($category); ?></p>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-danger">Status</h6>
                    <p><?php echo getStatus($status_id); ?></p>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-danger">Contact</h6>
                    <p class="text-success fw-bold"><?php echo $uContact ?></p>
                </div>

            </div>
        </div>

        <h5 class="mt-3">Map</h5>
        <div class="row">
            <div class="col-12 col-lg-3">
                <label>Latitude</label>
                <input type="number" id="getLat" class='form-control border-0 ' value="<?php echo $latitude ?>" readonly />
            </div>
            <div class="col-12 col-lg-3"> <label>Longitude</label><input type="number" id="getLong" class='form-control border-0' value="<?php echo $longitude ?>" readonly /></div>
        </div>

        <div id="map" class="mt-3">

        </div>

        <!-- Recommend posts -->
        <h5 class="mt-4">Related Property</h5>
        <div class="row g-4 ">
            <?php while ($row = mysqli_fetch_assoc($resultRecommen)) : ?>
                <?php
                $postId = $row['p_id'];
                $title = $row['p_title'];
                $category_no = $row['p_category'];
                $address = $row['p_address'];
                $price = $row['p_price'];

                // Fetch the image for the post
                $query = "SELECT * FROM post_images WHERE post_id = $postId LIMIT 1";
                $imageResult = runQuery($query);
                $imageRow = mysqli_fetch_assoc($imageResult);
                $image = null;
                if ($imageRow) {
                    $image = $imageRow['post_images'];
                }
                ?>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card product-card"> <!-- Added 'product-card' class -->
                        <div class="product-image-container">
                            <img src="../images/<?php echo $image; ?>" class="card-img-top css-card-img product-image" alt="..."> <!-- Added 'product-image' class -->
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ' ' . $title; ?></h5>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <p class="card-text m-0 one-line"><i class="fa-solid fa-location-dot"></i><?php echo ' ' . $address; ?></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><i class="fa-solid fa-building"></i><?php echo ' ' . getCategory($category_no); ?></p>
                                <p class="p-0 m-0"><i class="fa-solid fa-money-bill"></i> <?php echo ' ' . $price; ?></p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                                <a href="View.php?id=<?php echo $postId; ?>" class="btn btn-outline-primary btn-sm w-100">View</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

            <?php
            if (mysqli_num_rows($result) == 0) {
                echo '<div class="alert alert-info" role="alert">No related property found.</div>';
            }

            ?>





        </div>


    </div>
    <?php

    include 'codeFooter.php';
    ?>
</body>
<!-- bs cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jquery cdn  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="./js/mapView.js"></script>

</html>