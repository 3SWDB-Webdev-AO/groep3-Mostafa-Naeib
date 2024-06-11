<?php
    require_once 'lib/db.php';

// Controleer de connectie
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Haal de gegevens op van de POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = intval($_POST['score']);
    $game_id = intval($_POST['game_id']);
    $gebruiker_id = intval($_POST['gebruiker_id']);
    
    // Bereid de SQL statement voor
    $stmt = $conn->prepare("INSERT INTO highscores (game_id, gebruiker_id, highscore) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $game_id, $gebruiker_id, $score);
    
    // Voer de SQL statement uit
    if ($stmt->execute()) {
        echo "New score saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Sluit de statement en de connectie
    $stmt->close();
    $conn->close();
}
?>
