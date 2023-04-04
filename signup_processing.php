<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_password']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $confirm_password = $_POST['confirm_password'];
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;

    // Validate password
  if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.$@$!%*?&])[A-Za-z\d.$@$!%*?&]{8,}$/', $password)) {
    $_SESSION['error'] = 'Password must have 8 letters and contain at least one lowercase letter, one uppercase letter, one number, and one special character.';
    header('Location: http://localhost/web/index.php?page=register');
    exit();
  }
  
  // Validate username
  if (preg_match('/[^a-zA-Z0-9]/', $username)) {
    $_SESSION['error'] = 'Username cannot contain special characters.';
    header('Location: http://localhost/web/index.php?page=register');
    exit();
  }
  
  // Check if passwords match
  if ($password !== $confirm_password) {
    $_SESSION['error'] = 'Passwords do not match.';
    header('Location: http://localhost/web/index.php?page=register');
    exit();
  }

  // Connect to the database
  $servername = "localhost";
  $password_db = "";
  $dbname = "movies";
  $conn = new mysqli($servername, "root", $password_db, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute SELECT statement to check for matching username or email
  $stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE username = ? OR email = ?");
  $stmt->bind_param("ss", $username, $email);
  $stmt->execute();
  
  // Fetch result from SELECT statement
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  // Check if count is 0 (i.e. username and email are unique) and return boolean value
  if ($row['count'] != 0){
    $_SESSION['error'] = 'Username or email is not unique!';
    header('Location: http://localhost/web/index.php?page=register');
    exit();
  }
  else{

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql_insert_users = "INSERT INTO users (username, email, password)
    VALUES ('$username', '$email', '$password_hashed')";
    //Execute SQL statement
    if ($conn->query($sql_insert_users) === TRUE) {
        echo 'Data inserted into users table successfully';
    } else {
        echo "Error inserting data into 'users' table: " . $conn->error . "<br>";
    }
    
    // Set success message and redirect to login page
    $_SESSION['loggedin'] = 1;
    $_SESSION['success'] = 'Registration successful!';
    setcookie('user', $email, time() + 3600, '/');
    header('Location: index.php');
    exit();
  }

}
?>
