<?php include '../global_backend/Helper.php' ?>
<?php
// Initialize an array to store the dates
$datesArray = [];

// GET
// the current date and time
date_default_timezone_set('Asia/Kathmandu');

$date = date('Y-m-d H:i:s');
echo 'Current Date' .   $date . '<br>';
$datesArray[] = $date;

print_r($datesArray);
echo '<br/>';


//GET for last 7 days START
$sql = "SELECT * FROM users WHERE u_created_at > '2023-09-21' AND u_created_at < '$date'";
$result = mysqli_query($conn, $sql);
$row_count = mysqli_num_rows($result);
echo 'Row ' . $row_count;
echo '<br/>';

//END

// Loop to get dates with time set to 12:00:00 AM and push them to the array
for ($i = 1; $i <= 8; $i++) {
    // Calculate the date 7 days before the current date
    $date = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($date)));
    // Push the date to the array
    $datesArray[] = $date;
    echo $date . '<br>';
}

// Output the array
echo '<h1>printr</h1> <br/>';
print_r($datesArray);
echo '<h1>printr</h1> <br/>';

//rowsGroup
// Initialize an array to store the results
$rowsGroup = [];

// Loop through the $datesArray
for ($i = 1; $i < count($datesArray); $i++) {
    echo "<br/> Start " . $startDate = $datesArray[$i - 1];
    echo "<br/> End " .  $endDate = $datesArray[$i];

    //new START
    $sql = "SELECT * FROM users WHERE u_created_at > '$endDate' AND u_created_at < '$startDate'";
    $result = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($result);
    echo '<br/> Row ' . $row_count;
    echo '<br/>';
    //new END

    // Add the row count to the $rowsGroup array
    $rowsGroup[] = $row_count;
}

// Close the database connection
mysqli_close($conn);

// Print the resulting array
echo '<br/><h2>Rows</h2>';
// print_r($rowsGroup);

// Print the resulting array
echo '<pre>';
print_r($rowsGroup);
echo '<pre/>';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            /* background-color: green;
            color: white; */
        }
    </style>
</head>

<body>
    <h1>Document</h1>
    <div style="width: 100%;height:400px;">
        <canvas id="myLineChart"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // PHP-generated array converted to JavaScript
        var datesArray = <?php echo json_encode($datesArray); ?>;
        var rowsUsers = <?php echo json_encode($rowsGroup); ?>;

        console.log(datesArray.length, rowsUsers.length);
        // Print the array elements using console.log
        for (var i = 0; i < datesArray.length; i++) {
            console.log(datesArray[i]);
            console.log(rowsUsers[i]);
            console.log(' ');
        }

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