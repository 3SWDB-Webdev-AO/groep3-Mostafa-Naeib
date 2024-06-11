<!-- gebruiker ophalen van de db en optie geven opdie te verranderen  -->
<?php include 'lib/header.php'; ?>
<main>
    <h1>Profiel</h1>
    <p>Welkom op je profielpagina, <?php echo $_SESSION['gebruikersnaam']; ?>! Hier kan je persoonlijke gegevens zien en wijzigen</p>
    
    <?php require_once 'new_pass.php';?>
    <h2>Laatste behaalde highscores</h2>
    <?php
    require_once 'lib/db.php';

    // Controleer de connectie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Haal de laatste highscores op van de ingelogde gebruiker
    $gebruiker_id = $_SESSION['gebruiker_id'];
    $sql = "SELECT highscore, game_id, timestamp FROM highscores WHERE gebruiker_id = ? ORDER BY highscore DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $gebruiker_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<ul>";
        // htmlspecialchars dit zorgt ervoor dat klanten geen code kunnen injecteren in de database
        while($row = $result->fetch_assoc()) {
            echo "<li>Game ID: " . htmlspecialchars($row['game_id']) . " - Score: " . htmlspecialchars($row['highscore']) . " - Datum: " . htmlspecialchars($row['timestamp']) . "</li>";
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

