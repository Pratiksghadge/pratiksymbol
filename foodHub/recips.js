function validateAndSignUp() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;

    if (name.trim() === "") {
        alert("Please enter your name.");
        return;
    }
    if (!isValidEmail(email)) {
        alert("Please enter a valid email address.");
        return;
    }
    alert("Sign up successful!");
}
function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}



const zoomableImages = document.querySelectorAll('.img');

zoomableImages.forEach(image => {
    image.addEventListener('mouseenter', () => {
        image.style.transform = 'scale(1.2)';
    });

    image.addEventListener('mouseleave', () => {
        image.style.transform = 'scale(1)';
    });
});