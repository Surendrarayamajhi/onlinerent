<?php include '../global_backend/Helper.php' ?>
<?php

isUserLoggedIn();
isTenent();

$query = "SELECT * FROM `interested` WHERE `user_id` = $logged_user_id";
$result = runQuery($query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineRent</title>
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bs css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../global_style/global.css">
    <link rel="stylesheet" href="style/home.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent scrolled " id='nav'>
            <div class="container-fluid css-container">
                <a class="navbar-brand text-dark" href="home.php">OnlineRent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        include 'codeNavLinks.php'
                        ?>


                    </ul>
                    <?php
                    include 'codeNavRemainingLinks.php';
                    include 'codeNavAuth.php';
                    ?>
                </div>
            </div>
        </nav>
    </div>

    <!-- <div class="hero-wrap position-relative ">
        <div class="img-overlay"></div>
        <div class="hero-search-wrap css-container   text-white  w-100 h-100 d-flex flex-column flex-sm-column flex-md-column flex-lg-row justify-content-between  align-items-end align-items-sm-center p-5 gap-sm-3 gap-md-3">
            <div class="h-100 d-flex align-items-center  hero-text-wrap">
                <div class="">
                    <h1 id="typing-effect" class="text-sm-center text-md-center"></h1>
                    <p class="">OnlineRent</p>
                </div>
            </div>
            <form class="rounded row g-3 bg-light text-dark p-4">
                <div class="col-md-6 col-sm-12">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control form-control-sm" id="inputCity">
                </div>
                <div class="col col-md-6 col-sm-12">
                    <label for="inputState" class="form-label ">State</label>
                    <select id="inputState" class="form-select form-select-sm">
                        <option selected>Choose...</option>
                        <option>ss</option>
                        <option>ss</option>
                    </select>
                </div>
                <div class=" col col-md-12 col-sm-12">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control form" id="inputZip">
                </div>
                <div class=" col col-md-12 d-flex align-items-end">

                    <button type="submit" class=" form-control btn btn-sm btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div> -->

    <div class="css-container ad-list mt-4 ">

        <div class="container" style="margin-top: 80px;min-height:100vh;">
            <h4>Your Interested Lists</h4>
            <div class="row g-4">
                <?php if (mysqli_num_rows($result) > 0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <?php
                        $postId = $row['post_id'];

                        $postQuery = "SELECT * FROM `posts` WHERE `p_id` = $postId";
                        $postResult = runQuery($postQuery);

                        $postAvailable = false; // Initialize the flag

                        // Check if the post details are fetched successfully
                        if (mysqli_num_rows($postResult) > 0) {
                            while ($postRow = mysqli_fetch_assoc($postResult)) {
                                $title = $postRow['p_title'];
                                $category_no = $postRow['p_category'];
                                $address = $postRow['p_address'];
                                $price = $postRow['p_price'];
                                $postAvailable = true;
                            }

                            $img = getFirstImage($postId);
                        } else {
                            // Post details not found, display a message
                            $title = 'Post Removed';
                            $address = 'Undefined';
                            $price = 'Undefined';
                            $img = ''; // You might want to add a placeholder image here
                        }
                        ?>

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                            <?php if ($postAvailable) : ?>
                                <div class="card">
                                    <!-- Your card content here -->
                                    <img src="../images/<?php echo $img; ?>" class="card-img-top css-card-img" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo ' ' . $title; ?></h5>
                                        <div class="d-flex justify-content-between align-items-center gap-3">
                                            <p class="card-text m-0 one-line"><i class="fa-solid fa-location-dot"></i><?php echo ' ' . $address; ?></p>
                                            <!-- <i class="fa-regular fa-heart" style="color: #df2a2a; font-size: 20px;"></i> -->
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
                            <?php else : ?>
                                <div class="card text-center">
                                    <div class="card-body">

                                        <p class="text-danger">This post is no longer available!</p>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="col-12 text-center mt-4">
                        <p>No posts found.</p>
                    </div>
                <?php endif; ?>
            </div>






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
<script src="../global_js/app.js"></script>
<!-- <script>
    const navbar = document.getElementById('nav');
    const navLinks = document.querySelectorAll('.nav-link');
    const btnLogin = document.querySelector('.btn-login');

    const logoWrap = document.querySelector('.navbar-brand');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {

            navbar.classList.add('scrolled');
            btnLogin.classList.remove('btn-light');
            btnLogin.classList.add('btn-dark');

            logoWrap.classList.add('nav-link-scroll');
            navLinks.forEach(link => {
                link.classList.add('nav-link-scroll');
            });


        } else {
            navbar.classList.remove('scrolled');
            btnLogin.classList.remove('btn-dark');
            btnLogin.classList.add('btn-light');
            logoWrap.classList.remove('nav-link-scroll');
            navLinks.forEach(link => {
                link.classList.remove('nav-link-scroll');
            });


        }
    });
</script> -->

</html>