<?php include 'DB.php' ?>
<?php
error_reporting(0);
$logged_user_id = 0;
$logged_user_name = '';
$receiverId = 0;
session_start(); // Start the session
if (isset($_SESSION['user_id'])) {
    $logged_user_id = $_SESSION['user_id'];
    $logged_user_name = $_SESSION['user_name'];
    // echo '<h1>' . $logged_user_id . '</h1>';
    // echo '<h1>' . $_SESSION['u_type'] . '</h1>';
}


if (!function_exists('isUserLoggedIn')) {
    function isUserLoggedIn()
    {
        if (isset($_SESSION['user_id']) && isset($_SESSION['u_type'])) {
            // Both session variables are set
            return true;
        } else {
            // One or both session variables are not set
            return false;
        }
    }
}

function redirectToCurrentUser()
{
    if ($_SESSION['u_type'] == 'looking') {
        header("Location: ../tenant/home.php");
    } elseif ($_SESSION['u_type'] == 'renting') {
        header("Location: ../houseOwner/Posts.php");
    } elseif ($_SESSION['u_type'] == 'superadmin') {
        header("Location: ../superAdmin/Posts.php");
    }
}
function isSuperAdmin()
{
    if (isset($_SESSION['u_type']) &&  $_SESSION['u_type'] = "superadmin") {
        // User is superadmin
        return true;
    } else {
        // User is not an admin or session variable is not set
        header("Location: ../tenant/Login.php");
    }
}


if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if (isset($_SESSION['u_type']) && $_SESSION['u_type'] == 'renting') {
            // User is an admin
            return true;
        } else {
            // User is not an admin or session variable is not set
            header("Location: ../tenant/Login.php");
            exit(); // Add exit() to stop executing further code
        }
    }
}
if (!function_exists('isTenent')) {
    function isTenent()
    {

        if (isset($_SESSION['u_type']) && $_SESSION['u_type'] == 'looking') {
            // User is an admin
            return true;
        } else {
            // User is not an admin or session variable is not set
            header("Location: ../tenant/Login.php");
        }
    }
}





function isSessionSet()
{
    if (isset($_SESSION['user_id']) && $_SESSION['u_type'] == 'looking') {
        // Both session variables are set
        return true;
    } else {
        // One or both session variables are not set
        return false;
    }
}



function runQuery($query)
{
    global $conn;

    try {
        $res = mysqli_query($conn, $query);
        if ($res === false) {
            throw new Exception(mysqli_error($conn));
        }
        return $res;
    } catch (Exception $e) {
        if (mysqli_errno($conn) == 1062) {
            echo '<script>
            window.location.href = "../global_html/RegisterError.php";
          </script>';
        } else {
            echo 'Error: ' . $e->getMessage();
        }
        return false;
    }
}

//category
// $categoryLists = [
//     1 => 'Single Room',
//     2 => 'Two Room',
//     3 => 'Three Room',
//     4 => '1BHK',
//     5 => 'Flat'
// ];

// function getCategory($number)
// {
//   global $categoryLists;

//     if (isset($categoryLists[$number])) {
//         return $categoryLists[$number];
//     } else {
//         return 'Undefined';
//     }
// }

// Fetch data from the category table
$categorySql = "SELECT id, name, isActive FROM category";
$categoryResult = mysqli_query($conn, $categorySql);

// Create an associative array for category data
$categoryLists = [];
if ($categoryResult) {
    while ($row = mysqli_fetch_assoc($categoryResult)) {
        $categoryLists[$row['id']] = [
            'name' => $row['name'],
            'isActive' => $row['isActive']
        ];
    }
    mysqli_free_result($categoryResult);
} else {
    echo "Error fetching data: " . mysqli_error($conn);
}

// Define the getCategory function
function getCategory($number)
{
    global $categoryLists;

    if (isset($categoryLists[$number])) {
        return $categoryLists[$number]['name'];
    } else {
        return 'Undefined';
    }
}


$categoriesLength = count($categoryLists);

// City 
$cityLists = [];


$cityListsSql = "SELECT id, name, isActive FROM citylists";
$cityListsResult = mysqli_query($conn, $cityListsSql);

if ($cityListsResult) {
    while ($row = mysqli_fetch_assoc($cityListsResult)) {
        $cityLists[$row['id']] = [
            'name' => $row['name'],
            'isActive' => $row['isActive']
        ];
    }
    mysqli_free_result($cityListsResult);
} else {
    echo "Error fetching data: " . mysqli_error($conn);
}


// print_r($cityLists);
// function getCity($number)
// {
//     global $cityLists;

//     if (isset($cityLists[$number])) {
//         return $cityLists[$number];
//     } else {
//         return 'Undefined';
//     }
// }

function getCity($number)
{
    global $cityLists;

    if (isset($cityLists[$number])) {
        return $cityLists[$number]['name'];
    } else {
        return 'Undefined';
    }
}
function getActiveLabel($isActive)
{
    return $isActive ? 'Active' : 'Inactive';
}

$cityLength = count($cityLists);

//status
$statusLists = [

    0 => 'Rented',
    1 => 'Unrented'
];

function getStatus($number)
{
    global $statusLists;

    if (isset($statusLists[$number])) {
        return $statusLists[$number];
    } else {
        return 'Undefined';
    }
}




//approve
$approveLists = [
    0 => 'Pending',
    1 => 'Approved',
    2 => 'Disapproved'
];

function getApproveLists($number)
{
    global $approveLists;
    if (isset($approveLists[$number])) {
        return $approveLists[$number];
    } else {
        return 'Undefined';
    }
}


// check if interested 
function checkIfInterested($userId, $postId)
{
    $query = "SELECT COUNT(*) FROM interested WHERE user_id = $userId AND post_id = '$postId'";
    $res = runQuery($query);

    if ($res) {
        $row = mysqli_fetch_array($res);
        $count = $row[0];

        if ($count > 0) {
            return true; // The user is interested
        } else {
            return false; // The user is not interested
        }
    } else {
        return false; // Query execution failed
    }
}


//thumbnail image
function getFirstImage($postId)
{
    $query = "SELECT * FROM post_images WHERE post_id = $postId LIMIT 1";
    $imageResult = runQuery($query);
    $imageRow = mysqli_fetch_assoc($imageResult);
    $image = null;

    if ($imageRow) {
        $image = $imageRow['post_images'];
    }

    return $image;
}

function getUserIdFromPostId($postId)
{
    $query = "SELECT user_id FROM posts WHERE p_id = $postId";
    $result = runQuery($query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['user_id'];
    } else {
        return false; // Post ID not found or query failed
    }
}
function getUserName($user_id)
{


    $query = "SELECT u_name FROM users WHERE u_id = $user_id";
    $result = runQuery($query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['u_name'];
    } else {
        return 'Unknown'; // User ID not found or query failed
    }
}

function isAlreadyFetched($senderId)
{
    global $recentChatUsersList;
    if (in_array($senderId, $recentChatUsersList)) {
        return true;
    }
    array_push($recentChatUsersList, $senderId);
    return false;
}

function getOppositeChatUserId($loggedUserId, $receiverId, $sid)
{
    if ($loggedUserId == $receiverId) {
        return $sid;
    } else {
        return $receiverId;
    }
}



?>