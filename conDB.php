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

// $sql = "CREATE DATABASE Movies";
// if( $conn->query($sql) == TRUE){
//     echo "Database created succesfully";
// }
// else {
//     echo "Error creating db: " . $conn->error;
// }

// sql to creat table
// $sql = "CREATE TABLE films (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(100) NOT NULL,
//     release_year INT(4) NOT NULL,
//     poster LONGBLOB NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";
  
// if($conn->query($sql) === TRUE){
//     echo "Films table created";
// }
// else {
//     echo "Error creating table" . $conn->error;
// }
// read image file into memory
$image = file_get_contents('https://img.cdn.vncdn.io/cinema/img/80187507856383526-co-gi-moi-o-phim-zombie-dau-tien-tai-viet-nam-lost-in-mekong-delta-9dd-6275603.png');

// prepare SQL statement with a parameter for the image data
$stmt = $conn->prepare("INSERT INTO films (title, release_year, poster) VALUES (?, ?, ?)");
$stmt->bind_param('sis', $title, $release_year, $image);

// set parameters and execute the statement
$title = "Lost In Mekong Delta";
$release_year = 2022;
$stmt->execute();
if($stmt->affected_rows > 0){
    echo "Film record created successfully.";
} else {
    echo "Error creating film record: " . $conn->error;
}


?>