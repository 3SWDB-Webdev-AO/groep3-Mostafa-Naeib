let karakter = document.getElementById('karakter');
let blok = document.getElementById('blok');

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
        alert("You lose! Score: " + score);
    }
}, 10);


var updateScore = setInterval(function(){
    score++;
    document.getElementById('score').innerHTML = "Score: " + score;
}, 100);

let score = 0;