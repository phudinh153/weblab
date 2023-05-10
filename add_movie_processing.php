<?php
        // Get user input from form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $release = $_POST['release'];
        $poster = $_POST['poster'];
                // Connect to the database
              try{
               
                // // Connect to database
                $conn = new mysqli("localhost", "root", "", "movies");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
         
            

                
                    $sql = "INSERT INTO products (title, release_year, description, poster) VALUES ('$title', '$release', '$description', '$poster')";

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                  
                
                   
                  header("Location: ../index.php?page=products");
                    // Close database connection
                    $conn->close();
              }
              catch(Exception $e){
                echo "No database found";
              }
                
                mysqli_close($conn);
            ?>

<!-- <?php

// require_once('../config.php');

// // Get user input from form
// $name = $_POST['name'];
// $description = $_POST['description'];
// $type = $_POST['type'];
// $link = $_POST['link'];
// $price = $_POST['price'];

// // Connect to database
// $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Insert user input into database
// $sql = "INSERT INTO products (name, description, type, link, price) VALUES ('$name', '$description', '$type', '$link', '$price')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
// header("Location: ../index.php?page=products");
// // Close database connection
// $conn->close();

?> -->