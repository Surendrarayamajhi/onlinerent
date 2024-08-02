<?php include '../global_backend/Helper.php' ?>
<?php
if (isset($_POST['btnRegister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password1 = $_POST['inputPassword1'];
    $password2 = $_POST['inputPassword2'];

    // Now you can use these variables for further processing, such as storing them in a database or performing validation.

    // Example: Displaying the values
    // echo "Name: " . $name . "<br>";
    // echo "Email: " . $email . "<br>";
    // echo "Contact: " . $contact . "<br>";
    // echo "Password: " . $password1 . "<br>";
    // echo "Confirm Password: " . $password2 . "<br>";

    $query = "INSERT INTO users (u_name, u_email, u_password,u_contact)
              VALUES ('$name', '$email', '$password1','$contact')";
    $result = runQuery($query);
    // Run the query
    if ($result === true) {
        // Data inserted successfully
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("successModal").style.display = "block";
            });

           
          </script>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            .container {
                padding-top: 20px;
            }

            form {
                width: 100% !important;
            }
        }
    </style>
</head>

<body>

    <!-- model START  -->
    <div id="successModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registration Successful</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your registration was successful. Lets <span class="text-success"><a href="Login.php">login</a></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- model END  -->
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



                    </ul>
                    <div class="d-flex gap-3 ">
                        <!-- <button class="btn btn-outline-light nav-link hover-text-black">Add Property</button> -->
                        <!-- <button class="btn  btn-login">Login</button> -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container d-flex align-items-center flex-column justify-content-center  min-vh-100 ">

        <form class="border d-flex flex-column gap-3 p-4 shadow mt-2 bg-light rounded" action="" method="POST" onsubmit="return validateForm()">
            <h5 class=" text-center">Register to <span class="text-primary">OnlineRent</span></h5>
            <div class="form-row d-flex flex-column gap-3 ">
                <div class="form-group col-md-12">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control form-control-sm" id="inputName" placeholder="Name" name="name" required value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control form-control-sm" id="inputEmail" placeholder="Email" name="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                </div>
                <div class="form-group">
                <div class="form-group">
    <label for="inputContact">Contact</label>
    <input type="number" class="form-control form-control-sm" id="inputContact" placeholder="98..." name="contact" required value="<?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : ''; ?>" oninput="maximumno(this)">

    <p id="contactError" class="text-danger mb-0" style="display: none;"> </p>
</div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control form-control-sm" id="inputPassword1" placeholder="Password" name="inputPassword1">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Confirm Password</label>
                    <input type="password" class="form-control form-control-sm" id="inputPassword2" placeholder="Confirm Password" name="inputPassword2">
                    <p id="passwordError" class="text-danger mb-0" style="display: none;"> </p>
                </div>
            </div>


            <button type="submit" class="btn btn-primary btn-sm w-100" name="btnRegister">Register</button>

            <a href="Login.php">Login</a>
            <!-- <a href="../global_html/RegisterError.php">Login</a> -->
        </form>
        <script>
function maximumno(input) {
    let value = input.value;
    if (value.length > 10) {
        input.value = value.slice(0, 10);
    }
}
</script>
    </div>
</body>
<!-- bs cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jquery cdn  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function validateForm() {
        // Retrieve the password and confirm password fields
        var password1 = document.getElementById("inputPassword1").value;
        var password2 = document.getElementById("inputPassword2").value;
        var passwordError = document.getElementById("passwordError");
        var isValid = true;
        var contact = document.getElementById("inputContact").value;
        var contactError = document.getElementById("contactError");
        // Perform validation
        if (contact.length < 10) {
            isValid = false;
            contactError.innerHTML = "Contact number must be at least 10 characters";
            contactError.style.display = "block"; // Show the error message
        }
        if (password1 !== password2) {
            isValid = false;
            passwordError.innerHTML = "Passwords do not match!";
            passwordError.style.display = "block";

        } else if (password1.length < 8) {
            isValid = false;
            passwordError.innerHTML = "Password must be at least 8 characters";
            passwordError.style.display = "block";

        }
        if (isValid) {
            return true;
        } else {
            return false; // Allow form submission
        }

    }

    function closeModal() {
        document.getElementById("successModal").style.display = "none";
    }
</script>

</html>