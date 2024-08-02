<?php


$conn = mysqli_connect("localhost", "root", "", "myrent_db");

if ($conn) {
    // echo "Success DB Connection!";
} else {
    echo die("Failed") . mysqli_connect_error();
}


$cityLists = [
    1 => 'Itahari',
    2 => 'Dharan',
    3 => 'Biratnager',
    4 => 'Kathmandu',
    5 => 'Biratchok'
];

$conn = mysqli_connect("localhost", "root", "", "myrent_db");

if (!$conn) {
    die("Failed: " . mysqli_connect_error());
}

foreach ($cityLists as $cid => $name) {
    $sql = "INSERT INTO cityLists (cid, name) VALUES ($cid, '$name')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully for $name<br>";
    } else {
        echo "Error inserting record for $name: " . mysqli_error($conn) . "<br>";
    }
}

mysqli_close($conn);
