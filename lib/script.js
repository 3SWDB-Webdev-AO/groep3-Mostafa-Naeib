

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
