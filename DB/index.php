<?php
// Include the database connection
$servername = "localhost"; // Host for MySQL server
$username = "root";        // Username for MySQL
$password = "";            // Password for MySQL (empty in this case)
$dbname = "library_php";   // Database name to connect to

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Exit if connection fails
}

// Handle adding a book to the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accession_number'])) {
    // Collect data from the form input
    $accession_number = $_POST['accession_number'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    // Insert the collected data into the books table in the database
    $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher)
            VALUES ('$accession_number', '$title', '$authors', '$edition', '$publisher')";

    // Execute the SQL query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "New book record created successfully."; // Success message
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Display error message in case of failure
    }
}

// Handle searching for books by title
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['title'])) {
    $title = $_GET['title']; // Get the search query from the form
    // SQL query to search for books with titles that match the search term
    $sql = "SELECT * FROM books WHERE title LIKE '%$title%'";
    $result = $conn->query($sql); // Execute the query

    // Check if any results were returned
    if ($result->num_rows > 0) {
        // Display the results in an HTML table
        echo "<h2>Search Results:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Accession Number</th>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Edition</th>
                    <th>Publisher</th>
                </tr>";
        while($row = $result->fetch_assoc()) { // Loop through the results
            echo "<tr>
                    <td>" . $row["accession_number"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["authors"] . "</td>
                    <td>" . $row["edition"] . "</td>
                    <td>" . $row["publisher"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found for '$title'."; // Message if no books were found
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <!-- linking the External CSS file -->
     <link rel="stylesheet" href="./index.css">
</head>
<body>
    <!-- Form for adding a new book -->
    <h1>Enter Book Information</h1>
    <form action="" method="POST">
        <label for="accession_number">Accession Number:</label><br>
        <input type="text" id="accession_number" name="accession_number" required><br><br>

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="authors">Authors:</label><br>
        <input type="text" id="authors" name="authors" required><br><br>

        <label for="edition">Edition:</label><br>
        <input type="text" id="edition" name="edition" required><br><br>

        <label for="publisher">Publisher:</label><br>
        <input type="text" id="publisher" name="publisher" required><br><br>

        <input type="submit" value="Add Book"> <!-- Submit button to add the book -->
    </form>

    <hr>

    <!-- Form for searching books by title -->
    <h1>Search for a Book</h1>
    <form action="" method="GET">
        <label for="title">Book Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <input type="submit" value="Search"> <!-- Submit button to search for books -->
    </form>
</body>
</html>
