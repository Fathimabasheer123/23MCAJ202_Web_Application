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

        <!-- table to display the players -->
        <table>
            <!-- Table headers -->
            <tr>
                <th>No:</th>  <!-- Table column for player number -->
                <th>Player Name</th> <!-- Table column for player name -->
            </tr>
        
    <?php
    // PHP code to define an array of cricket players
    $players = array(
        "Bhuvneshwar Kumar",
        "Hardik Pandya",   
        "Jasprit Bumrah",  
        "KL Rahul",  
        "MS Dhoni",  
        "Mohammad Shami",
        "Ravindra Jadeja",       
        "Rohit Sharma",        
        "Sachin Tendulkar",    
        "Virat Kohli"         
    );

    // Loop through the players array to display each player in the table
    foreach($players as $index => $player) {
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
