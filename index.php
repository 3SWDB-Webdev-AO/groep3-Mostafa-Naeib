<?php include 'lib/header.php'; ?>

<main class="home_main">
    <article class="home_art1">
        <h1>Lets play Games that you like.</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </article>

    <article class="container">

        <section class="container_images">
            <img src="img/bird.jpg" alt="">
            <img src="img/dino.png" alt="">
            <img src="img/galgje.png" alt="">
        </section>
        <script src="js/home.js"></script>
    </article>
    <section>
    <h2> Highscores</h2>
    <?php
    require_once 'lib/db.php';

    // Controleer de connectie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Haal de laatste highscores op van de ingelogde gebruiker
    $sql = "SELECT game_id, highscore FROM highscores ORDER BY highscore DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
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
    </section>
</main>


<?php include 'lib/footer.php'; ?>