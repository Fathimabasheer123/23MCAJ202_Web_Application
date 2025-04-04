function validateForm() {
    //clear previous error messages
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    document.getElementById("nameError").style.display = "none";
    document.getElementById("emailError").style.display = "none";
    document.getElementById("passwordError").style.display = "none";


    var isValid = true;

    // Get the values from the form
    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Validate Name (required and only alphabets and spaces)
    var namePattern = /^[A-Za-z\s]+$/;
    if (name === "") {
        document.getElementById("nameError").innerHTML = "Name is required!";
        document.getElementById("nameError").style.display = "block";
        isValid = false;
    } else if (!namePattern.test(name)) {
        document.getElementById("nameError").innerHTML = "Name must contain only alphabets and spaces!";
        document.getElementById("nameError").style.display = "block";
        isValid = false;
    }

    // Validate Email (required and valid format)
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required!";
        document.getElementById("emailError").style.display = "block";
        isValid = false;
    } else if (!emailPattern.test(email)) {
        document.getElementById("emailError").innerHTML = "Please enter a valid email address!";
        document.getElementById("emailError").style.display = "block";
        isValid = false;
    }

    // Validate Password (required, min length 6 and max length 16)
    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Password is required!";
        document.getElementById("passwordError").style.display = "block";
        isValid = false;
    } else if (password.length < 6) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters long!";
        document.getElementById("passwordError").style.display = "block";
        isValid = false;
    } else if (password.length > 16) {
        document.getElementById("passwordError").innerHTML = "Password must not exceed 16 characters!";
        document.getElementById("passwordError").style.display = "block";
        isValid = false;
    }

    // If everything is valid, allow form submission
    return isValid;
}
