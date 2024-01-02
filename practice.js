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

   

