<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket players List</title>

    <!-- Linking the external CSS file (cricket.css)-->
    <link rel="stylesheet" href="./cricket.css">
</head>

<body>
    <!-- Main container div that holds the content -->
    <div class="container">
        <!-- Heading for the table -->
        <h1>INDIAN CRICKET PLAYERS</h1>

        <!-- Form to input player name -->
        <form method="POST">
            <label for="pname">Add Player Name:</label>
            <input type="text" id="pname" name="pname" required>
            <button type="submit" name="submit">Add Player</button>
        </form>

        <!-- table to display the players -->
        <table>
            <!-- Table headers -->
            <tr>
                <th>No:</th> <!-- Table column for player number -->
                <th>Player Name</th> <!-- Table column for player name -->
            </tr>

            <?php
            // Start the session to store players' data
            session_start();

            // Initialize the players array in the session if it doesn't exist
            if (!isset($_SESSION['players'])) {
                $_SESSION['players'] = [];  // If not, create an empty array for storing players
            }
            // If the form is submitted, add the new player to the array
            if (isset($_POST['submit']) && !empty($_POST['pname'])) {
                $newPlayer = htmlspecialchars($_POST['pname']); // sanitize input
                $_SESSION['players'][] = $newPlayer; // Store new player in the session
            }

            // Loop through the players array to display each player in the table
            foreach ($_SESSION['players'] as $index => $player) {
                // Output each player's number and name inside table rows
                echo "<tr>
                <td>" . ($index + 1) . "</td>   <!-- Player number (index + 1) -->
                <td>" . $player . "</td>        <!-- Player name -->
              </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>