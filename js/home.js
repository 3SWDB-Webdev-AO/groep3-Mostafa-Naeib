let karakter = document.getElementById('karakter');
let blok = document.getElementById('blok');
let score = 0; // Houd de score bij
let gameRunning = true; // Variabele om te controleren of het spel nog loopt

// Functie om het karakter te laten springen
function jump() {
    // Controleer of de animatieklasse niet al aanwezig is
    if (!karakter.classList.contains("animate")) {
        // Voeg de animatieklasse toe
        karakter.classList.add("animate");
        // Verwijder de animatieklasse na 500ms (om de sprong te beëindigen)
        setTimeout(function() {
            karakter.classList.remove("animate");
        }, 500);
    }
}

// Voeg een event listener toe om de sprong te activeren wanneer de spatiebalk wordt ingedrukt
document.addEventListener("keydown", function(event) {
    if (event.code === "Space") {
        jump();
    }
});

// Functie om te controleren of het karakter dood is (geraakt door de blok)
function checkDead() {
    // Haal de huidige positie van het karakter en de blok op
    let karakterTop = parseInt(window.getComputedStyle(karakter).getPropertyValue("bottom"));
    let blokLeft = parseInt(window.getComputedStyle(blok).getPropertyValue("left"));

    // Controleer of de blok en het karakter elkaar raken
    if (blokLeft < 20 && blokLeft > 0 && karakterTop <= 130) {
        // Stop de animatie van de blok
        blok.style.animation = "none";
        blok.style.display = "none";
        // Toon een melding dat je verloren hebt en geef de score weer
        alert("You lose! Score: " + score);
        // Stuur de score naar de PHP-server
        sendScoreToPHP(score);
        // Vraag de gebruiker om opnieuw te spelen en herlaad de pagina
        alert("Klik op OK om opnieuw te spelen.");
        location.reload();
        // Stop het spel
        gameRunning = false;
    }

    // Blijf controleren als het spel nog loopt
    if (gameRunning) {
        requestAnimationFrame(checkDead);
    }
}

// Start de functie om constant te controleren of het karakter dood is
requestAnimationFrame(checkDead);

// Functie om de score bij te werken
function updateScore() {
    if (gameRunning) {
        score++; // Verhoog de score
        // Werk de score weer op de pagina bij
        document.getElementById('score').innerHTML = "Score: " + score;
        // Roep de functie opnieuw aan na 100ms om de score continu bij te werken
        setTimeout(updateScore, 100);
    }
}

// Start de score update functie
updateScore();

// Functie om de score naar de PHP-server te sturen
function sendScoreToPHP(score) {
    var xhr = new XMLHttpRequest(); // Maak een nieuw XMLHttpRequest object
    xhr.open("POST", "http://localhost/groep3-Mostafa-Naeib/dino_run.php", true); // Configureer de POST-aanvraag
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Stel de juiste content-type header in
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Score saved successfully."); // Log een bericht als de score succesvol is opgeslagen
        }
    };
    // Stuur de score als een URL-gecodeerde string
    xhr.send("score=" + score);
}

// Code voor de diavoorstelling
var currentIndex = 0; // Huidige index van de afbeelding

// Functie om de afbeeldingen automatisch te laten schuiven

// Slideshow code van home 
var currentIndex = 0;
 main
function automaticSlide() {
    var images = document.querySelectorAll('.container_images img'); // Haal alle afbeeldingen op
    // Loop door alle afbeeldingen en toon alleen de huidige afbeelding
    images.forEach((img, index) => {
        img.style.display = index === currentIndex ? 'block' : 'none';
    });
    // Verhoog de huidige index en zorg dat deze rond blijft gaan
    currentIndex = (currentIndex + 1) % images.length;
}

// Stel de interval in voor het automatisch schuiven van de afbeeldingen
setInterval(automaticSlide, 3000);

// Zorg ervoor dat de eerste afbeelding wordt getoond wanneer de pagina geladen is
document.addEventListener("DOMContentLoaded", automaticSlide);
