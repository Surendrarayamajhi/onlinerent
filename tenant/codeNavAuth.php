    <?php
    if (isSessionSet()) {

        echo '<ul class="navbar-nav mt-1">

                    <li class="nav-item dropdown">
                        <a class=" btn btn-outline-primary  btn-smdropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ' . $logged_user_name . '
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-md-end dropdown-menu-sm-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="Interested.php">My Interest</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="Logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>';
    } else {

        echo '<a href="Login.php"><button class="btn btn-primary  btn-login">Login</button></a>';
    }
    ?>

  