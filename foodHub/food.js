
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

var a = document.querySelectorAll('.Sign');
a.forEach(a => {
    a.addEventListener('mouseover', () => {
        a.style.backgroundColor = 'orange';
    });

    a.addEventListener('mouseout', () =>{
        a.style.backgroundColor = 'lightseagreen';
    })
});


var links = document.querySelectorAll('a');

links.forEach(link => {
    link.addEventListener('mouseover', () => {
        link.style.color = 'lightseagreen';
    });

    link.addEventListener('mouseout', () => {
        link.style.color = 'darkblue';
    })
});

function showSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.style.display = (sidebar.style.display === 'none' || sidebar.style.display === '') ? 'block' : 'flex';
}

document.addEventListener('click', function (event) {
    var sidebar = document.getElementById('sidebar');
    var menuIcon = document.querySelector('.ri-menu-3-line');
    if (!sidebar.contains(event.target) && event.target !== menuIcon) {
        sidebar.style.display = 'none';
    }
});

   

