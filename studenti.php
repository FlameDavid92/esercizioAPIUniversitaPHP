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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO studenti (matricola, nome, cognome, data_nascita, indirizzo)
            VALUES ({$_REQUEST['matricola']},{$_REQUEST['nome']}, {$_REQUEST['cognome']}, {$_REQUEST['data_nascita']}, {$_REQUEST['indirizzo']});";
    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM studenti";
    $result = $conn->query($sql);
    $json = [];

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($json, $row);
        }
    }
    echo json_encode($json);
}
$conn->close();
