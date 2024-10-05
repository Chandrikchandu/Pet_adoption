<?php
// Database configuration
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = "chandrika71"; // Change this to your database password
$dbname = "pets"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo '<link rel="stylesheet" type="text/css" href="tables.css">';

// Function to print data in a table
function printTable($title, $result) {
    if ($result->num_rows > 0) {
        echo "<h1 style='text-align: center;'>$title</h1>";
        echo "<button onclick=\"window.location.href='Pets.html'\" style='position: absolute; top: 10px; left: 10px; padding: 10px 20px; background-color: #333; color: #fff; border: 1px solid #fff; cursor: pointer;'>Home</button>";
        echo "<button onclick=\"window.location.href='adoptform1.html'\" style='position: absolute; top: 10px; right: 10px; padding: 10px 20px; background-color: #333; color: #fff; border: 1px solid #fff; cursor: pointer;'>Buy</button>";
        echo "<table border='3'>";
        echo "<tr><th>ID</th><th>Name</th><th>Breed</th><th>Age</th><th>Gender</th><th>Price</th><th>Image</th></tr>";
        $id = 1; // Initialize ID
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $id++ . "</td>"; // Increment ID for each row
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["breed"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td><img src='" . $row["image_url"] . "' alt='" . $row["name"] . "' width='100'></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
// Fetch data from the 'birds' table
$sql_birds = "SELECT * FROM birds";
$result_birds = $conn->query($sql_birds);
printTable("BIRDS", $result_birds);

$conn->close();
?>
