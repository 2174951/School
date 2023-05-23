<?php
$host = 'localhost:3307';
$db   = 'Winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "connected to database $db";
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['knopje'])){

$sql = 'INSERT INTO studenten
VALUES (:naam, :achternaam, :telefoonnummer)';

$stmt = $pdo->prepare($sql);

$placeholders = [
    
    'voornaam' => $_POST['voornaam'],
    'achternaam' => $_POST['achternaam'],
    'telefoonnummer' => $_POST['telefoonnummer']

];
$stmt->execute($placeholders);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <input type="text" name="voornaam" placeholder="Voornaam">
    <input type="text" name="achternaam" placeholder="Achternaam">
    <input type="int" name="telefoonnummer" placeholder="Telefoonnummer">
    <input type="submit" name="knop">


    </form>
</body>
</html>
