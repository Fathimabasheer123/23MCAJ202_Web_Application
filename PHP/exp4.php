<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <!-- Linking the external css file -->
    <link rel="stylesheet" href="./exp4.css">
</head>
<body>
    <!-- Main heading -->
    <h1>Student's List</h1>
<?php
// Database credentials
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "Web_php"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the 'students' table
$sql = "SELECT student_id, full_name, date_of_birth, gender, email FROM students";
$result = $conn->query($sql);   // Executing the Query

// Check if there are any records
if ($result->num_rows > 0) {
    // Display data in a neat HTML table
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Student ID</th><th>Full Name</th><th>Date of Birth</th><th>Gender</th><th>Email</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_id'] . "</td>";
        echo "<td>" . $row['full_name'] . "</td>";
        echo "<td>" . $row['date_of_birth'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results found.";//Handling No Data
}

// Close the connection
$conn->close();
?>

</body>
</html>