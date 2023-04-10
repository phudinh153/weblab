<?php

// Get the search query from the GET request
$searchQuery = $_GET['query'];

// Create a new mysqli connection
$mysqli = new mysqli("localhost", "root", "", "movies");

// Check if the connection was successful
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

// Prepare the SQL statement with a parameterized query to prevent SQL injection attacks
$sql = "SELECT * FROM films WHERE title LIKE ?";
$stmt = $mysqli->prepare($sql);
$searchValue = "%" . $searchQuery . "%";
$stmt->bind_param("s", $searchValue);

// Execute the SQL statement and fetch the results
$stmt->execute();
$result = $stmt->get_result();

// Create an XML document
$xmlDoc = new DOMDocument('1.0', 'utf-8');
$xmlRoot = $xmlDoc->createElement('movies');
$xmlDoc->appendChild($xmlRoot);

// Loop through the results and add each movie to the XML document
while ($row = $result->fetch_assoc()) {
  $xmlMovie = $xmlDoc->createElement('movie');
  $xmlRoot->appendChild($xmlMovie);
  
  $xmlTitle = $xmlDoc->createElement('title');
  $xmlTitle->appendChild($xmlDoc->createTextNode($row['title']));
  $xmlMovie->appendChild($xmlTitle);
  
  $xmlId = $xmlDoc->createElement('id');
  $xmlId->appendChild($xmlDoc->createTextNode($row['id']));
  $xmlMovie->appendChild($xmlId);
}

// Close the database connection
$mysqli->close();

// Return the XML document
header('Content-Type: application/xml');
echo $xmlDoc->saveXML();
?>
