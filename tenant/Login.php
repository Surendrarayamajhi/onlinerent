<?php include '../global_backend/Helper.php' ?>

<?php
$errorFlag = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    if (isUserLoggedIn()) {
        if ($_SESSION['u_type'] == 'looking') {
            header("Location: ../tenant/home.php");
        } elseif ($_SESSION['u_type'] == 'renting') {
            header("Location: ../houseOwner/Posts.php");
        } elseif ($_SESSION['u_type'] == 'superadmin') {
            header("Location: ../superAdmin/Dashboard.php");
        }
    }


    if ($email == "superadmin@gmail.com" && $password == "superadmin") {
        $_SESSION['u_type'] = "superadmin";
        $_SESSION['user_name'] = $row['u_name'];
        header('Location: ../superAdmin/Dashboard.php');
    } else {
        // Prepare the query to fetch user data
        $query = "SELECT * FROM users WHERE u_email = '$email' AND u_password = '$password' LIMIT 1";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['u_id'];
            $_SESSION['u_type'] = $userType;
            $_SESSION['user_name'] = $row['u_name'];

            if ($userType == "looking") {
                header("Location: home.php");
            } elseif ($userType == "renting") {
                header("Location: ../houseOwner/Posts.php");
            }

            exit();
        } else {
            header("Location: login.php?error=true");
        }
    }
} else if (isset($_GET["error"]) && $_GET["error"] == true) {
    $errorFlag = true;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bs css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../global_style/global.css">
    <style>
        body {

            background-image: url('../assets/images/city butwal.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        form {
            opacity: 0.9;
            z-index: 100;
            width: 50%;
        }

        .img-overlay {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.2);
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            z-index: 1 !important;
        }

        @media only screen and (max-width: 900px) {
            form {
                width: 100% !important;
            }

        }
    </style>
</head>

<body>
    <div class="img-overlay"></div>
    <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent" id='nav'>
            <div class="container-fluid css-container">
                <a class="navbar-brand text-light" href="home.php">OnlineRent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        // include 'codeNavLinks.php'
                        ?>


                    </ul>
                    <div class="d-flex gap-3 ">
                        <!-- <button class="btn btn-outline-light nav-link hover-text-black">Add Property</button> -->
                        <!-- <button class="btn  btn-login">Login</button> -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container d-flex align-items-center flex-column justify-content-center min-vh-100">

        <form class="border d-flex flex-column gap-3  p-4 shadow mt-2 bg-light rounded" method="POST" action="">
            <h5 class="text-center">Login to <span class="text-primary">OnlineRent</span></h5>
            <div class="form-row d-flex flex-column gap-3 ">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control  form-control-sm" id="inputEmail4" placeholder="Email" name="email" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control  form-control-sm" id="inputPassword4" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="userType" id="lookingForRoom" value="looking" checked>
                    <label class="form-check-label" for="lookingForRoom">
                        I am looking for a room
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="userType" id="rentMyRoom" value="renting">
                    <label class="form-check-label" for="rentMyRoom">
                        I want to rent my room
                    </label>
                </div>
            </div>
            <?php
            if ($errorFlag) {
                echo '<div class="form-group">';
                echo '<p class="text-danger fw-bold">Invalid login information. Please try again!</p>';
                echo '</div>';
            }
            ?>


            <button type="submit" class="btn btn-primary btn-sm w-100">Login</button>

            <a href="Register.php">Register</a>

        </form>
    </div>
</body>
<!-- bs cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jquery cdn  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</html>