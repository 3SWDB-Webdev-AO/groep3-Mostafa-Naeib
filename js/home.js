let karakter = document.getElementById('karakter');
let blok = document.getElementById('blok');
let score = 0;
let game_id = 3; // Voorbeeld game_id voor "dino_run"
let gebruiker_id = 1; // Dit wordt meestal vanuit PHP ingeladen in de JavaScript, zie opmerking hieronder

function jump(){
    karakter.classList.add("animate");
    setTimeout(function(){
        karakter.classList.remove("animate");
    }, 550);
}

var checkDead = setInterval(function(){
    var karakterTop = parseInt(window.getComputedStyle(karakter).getPropertyValue("top"));
    var blokLeft = parseInt(window.getComputedStyle(blok).getPropertyValue("left"));
    if (blokLeft < 20 && blokLeft > 0 && karakterTop >= 130) {
        blok.style.animation = "none";
        blok.style.display = "none";
        alert("klik op OK to play again. Score: " + score);
        // Eerst een melding met score en dan word de pagina opnieuw geladen
        location.reload();
        // Stuur de score naar PHP
        sendScoreToPHP(score);
    }
}, 10);

var updateScore = setInterval(function(){
    score++;
    document.getElementById('score').innerHTML = "Score: " + score;
}, 100);

function sendScoreToPHP(score) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "", true); // Stuur naar dezelfde pagina
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Score saved successfully.");
        }
    };
    xhr.send("score=" + score);
}


// slideshow code 
var currentIndex = 0;
function automaticSlide() {
    var images = document.querySelectorAll('.container_images img');
    images.forEach((img, index) => {
        img.style.display = index === currentIndex ? 'block' : 'none';
    });
    currentIndex = (currentIndex + 1) % images.length;
}
setInterval(automaticSlide, 3000); // Change image every 3 seconds
document.addEventListener("DOMContentLoaded", automaticSlide);