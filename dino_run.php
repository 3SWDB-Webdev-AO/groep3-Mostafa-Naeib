<?php include 'lib/header.php'; ?>

<script src="js/home.js" defer></script>
<main>
    <h1>Dino Run</h1>
    <section id="dino_run_container">
        <div id="karakter"></div>
        <div id="blok"></div>
    </section>

    <section>
        <p id="score">Score: 0</p>
    </section>
    
    <?php
    require_once 'lib/db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['score'])) {
        $score = intval($_POST['score']);
        $game_id = 3; // ID van "dino_run"
        $gebruiker_id = $_SESSION['gebruiker_id'];

        $stmt = $conn->prepare("INSERT INTO highscores (game_id, gebruiker_id, highscore) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $game_id, $gebruiker_id, $score);

        if ($stmt->execute()) {
            echo "New score saved successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    ?>
</main>

<?php include 'lib/footer.php'; ?>
