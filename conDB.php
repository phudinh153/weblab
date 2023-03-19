<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error){
    die("Connected failed: " . $conn->connect_error);
}
echo "Connected successfully";

//create db movies
// $sql = "CREATE DATABASE Movies";
// if( $conn->query($sql) == TRUE){
//     echo "Database created successfully";
// }
// else {
//     echo "Error creating db: " . $conn->error;
// }

// sql to create table
$sql = "CREATE TABLE films (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    release_year INT(4) NOT NULL,
    poster VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";


$sql_users = "CREATE TABLE users (
    userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
  
if($conn->query($sql) === TRUE){
    echo "Films table created";
}
else {
    echo "Error creating films table" . $conn->error;
}
if($conn->query($sql_users) === TRUE){
    echo "Users table created";
}
else {
    echo "Error creating users table" . $conn->error;
}
// read image file into memory
$image = 'https://img.cdn.vncdn.io/cinema/img/80187507856383526-co-gi-moi-o-phim-zombie-dau-tien-tai-viet-nam-lost-in-mekong-delta-9dd-6275603.png';

//prepare SQL statement with a parameter for the image data
$stmt = $conn->prepare("INSERT INTO films (title, release_year, poster) VALUES (?, ?, ?)");
$stmt->bind_param('sis', $title, $release_year, $image);

//set parameters and execute the statement
$title = "Lost In Mekong Delta";
$release_year = 2022;
$stmt->execute();
if($stmt->affected_rows > 0){
    echo "Film record created successfully.";
} else {
    echo "Error creating film record: " . $conn->error;
}

//SQL statement to insert data into users table
$password_hash = password_hash('12345678', PASSWORD_DEFAULT);
$sql_insert_users = "INSERT INTO users (username, password)
VALUES ('user1@gmail.com', '$password_hash'),
       ('user2@gmail.com', '$password_hash')";

//Execute SQL statement
if ($conn->query($sql_insert_users) === TRUE) {
    echo "Data inserted into 'users' table successfully<br>";
} else {
    echo "Error inserting data into 'users' table: " . $conn->error . "<br>";
}

?>