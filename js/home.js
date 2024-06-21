let karakter = document.getElementById('karakter');
let blok = document.getElementById('blok');
let score = 0;
let gameRunning = true;

function jump() {
    if (!karakter.classList.contains("animate")) {
        karakter.classList.add("animate");
        setTimeout(function() {
            karakter.classList.remove("animate");
        }, 500);
    }
}

document.addEventListener("keydown", function(event) {
    if (event.code === "Space") {
        jump();
    }
});

function checkDead() {
    let karakterTop = parseInt(window.getComputedStyle(karakter).getPropertyValue("bottom"));
    let blokLeft = parseInt(window.getComputedStyle(blok).getPropertyValue("left"));
    if (blokLeft < 20 && blokLeft > 0 && karakterTop <= 130) {
        blok.style.animation = "none";
        blok.style.display = "none";
        alert("You lose! Score: " + score);
        sendScoreToPHP(score);
        alert("Klik op OK om opnieuw te spelen.");
        location.reload();
        gameRunning = false;
    }
    if (gameRunning) {
        requestAnimationFrame(checkDead);
    }
}

requestAnimationFrame(checkDead);

function updateScore() {
    if (gameRunning) {
        score++;
        document.getElementById('score').innerHTML = "Score: " + score;
        setTimeout(updateScore, 100);
    }
}

updateScore();

function sendScoreToPHP(score) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/groep3-Mostafa-Naeib/dino_run.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Score saved successfully.");
        }
    };
    xhr.send("score=" + score);
}

// Slideshow code van home 
var currentIndex = 0;
function automaticSlide() {
    var images = document.querySelectorAll('.container_images img');
    images.forEach((img, index) => {
        img.style.display = index === currentIndex ? 'block' : 'none';
    });
    currentIndex = (currentIndex + 1) % images.length;
}
setInterval(automaticSlide, 3000);
document.addEventListener("DOMContentLoaded", automaticSlide);
