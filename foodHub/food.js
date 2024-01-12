
const selectElement = document.getElementById('categorySelect');
const inputElement = document.getElementById('recipeInput');

selectElement.addEventListener('change', function () {
    inputElement.value = selectElement.value;
    inputElement.style.color = "#974949";
});


const h1Elements = document.querySelectorAll('.option h1');

h1Elements.forEach((h1) => {
    h1.addEventListener('mouseover', () => {
        h1.style.color = 'Brown';
    });

    h1.addEventListener('mouseout', () => {
        h1.style.color = 'white';
    });
});

document.getElementById("img").addEventListener("mouseover", function () {
    this.style.filter = "grayscale(0%)";
});
document.getElementById("img").addEventListener("mouseout", function () {
    this.style.filter = "grayscale(100%)";
});