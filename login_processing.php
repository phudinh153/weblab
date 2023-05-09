<?php
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['email'] = $email;
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "movies";
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to retrieve the user's hashed password
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists in the database
    if ($result->num_rows == 1) {
        // Fetch the hashed password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables and redirect to dashboard
            
            $_SESSION['loggedin'] = 1;
            $_SESSION['success'] = 'Login successfully!';
            setcookie('user', $email, time() + 3600, '/');
            // Retrieve user level from the database and set it in session variable if necessary
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect, show error message
            $_SESSION['error'] = "Incorrect password";
            header("Location: ./index.php?page=login");
            exit();
        }
    } else {
        // User does not exist in the database, show error message
        $_SESSION['error'] = "Incorrect email";
        header("Location: ./index.php?page=login");
        exit();
    }
    

}
?>
