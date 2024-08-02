<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>
<?php
//for no of registers
$query = "SELECT * FROM posts WHERE user_id = $logged_user_id";
$r = runQuery($query);
$postsNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 1 AND user_id = $logged_user_id";
$r = runQuery($query);
$approvedNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 0 AND user_id = $logged_user_id";
$r = runQuery($query);
$pendingNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 2 AND user_id = $logged_user_id";
$r = runQuery($query);
$disapprovedNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 1 AND user_id = $logged_user_id AND p_status = 1 ";
$r = runQuery($query);
$rentedNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 1 AND user_id = $logged_user_id AND p_status = 0 ";
$r = runQuery($query);
$unRentedNo  = mysqli_num_rows($r);

$query = "SELECT u.u_id, u.u_name, u.u_email, u.u_contact, i.created_at, i.post_id
          FROM users u
          JOIN interested i ON u.u_id = i.user_id
          WHERE i.owner_id = $logged_user_id";
$r = runQuery($query);
$interestedNo  = mysqli_num_rows($r);



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
  <title>OnlineRent Admin</title>

  <style>
    .block {
      display: flex;

    }

    .iconBox {
      /* color: crimson; */
      /* color: #35a4ba; */
      color: #00b4ff;
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
        <?php include 'nav.php' ?>
      </div>
    </nav>

    <main>

      <div class="main__container">
        <h4>Dashboard</h4>

        <div class="block block1">
          <div class="statusBox">
            <div class="iconBox success">
              <i class="fa-solid fa-house fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Posts</p>
              <h1><?php echo $postsNo; ?></h1>
            </div>

          </div>
          <div class="statusBox ">
            <div class="iconBox warning">
              <i class="fa-regular fa-circle-check fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Approved Posts</p>
              <h1><?php echo $approvedNo; ?></h1>
            </div>
          </div>

          <div class="statusBox">
            <div class="iconBox joy">
              <i class="fa-regular fa-rectangle-xmark fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Disapproved Posts</p>
              <h1><?php echo $disapprovedNo; ?></h1>
            </div>
          </div>

          <div class="statusBox">
            <div class="iconBox joy">
              <i class="fa-solid fa-eye fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Pending Posts</p>
              <h1><?php echo $pendingNo; ?></h1>
            </div>
          </div>

        </div>

        <div class="block block1">
          <div class="statusBox">
            <div class="iconBox success">
              <i class="fas fa-key fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Rented</p>
              <h1><?php echo $rentedNo; ?></h1>
            </div>
          </div>

          <div class="statusBox">
            <div class="iconBox warning">
              <i class="far fa-circle fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Unrented</p>
              <h1><?php echo $unRentedNo; ?></h1>
            </div>
          </div>

          <div class="statusBox">
            <div class="iconBox joy">
              <i class="fas fa-star fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Marked Interested</p>
              <h1><?php echo $interestedNo; ?></h1>
            </div>
          </div>

          <!-- <div class="statusBox">
            <div class="iconBox joy">
              <i class="fas fa-users fa-3x"></i>
            </div>
            <div class="infoBox">
              <p class="mb-0">Lead</p>
              <h1><?php echo $leadNo; ?></h1>
            </div>
          </div> -->
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
        <div class="sidebar__link active_menu_link">
          <i class="fa-solid fa-square-poll-vertical"></i>
          <a href="Dashboard.php">Dashboard</a>
        </div>
        <!-- <h2>MNG</h2> -->
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="./js/script.js"></script>
</body>


</html>