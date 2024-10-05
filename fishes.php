<?php
// Database configuration
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = "chandrika71"; // Change this to your database password
$dbname = "pets"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
echo '<link rel="stylesheet" type="text/css" href="tables.css">';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_fishes = "SELECT * FROM fishes";
$result_fishes = $conn->query($sql_fishes);
if ($result_fishes->num_rows > 0) {
    echo "<h1 style='text-align: center;'>FISHES</h1>";
    echo "<button onclick=\"window.location.href='Pets.html'\" style='position: absolute; top: 10px; left: 10px; padding: 10px 20px; background-color: #333; color: #fff; border: 1px solid #fff; cursor: pointer;'>Home</button>";
    echo "<button onclick=\"window.location.href='adoptform1.html'\" style='position: absolute; top: 10px; right: 10px; padding: 10px 20px; background-color: #333; color: #fff; border: 1px solid #fff; cursor: pointer;'>Buy</button>";
    echo "<table border='3'>";
    echo "<tr><th>ID</th><th>Breed</th><th>Lifespan</th><th>Number of Fishes</th><th>Price</th><th>Image</th></tr>";
    $id = 1; // Initialize ID
    while ($row = $result_fishes->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $id++ . "</td>"; // Increment ID for each row
        echo "<td>" . $row["breed"] . "</td>";
        echo "<td>" . $row["lifespan"] . "</td>";
        echo "<td>" . $row["no_of_fishes"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td><img src='" . $row["image_url"] . "' alt='Fish Image' width='100'></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>