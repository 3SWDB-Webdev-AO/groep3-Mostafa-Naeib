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

    <style>
        @keyframes move {
            from { left: 300px; }
            to { left: 0px; }
        }

        .animate {
            animation: jump 0.5s;
        }

        @keyframes jump {
            0% { top: 150px; }
            50% { top: 100px; }
            100% { top: 150px; }
        }

        @keyframes blok {
            0% { left: 480px; }
            100% { left: -20px; }
        }

        #dino_run_container {
            width: 100%;
            max-width: 500px;
            height: 200px;
            border: 1px solid #ffffff;
            overflow: hidden;
            position: relative;
        }

        #karakter {
            width: 20px;
            height: 50px;
            background-color: #BF1943;
            position: absolute;
            bottom: 0;
        }

        #blok {
            width: 20px;
            height: 20px;
            background-color: blue;
            position: absolute;
            bottom: 0;
            left: 500px;
            animation: blok 2s infinite linear;
        }



        #score {
            font-size: 24px;
        }



    </style>


    
    <?php
    require_once 'lib/db.php';
    require_once 'saveHighScore.php';

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
