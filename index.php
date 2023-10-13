<?php
require('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["Gebruikersnaam"];
    $pass = $_POST["wachtwoord"];

    $query = "INSERT INTO users (Gebruikersnaam, wachtwoord) VALUES (:Gebruikersnaam, :wachtwoord)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'Gebruikersnaam' => $user,
        'wachtwoord' => $pass,
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
        <h2>Contactlijst</h2>  
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>username</th>
                    <th>wachtwoord</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT id, Gebruikersnaam, wachtwoord  FROM users";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}";
                    echo "<td>{$row['Gebruikersnaam']}";
                    echo "<td>{$row['wachtwoord']}</td>";
                    echo "<td><a href='update.php?id={$row['id']}' class='btn btn-info'>Bewerken</a></td>";
                    echo "<td><a id={$row['id']}' class='btn btn-danger'>Verwijderen</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
    <div class="container">
        <h2>Contact Toevoegen</h2>
        <form method="POST">
            <div class="form-group">
                <label for="gebruiker">Gebruikersnaam:</label>
                <input type="text" class="form-control" id="Gebruikersnaam" name="Gebruikersnaam" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">wachtwoord:</label>
                <input type="passwoord" class="form-control" id="wachtwoord" name="wachtwoord" required>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</body>
</html>

