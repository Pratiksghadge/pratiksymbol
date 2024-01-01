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


   

