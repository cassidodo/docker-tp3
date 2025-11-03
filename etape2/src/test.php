<?php
$servername = "data";  // Nom du container MariaDB
$username = "root";
$password = "";         // la variable MARIADB_RANDOM_ROOT_PASSWORD sera générée automatiquement
$dbname = "testdb";

// Connexion à la base
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Création ou insertion d’un test
$sql_insert = "INSERT INTO test_table (valeur) VALUES (RAND())";
$conn->query($sql_insert);

// Lecture du dernier enregistrement
$sql_select = "SELECT * FROM test_table ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Dernière valeur insérée : " . $row["valeur"];
} else {
    echo "Aucune donnée trouvée.";
}

$conn->close();
?>
