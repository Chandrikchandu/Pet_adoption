<?php
    // Establish connection to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "chandrika71";
    $dbname = "pets";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $conn->real_escape_string($_POST['name']);
        $age = $conn->real_escape_string($_POST['age']);
        $gender = $conn->real_escape_string($_POST['gender']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $address = $conn->real_escape_string($_POST['address']);
        $occupation = $conn->real_escape_string($_POST['occupation']);
        $pet_owner = $conn->real_escape_string($_POST['pet_owner']);
        $pet_type = $conn->real_escape_string($_POST['pet_type']);
        $breed = $conn->real_escape_string($_POST['breed']);
        $message = $conn->real_escape_string($_POST['message']);
        
        // Prepare SQL statement to insert data into table
        $sql = "INSERT INTO form_insertion (name, age, gender, email, phone, address, occupation, pet_owner, pet_type, breed, message) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address', '$occupation', '$pet_owner', '$pet_type', '$breed', '$message')"; 

        if ($conn->query($sql) === TRUE) {
            // Display success message
            echo "<script>
                    document.getElementById('submitMessage').innerHTML = 'Application Submitted Successfully!';
                    document.getElementById('submitMessage').style.color = 'green';
                  </script>";
        } else {
            // Display error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
