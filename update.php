<?php
require('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["Gebruikersnaam"];
    $pass = $_POST["wachtwoord"];
    $id = $_GET["id"];

    $query = "UPDATE users SET Gebruikersnaam = :Gebruikersnaam, wachtwoord = :wachtwoord WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'Gebruikersnaam' => $user,
        'wachtwoord' => $pass,
        'id' => $id
    ]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Toevoegen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
</body>
    <div class="container">
        <h2>UPDATE</h2>
        <form method="POST">
            <div class="form-group">
                <label for="gebruiker">Nieuwe Gebruikersnaam:</label>
                <input type="text" class="form-control" id="Gebruikersnaam" name="Gebruikersnaam" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Nieuwe wachtwoord:</label>
                <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" required>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</body>
</html>