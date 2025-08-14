// Scroll suave para enlaces del navbar
document.querySelectorAll('a.nav-link').forEach(enlace => {
    enlace.addEventListener('click', function(e) {
        if (this.hash !== "") {
            e.preventDefault();
            const destino = document.querySelector(this.getAttribute('href'));
            if (destino) {
                destino.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});

// Animación de aparición en scroll
const elementos = document.querySelectorAll('.card, section h2, section p, form');

const mostrarElemento = (entradas, observador) => {
    entradas.forEach(entrada => {
        if (entrada.isIntersecting) {
            entrada.target.classList.add('animate__animated', 'animate__fadeInUp');
        }
    });
};

const observador = new IntersectionObserver(mostrarElemento, {
    threshold: 0.1
});

elementos.forEach(el => observador.observe(el));
