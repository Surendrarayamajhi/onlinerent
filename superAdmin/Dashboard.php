<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>

<?php
//for no of registers
$query = "SELECT * FROM posts";
$r = runQuery($query);
$postsNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 1";
$r = runQuery($query);
$approvedNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 0";
$r = runQuery($query);
$pendingNo  = mysqli_num_rows($r);

$query = "SELECT * FROM posts where is_approved = 2";
$r = runQuery($query);
$disapprovedNo  = mysqli_num_rows($r);




$query = "SELECT * FROM citylists where isActive = 1";
$r = runQuery($query);
$cityRows  = mysqli_num_rows($r);

$query = "SELECT * FROM category where isActive = 1";
$r = runQuery($query);
$categoryRows  = mysqli_num_rows($r);

$query = "SELECT * FROM users";
$r = runQuery($query);
$usersRows  = mysqli_num_rows($r);


$query = "SELECT * FROM interested";
$r = runQuery($query);
$interestedRows  = mysqli_num_rows($r);



//for line chart
// Initialize an array to store the dates
$datesArray = [];

// GET
date_default_timezone_set('Asia/Kathmandu');
// the current date and time
$date = date('Y-m-d H:i:s');
// echo 'Current Date' .   $date . '<br>';
$datesArray[] = $date;

// print_r($datesArray);
// echo '<br/>';


//GET for last 7 days START
// $sql = "SELECT * FROM users WHERE u_created_at > '2023-09-21' AND u_created_at < '2023-09-28'";
// $result = mysqli_query($conn, $sql);
// $row_count = mysqli_num_rows($result);
// echo 'Row ' . $row_count;
// echo '<br/>';

//END



// Loop to get dates with time set to 12:00:00 AM and push them to the array
for ($i = 1; $i <= 8; $i++) {
    // Calculate the date 7 days before the current date
    $date = date('Y-m-d', strtotime('-7 days', strtotime($date)));
    // Push the date to the array
    $datesArray[] = $date;
}

// Output the array
// echo '<h1>printr</h1> <br/>';
// print_r($datesArray);
// echo '<h1>printr</h1> <br/>';

//rowsGroup
// Initialize an array to store the results
$rowsGroup = [];
// $rowsGroup[] = 0;

// Loop through the $datesArray
// echo 'DA ' . count($datesArray) . '<br/>';	
// echo '<h1>FOR START</h1> <br/>'	;
for ($i = 1; $i <= count($datesArray); $i++) {

    $startDate = $datesArray[$i - 1];
    $endDate = $datesArray[$i];

    //new START
    $sql = "SELECT * FROM users WHERE u_created_at > '$endDate' AND u_created_at < '$startDate'";
    $result = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($result);

    //new END

    // Add the row count to the $rowsGroup array
    $rowsGroup[] = $row_count;
}
// echo '<h1>FOR END</h1> <br/>';
//                             echo 'ROWS ' . count($datesArray) . '<br/>';	
// Close the database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- animate  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <link rel="stylesheet" href="./style/style.css" />
    <title>OnlineRent Admin</title>
    <style>
        .block {
            display: flex;

        }

        .iconBox {
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
                <a href="#">
                    <img width="30" src="assets/avatar.svg" alt="" />
                    <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                </a>
            </div>
        </nav>

        <main class="px-3 py-3">

            <div class="block block1  animate__animated animate__fadeIn animate__slow">
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

            <div class="block block1 animate__animated animate__fadeIn animate__slower">
                <div class="statusBox">
                    <div class="iconBox success">
                        <i class="fas fa-city fa-3x"></i>


                    </div>
                    <div class="infoBox">
                        <p class="mb-0">Cities</p>
                        <h1><?php echo $cityRows; ?></h1>
                    </div>

                </div>
                <div class="statusBox ">
                    <div class="iconBox warning">

                        <i class="fa-solid fa-sitemap fa-3x"></i>


                    </div>
                    <div class="infoBox">
                        <p class="mb-0">Categories</p>
                        <h1><?php echo $categoryRows; ?></h1>
                    </div>
                </div>

                <div class="statusBox">
                    <div class="iconBox joy">
                        <i class="fas fa-user fa-3x"></i>



                    </div>
                    <div class="infoBox">
                        <p class="mb-0">Users</p>
                        <h1><?php echo $usersRows; ?></h1>
                    </div>
                </div>

                <div class="statusBox">
                    <div class="iconBox joy">
                        <i class="fa-solid fa-bookmark fa-3x"></i>

                    </div>
                    <div class="infoBox">
                        <p class="mb-0">Marked Interested</p>
                        <h1><?php echo $interestedRows; ?></h1>
                    </div>
                </div>

            </div>

            <!-- <div class="block block1">
                <div class="statusBox">
                    <div class="iconBox success"><i class="fa-solid fa-dollar-sign fa-3x"></i></div>
                    <div class="infoBox">
                        <p class="mb-0">Sales</p>
                        <h1>Rs. 2420</h1>
                    </div>

                </div>
                <div class="statusBox ">
                    <div class="iconBox warning"><i class="fa-solid fa-cart-arrow-down fa-3x"></i></div>
                    <div class="infoBox">
                        <p class="mb-0">Sales</p>
                        <h1>3</h1>
                    </div>
                </div>

                <div class="statusBox">
                    <div class="iconBox joy"><i class="fa-solid fa-house-chimney-user fa-3x"></i></div>
                    <div class="infoBox">
                        <p class="mb-0">Sales</p>
                        <h1>2</h1>
                    </div>
                </div>

                <div class="statusBox">
                    <div class="iconBox joy"><i class="fa-solid fa-house-chimney-user fa-3x"></i></div>
                    <div class="infoBox">
                        <p class="mb-0">Sales</p>
                        <h1>2</h1>
                    </div>
                </div>

            </div> -->

            <div class="row my-row mt-4">
                <div class="col-sm-12 col-md-6 col-lg-8 p-2">
                    <div class="item d-flex align-item-center shadow p-2" style=" height:100%;">
                        <div style="width: 100%;">
                            <canvas id="myLineChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                    <div class="item shadow p-2">
                        <!-- <p class="fs-4 text-center mt-4">Posts status</p> -->
                        <div class="w-100 d-flex justify-content-center">
                            <div class="pie-wrap">
                                <canvas id="chart-pie"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </main>

        <div id="sidebar">
            <div class="sidebar__title">

                <div class="sidebar__img ">
                     
                    <h1 style="margin-right: 20px;">OnlineRent-SuperAdmin</h1>
                </div>
                <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link active_menu_link">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <a href="Dashboard.php">Dashboard</a>
                </div>
                <!-- <h2>MNG</h2> -->
                <!-- <div class="sidebar__link">
                    <i class="fa-solid fa-plus"></i>
                    <a href="PostAdd.php">Add Post</a>
                </div> -->
                <div class="sidebar__link">
                    <i class="fa-solid fa-list-ul"></i>
                    <a href="Posts.php">Posts</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-city"></i>
                    <a href="City.php">Cities</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-sitemap"></i>
                    <a href="Category.php">Category</a>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./js/script.js"></script>
    <script>
        // Get the canvas element
        const canvas = document.getElementById('chart-pie');

        // Define the gradient background color
        const colors = ['#EC6B56', '#FFC154', '#00b4ff'];
        // Create the chart
        const ctx = canvas.getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Disapproved', 'Pending', 'Approved'],
                datasets: [{
                    data: [
                        <?php echo $disapprovedNo; ?>,
                        <?php echo $pendingNo; ?>,
                        <?php echo $approvedNo; ?>
                    ],
                    backgroundColor: colors
                }]
            },
            options: {
                responsive: true
            }
        });


        //Line chart
        var labels = (<?php echo json_encode($datesArray); ?>).reverse();
        var usersData = (<?php echo json_encode($rowsGroup); ?>).reverse();

        console.log(labels, usersData);
        // console.log(usersData);
        console.log('');
        var data = {
            labels: labels,
            datasets: [{
                label: 'New Registered Users (Last 8 Weeks)',
                data: usersData,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                pointBorderColor: '#fff',
                pointRadius: 5,
                borderWidth: 2
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Last 8 Weeks'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'New Users'
                    }
                }
            }
        };

        var chartLine = document.getElementById('myLineChart').getContext('2d');
        var myLineChart = new Chart(chartLine, {
            type: 'line',
            data: data,
            options: options
        });
    </script>


</body>


</html>