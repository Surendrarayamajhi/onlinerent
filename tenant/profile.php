<?php include '../global_backend/Helper.php' ?>
<?php

isUserLoggedIn();
isTenent();

$query = "SELECT * FROM `users` WHERE `u_id` = $logged_user_id";
$result = runQuery($query);
$row = mysqli_fetch_assoc($result);

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


    <div class="css-container ad-list mt-4 ">
        <div class="container" style="margin-top: 100px;min-height:100vh;">
            <h4>Your Profile</h4>
            <div class="table-responsive">
                <table class=" table table-secondary table-hover align-middle">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>
                                <span class="fs-2 text-primary">
                                    <?php echo $row['u_name']; ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?php echo $row['u_email']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Contact</th>
                            <td><?php echo $row['u_contact']; ?></td>
                        </tr>

                    </tbody>
                </table>
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


</html>