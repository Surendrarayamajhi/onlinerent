
<?php include '../global_backend/Helper.php' ?>
<?php include 'Auth.php' ?>
<?php
if (isset($_GET['id']) && isset($_GET['postId'])) {
    $imgId = $_GET['id'];
    $postId = $_GET['postId'];
    // Perform your deletion logic here using the $imgId
    // For example, you can delete the image from the database or perform any other necessary actions
    // Make sure to sanitize and validate the $imgId before using it in your database query to prevent SQL injection

    // Example of deletion logic
    // Assuming you are using mysqli, you can execute a DELETE query like this:
    $query = "DELETE FROM post_images WHERE post_images_id = '$imgId'";

    // Execute the query
    // Replace $yourDbConnection with your actual database connection variable
    $result = runQuery($query);

    if ($result) {
        // Deletion successful
        // Redirect the user back to the same page with the $postId
        header("Location: PostEdit.php?id=$postId");
        exit();
    } else {
        // Deletion failed
        // Redirect the user back to the same page with an error message
        header("Location: YourPage.php?id=$postId&error=1");
        exit();
    }
} else {
    // Invalid request, redirect the user back to the same page with an error message
    header("Location: YourPage.php?error=1");
    exit();
}
?>

