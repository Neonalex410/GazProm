let type   = document.querySelectorAll('.type > h2'),
    filter = document.querySelectorAll('.filter > div');

type[0].classList.add('blue');
filter[0].classList.add('blue');

for (let i = 0; i < type.length; i++) {
    type[i].addEventListener('click', () => {
        type[0].classList.remove('blue');
        type[1].classList.remove('blue');
        type[2].classList.remove('blue');
        type[3].classList.remove('blue');
        type[i].classList.add('blue');
    })
}

for (let i = 0; i < filter.length; i++) {
    filter[i].addEventListener('click', () => {
        filter[0].classList.remove('blue');
        filter[1].classList.remove('blue');
        filter[2].classList.remove('blue');
        filter[3].classList.remove('blue');
        filter[4].classList.remove('blue');
        filter[i].classList.add('blue');
    })
}
