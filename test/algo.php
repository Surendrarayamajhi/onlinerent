<?php include '../global_backend/Helper.php' ?>
<?php
// Database connection (Assuming you have a valid connection)

// Define a function to get property recommendations for a user based on their interests
function getPropertyRecommendations($user_id, $limit = 5)
{
    global $conn;

    // Get properties that the user has expressed interest in
    $interestedProperties = getInterestedProperties($user_id);

    if (!empty($interestedProperties)) {
        // Build a SQL query to recommend similar properties
        $query = "SELECT * FROM posts WHERE p_id IN (";
        $query .= implode(',', $interestedProperties);
        $query .= ")";

        // Exclude properties the user has already viewed or interacted with
        $excludedProperties = getExcludedProperties($user_id);
        if (!empty($excludedProperties)) {
            $query .= " AND p_id NOT IN (" . implode(',', $excludedProperties) . ")";
        }

        // Order by relevance (you can customize the ordering criteria)
        $query .= " ORDER BY p_price ASC LIMIT $limit";

        $result = mysqli_query($conn, $query);

        $recommendations = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $recommendations[] = $row;
            }
        }

        return $recommendations;
    } else {
        // If the user hasn't expressed interest in any properties, fall back to popular properties
        return getFallbackRecommendations($limit);
    }
}

// Define a function to get properties that the user has expressed interest in
function getInterestedProperties($user_id)
{
    global $conn;

    $interestedProperties = [];

    $query = "SELECT post_id FROM interested WHERE user_id = $user_id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $interestedProperties[] = $row['post_id'];
        }
    }

    return $interestedProperties;
}

// Define a function to get properties the user has already viewed or interacted with
function getExcludedProperties($user_id)
{
    global $conn;

    // You would implement this function to fetch and return the IDs of properties
    // that the user has already viewed or interacted with.
    // For simplicity, you can return hardcoded property IDs here.
    return [14, 15, 16]; // Example excluded property IDs
}

// Define a function to get fallback recommendations (e.g., popular properties)
function getFallbackRecommendations($limit)
{
    global $conn;

    // You can implement a strategy to recommend popular properties as fallback.
    // For example, you can order by the number of times a property has been viewed or marked as interested.
    $query = "SELECT * FROM posts ORDER BY views_count DESC, interested_count DESC LIMIT $limit";

    $result = mysqli_query($conn, $query);

    $fallbackRecommendations = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $fallbackRecommendations[] = $row;
        }
    }

    return $fallbackRecommendations;
}

// Usage example:
$user_id = 1; // Replace with the actual user ID
$recommendations = getPropertyRecommendations($user_id);

// Print the recommendations
echo "<pre>";
print_r($recommendations);
echo "</pre>";

// Now, $recommendations contains an array of recommended properties for the user.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Algo</h1>
</body>

</html>