<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="./students.css">
</head>

<body>
    <div class="container">
        <?php
        // Store student names in an array
        $students = array("Anu", "Aleena", "Adithyan", "Sandra", "Sajana", "Jane", "Bob");

        // Display the original list of students
        echo "<h2>Students List:</h2>";
        echo "<ul>";
        foreach ($students as $student) {
            echo "<li>$student</li>";
        }
        echo "</ul>";

        // Check if the form has been submitted for sorting
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if the sort option is set
            if (isset($_POST['sorts'])) {
                if ($_POST['sorts'] == "asc") {
                    asort($students);  // Sort in ascending order
                } elseif ($_POST['sorts'] == "desc") {
                    arsort($students);  // Sort in descending order
                }

                // Display the sorted students list
                echo "<h2>Sorted Students List:</h2>";
                echo "<ul>";
                foreach ($students as $student) {
                    echo "<li>$student</li>";
                }
                echo "</ul>";
            }
        }
        ?>

        <!-- Sorting form with a dropdown and button -->
        <form method="post" action="">
            <label for="sorts">Choose Sort Order: </label>
            <select id="sorts" name="sorts">
                <option value="asc">Ascending Order</option>
                <option value="desc">Descending Order</option>
            </select>
            <button type="submit">Sort</button>
        </form>
    </div>
</body>

</html>
