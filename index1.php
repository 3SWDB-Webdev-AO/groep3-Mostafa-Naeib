<?php include 'lib/header.php'; ?>
<?php

if(!isset($_SESSION['gebruikersnaam'])) {
    header('Location: login.php');
}

echo "<div class='gebruikersnaam'><a href='profile.php'>" . $_SESSION['gebruikersnaam'] . "</a></div>";
?>
<main>
    <h1>Welkom op de Pixel Playground</h1>
    <p>De Pixel Playground is een plek waar je je creativiteit de vrije loop kunt laten. Maak je eigen pixel art en deel het met anderen. Of bekijk de creaties van andere gebruikers en laat je inspireren.</p>
    <h2>Laatste behaalde highscores</h2>
    <?php
    require_once 'lib/db.php';

    // Controleer de connectie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Haal de laatste highscores op van de ingelogde gebruiker
    $gebruiker_id = $_SESSION['gebruiker_id'];
    $sql = "SELECT highscore, game_id FROM highscores WHERE gebruiker_id = ? ORDER BY highscore DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $gebruiker_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<ul>";
        // htmlspecialchars dit zorgt ervoor dat klanten geen code kunnen injecteren in de database
        while($row = $result->fetch_assoc()) {
            echo "<li>Game ID: " . htmlspecialchars($row['game_id']) . " - Score: " . htmlspecialchars($row['highscore']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Je hebt nog geen highscores behaald.";
    }

    $stmt->close();
    $conn->close();
    ?>
</main>
<?php include 'lib/footer.php'; ?>
