<?php include 'lib/header.php'; ?>

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

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the score from the form
            $score = $_POST['score'];

            try {
                // Prepare the SQL statement using PDO
                $stmt = $conn->prepare("INSERT INTO highscores (score) VALUES (:score)");

                // Bind the score parameter
                $stmt->bindParam(':score', $score, PDO::PARAM_INT);

                // Execute the statement
                $stmt->execute();

                // Display a success message
                echo "Score inserted successfully!";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    ?>

    <form method="POST" action="">
        <input type="hidden" name="score" value="0">
        <button type="submit">Submit Score</button>
    </form>

</main>
<?php include 'lib/footer.php'; ?>
