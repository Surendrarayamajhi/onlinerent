<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>
<?php

if (isset($_GET['id'])) {
  $postId = $_GET['id'];

  // Fetch the post data from the 'posts' table
  $query = "SELECT * FROM posts WHERE p_id = $postId";
  $result = runQuery($query);
  $postAvailable = false;

  if ($result && mysqli_num_rows($result) > 0) {
    $postAvailable = true;
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
} else {
  header('Location:Posts.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- fontawesome  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



  <!-- leaflet  -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <link rel="stylesheet" href="./style/styles.css" />
  <title>OnlineRent-SuperAdmin</title>
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


    /* responsive START  */
    @media (max-width: 992px) {
      .css-view-hero {
        display: grid;
        grid-template-columns: 1fr;
        gap: 25px;
      }
    }

    /* responsive END */

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
      <?php if (!$postAvailable) : ?>
        <div class="main__container">
          <h4>View Post</h4>
          <div class="alert alert-danger mt-3" role="alert">
            This post has been removed.
          </div>
        </div>
      <?php else : ?>
        <!-- Your existing code for displaying the post content here -->



        <div class="main__container">
          <h4>View Post</h4>


          <div class="">
            <div class="css-view-hero">

              <div>
                <h5>Photo Gallary</h5>
                <div id="carouselExampleCaptions" class="carousel carousel-dark  slide" data-bs-ride="carousel">

                  <div class="carousel-indicators">

                    <?php


                    $numImages = mysqli_num_rows($images);
                    if ($images && $numImages > 0) {
                      echo '<div class="carousel-indicators">';
                      for ($i = 0; $i < $numImages; $i++) {
                        $activeClass = ($i === 0) ? 'active' : ''; // Add 'active' class to the first indicator
                        echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $i . '" class="' . $activeClass . '" aria-label="Slide ' . ($i + 1) . '"></button>';
                      }
                      echo '</div>';
                    }

                    ?>
                  </div>
                  <div class="carousel-inner">
                    <?php


                    if ($images && mysqli_num_rows($images) > 0) {
                      $active = true; // Variable to track the active carousel item
                      while ($img = mysqli_fetch_assoc($images)) {
                        $imagePath = $img['post_images'];
                        echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                        echo '<img src="../images/' . $imagePath . '" class="d-block w-100" alt="...">';
                        echo '</div>';
                        $active = false; // Set active to false after the first item
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

                  </div>


                </div>

                <div class="shadow p-3 mt-4">
                  <h5 class="mb-2">Description</h5>
                  <p><?php echo $description ?></p>



                </div>
                <div class="shadow p-3 mt-4">
                  <h5 class="mb-2">Approve Status</h5>
                  <?php
                  $approveStatus = getApproveLists($isApprove_id);
                  if ($approveStatus === 'Approved') {
                    echo '<h5><span class="badge rounded-pill bg-success">Approved</span></h5>';
                  } elseif ($approveStatus === 'Disapproved') {
                    echo '<h5><span class="badge rounded-pill bg-danger">Disapproved</span></h5>';
                  } else {
                    echo '<h5><span class="badge bg-secondary rounded-pill">' . $approveStatus . '</span></h5>';
                  }
                  ?>
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
          </div>
        </div>
      <?php endif; ?>
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
  <!-- bs cdn  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
  <!-- leaflet  -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <script src="./js/script.js"></script>

  <script src="./js/mapView.js"></script>
  <script>
    var lat = document.getElementById('getLat').innerText;
    var lon = document.getElementById('getLong').innerText;
    console.log(lat);
    console.log(lon);
  </script>

</body>

</html>