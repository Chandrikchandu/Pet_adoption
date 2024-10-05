<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Applications</title>
        <style>
        .header-container {
            text-align: center; /* Center-align the content */
            margin-top: 50px; /* Adjust as needed */
        }
    </style>
    <!-- You can add your CSS link here -->
    <link rel="stylesheet" href="tables.css">
    </head>
    <body>
    <div class="header-container">
            <h1>Adoption Applications</h1>
    </div>


<!-- PHP code to handle form submission and database operations -->
<?php
    // Establish connection to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "chandrika71";
    $dbname = "pets";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
   
        // Function to print table data
    function printTable($header, $result)
    {
        global $conn;
        if ($result->num_rows > 0) {
            echo "<thead><tr><th colspan='10'>$header</th></tr></thead>";
            echo "<button onclick=\"window.location.href='Pets.html'\" style='position: absolute; top: 10px; left: 10px; padding: 10px 20px; background-color: #333; color: #fff; border: 1px solid #fff; cursor: pointer;'>Home</button>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Email</th><th>Phone</th><th>Address</th><th>Occupation</th><th>Pet_owner</th><th>et_type</th><th>breed</th><th>message</th>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["occupation"] . "</td>";
                echo "<td>" . $row["pet_owner"] . "</td>";
                echo "<td>" . $row["pet_type"] . "</td>";
                echo "<td>" . $row["breed"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<tr><td colspan='10'>No data found</td></tr>";
        }
    }
 
//fetch data from the 'adoption_applications' table
$sql_form_insertion = "SELECT * FROM form_insertion";
$result_form_insertion = $conn->query($sql_form_insertion);
printTable(" ", $result_form_insertion);

//close connection
$conn->close();
?>