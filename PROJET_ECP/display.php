<?php
// Connexion à la base de données
$conn = mysqli_connect('localhost', 'utilisateur', 'motdepasse', 'basededonnees');

// Vérification de la connexion
if (!$conn) {
    die("La connexion a échoué: " . mysqli_connect_error());
}

// Récupérer les rendez-vous à venir
$current_date = date("Y-m-d");
$sql = "SELECT * FROM rendez_vous WHERE date >= '$current_date' ORDER BY date ASC, heure ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>{$row['nom']} - {$row['date']} {$row['heure']}</li>";
    }
} else {
    echo "<li>Aucun rendez-vous à venir</li>";
}

mysqli_close($conn);
?>
