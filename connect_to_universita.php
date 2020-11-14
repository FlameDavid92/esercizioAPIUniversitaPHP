<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db_name = "universita";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br><br>";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo 'post';
}else{
    $sql = "SELECT * FROM studenti";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " " . $row["cognome"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>