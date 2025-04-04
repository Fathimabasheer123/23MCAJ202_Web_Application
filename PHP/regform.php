<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Details</title>
    <!-- Linking the external CSS file -->
    <link rel="stylesheet" href="./regform.css">
</head>
<body>

<?php
// Initialize variables for form input and error messages
$fname = $email = $pname = $password = "";
$errors = array();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign form inputs to variables
    $fname = test_input($_POST["fname"]);
    $email = test_input($_POST["email"]);
    $pname = test_input($_POST["pname"]);
    $password = test_input($_POST["password"]);

    // Form Validation
    // Full Name validation
    if (empty($fname)) {
        $errors['name_err'] = "Full Name is required";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $fname)) {
        $errors['name_err'] = "Only letters and spaces are allowed";
    }

    // Email validation
    if (empty($email)) {
        $errors['email_err'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_err'] = "Invalid email format";
    }

    // Phone number validation
    if (empty($pname)) {
        $errors['phone_err'] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $pname)) {
        $errors['phone_err'] = "Phone number must be exactly 10 digits";
    }

    // Password validation
    if (empty($password)) {
        $errors['pass_err'] = "Password is required";
    } elseif (strlen($password) < 6 || strlen($password) > 16) {
        $errors['pass_err'] = "Password must be between 6 and 16 characters";
    }

    // If no errors, process form
    if (empty($errors)) {
        echo "<h2>Your Input:</h2>";
        echo "Full Name: " . $fname . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Contact Number: " . $pname . "<br>";
        echo "Password: [Password entered successfully]<br>";  // Avoid displaying actual password
    }
}

// Sanitize inputs function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- Registration form container -->
<div class="container">
    <form action="" method="POST">
        <h2>Registration Form</h2>

        <!-- Full Name input field -->
        <div class="input-control">
            <label for="fname">Full Name:</label><br>
            <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required><br><br>
            <div id="nameError" class="error" style="<?php echo isset($errors['name_err']) ? 'display:block;' : 'display:none;'; ?>">
                <?php echo isset($errors['name_err']) ? $errors['name_err'] : ''; ?>
            </div>
        </div>

        <!-- Email input field -->
        <div class="input-control">
            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            <div id="emailError" class="error" style="<?php echo isset($errors['email_err']) ? 'display:block;' : 'display:none;'; ?>">
                <?php echo isset($errors['email_err']) ? $errors['email_err'] : ''; ?>
            </div>
        </div>

        <!-- Phone Number input field -->
        <div class="input-control">
            <label for="pname">Contact Number:</label>
            <input type="tel" id="pname" name="pname" value="<?php echo $pname; ?>" placeholder="XXX-XXX-XXXX"><br><br>
            <div id="phoneError" class="error" style="<?php echo isset($errors['phone_err']) ? 'display:block;' : 'display:none;'; ?>">
                <?php echo isset($errors['phone_err']) ? $errors['phone_err'] : ''; ?>
            </div>
        </div>

        <!-- Password input field -->
        <div class="input-control">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br><br>
            <div id="passwordError" class="error" style="<?php echo isset($errors['pass_err']) ? 'display:block;' : 'display:none;'; ?>">
                <?php echo isset($errors['pass_err']) ? $errors['pass_err'] : ''; ?>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
