<?php include '../global_backend/Helper.php';
$query = "SELECT * FROM posts where p_status = '1' AND is_approved = 1 ORDER BY p_created DESC";
$result = runQuery($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineRent </title>
    <meta name="description" content="Discover OnlineRent, your user-friendly online platform for hassle-free house rentals in Nepal. Find, list, and rent properties effortlessly. Experience seamless property searches, real-time communication, and easy listings.">

    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bs css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- animate  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="../global_style/global.css">
    <link rel="stylesheet" href="style/home.css">
    <style>
        .product-image-container {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .product-image {
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);

            opacity: 0.8;

        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light  bg-light animate__animated animate__fadeInDown" id="nav">
            <div class="container-fluid css-container">
                <a class="navbar-brand text-dark animate__animated animate__fadeInLeft" href="home.php" id="brand">OnlineRent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php include 'codeNavLinksHome.php'; ?>
                    </ul>
                    <?php
                    include 'codeNavRemainingLinks.php';
                    include 'codeNavAuth.php';
                    ?>


                </div>
            </div>
        </nav>
    </div>

    <div class="hero-wrap position-relative ">
        <div class="img-overlay"></div>
        <div class="hero-search-wrap css-container   text-white  w-100 h-100 d-flex flex-column flex-sm-column flex-md-column flex-lg-row justify-content-sm-start justify-content-md-between  align-items-end align-items-sm-center p-5 gap-sm-3 gap-md-3">
            <div class="h-100 d-flex align-items-center  hero-text-wrap">
                <div class="animate__animated animate__fadeInLeft ">
                    <h1 id="typing-effect" class="text-sm-center text-md-center">Renting made Easy...</h1>
                    <p class="">OnlineRent</p>
                </div>
            </div>
            <form class="rounded row g-3 bg-light text-dark p-4 animate__animated animate__fadeInRight" method="POST" action="">
                <div class="col-sm-12 col-md-12 ">
                    <label for="inputCity" class="form-label">Title</label>
                    <input type="text" class="form-control form-control-sm" id="inputTitle" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
                </div>
                <div class="col-sm-12 col-md-6 ">
                    <label for="inputState" class="form-label">City</label>
                    <select class="form-select form-select-sm" name="city" aria-label=".form-select-sm example" required>
                        <option selected>Select City</option>
                        <?php
                        foreach ($cityLists as $id => $cityInfo) {
                            $selected = isset($_POST['city']) && $_POST['city'] == $id ? 'selected' : '';
                            echo '<option value="' . $id . '" ' . $selected . '>' . $cityInfo['name'] . '</option>';
                        }
                        ?>
                    </select>

                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="inputState" class="form-label">Category</label>
                    <select class="form-select form-select-sm" name="category" aria-label=".form-select-sm example" required>
                        <option selected>Select Category</option>
                        <?php
                        foreach ($categoryLists as $id => $categoryInfo) {
                            $selected = isset($_POST['category']) && $_POST['category'] == $id ? 'selected' : '';
                            echo '<option value="' . $id . '" ' . $selected . '>' . $categoryInfo['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="inputZip" class="form-label">Min</label>
                    <input type="number" class="form-control form-control-sm" id="inputMin" name="min" value="<?php echo isset($_POST['min']) ? $_POST['min'] : ''; ?>">
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="inputZip" class="form-label">Max</label>
                    <input type="number" class="form-control form-control-sm" id="inputMax" name="max" value="<?php echo isset($_POST['max']) ? $_POST['max'] : ''; ?>">
                </div>
                <div class="col-sm-12 col-md-12 d-flex align-items-end">
                    <button type="submit" name="btnSearch" class="form-control btn btn-sm btn-primary">Search</button>
                </div>
            </form>

        </div>
    </div>

    <div class="css-container ad-list mt-4">

        <div class="container">
            <h4>Find Rents</h4>
            <div class="row g-4">
                <?php

                if (isset($_POST['btnSearch'])) {
                    $title = $_POST['title'];
                    $city = $_POST['city'];
                    $category = $_POST['category'];
                    $min = $_POST['min'];
                    $max = $_POST['max'];

                    $query = "SELECT * FROM posts WHERE p_status = '1' AND is_approved = 1";
                    // $result = runQuery($query);
                    $posts = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $posts[] = $row;
                    }

                    // Linear Search Algorithm
                    function linear_search($posts, $title, $city, $category, $min, $max)
                    {
                        $filtered_posts = array();


                        // Filtering the posts by user give filter input one by one

                        /** stripos($post['p_title'], $title) !== false &&**/
                        /**($city == 'Select City' || $post['p_city'] == $city) &&**/
                        /**($category == 'Select Category' || $post['p_category'] == $category) &&**/
                        /**(empty($min) || is_numeric($min) && $post['p_price'] >= $min) &&**/
                        /**(empty($max) || is_numeric($max) && $post['p_price'] <= $max) **/

                        // repeat this step until no posts remains

                        foreach ($posts as $post) {
                            if (
                                stripos($post['p_title'], $title) !== false &&
                                ($city == 'Select City' || $post['p_city'] == $city) &&
                                ($category == 'Select Category' || $post['p_category'] == $category) &&
                                (empty($min) || is_numeric($min) && $post['p_price'] >= $min) &&
                                (empty($max) || is_numeric($max) && $post['p_price'] <= $max)
                            ) {
                                $filtered_posts[] = $post; //storing result
                            }
                        }
                        return $filtered_posts;
                    }
                    $filtered_results = linear_search($posts, $title, $city, $category, $min, $max);
                    if (!empty($filtered_results)) {

                        foreach ($filtered_results as $row) {

                            $postId = $row['p_id'];
                            $title = $row['p_title'];
                            $category_no = $row['p_category'];
                            $address = $row['p_address'];
                            $price = $row['p_price'];

                            $query = "SELECT * FROM post_images WHERE post_id = $postId LIMIT 1";
                            $imageResult = runQuery($query);
                            $imageRow = mysqli_fetch_assoc($imageResult);
                            $image = null;
                            if ($imageRow) {
                                $image = $imageRow['post_images'];
                            } ?>
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

                <?php   }
                    } else {
                        echo '<div class="alert alert-info" role="alert">No matching property found found.</div>';
                    }
                } else {
                    include './rentDisplay.php';
                }

                ?>
            </div>
        </div>
    </div>

    <?php

    include 'codeFooter.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../global_js/app.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>