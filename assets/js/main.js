// main.js
document.addEventListener('DOMContentLoaded', function () {
    // Cargar el contenido del header
    document.getElementById('header-placeholder').innerHTML =`
        <header>
            <nav>
                <ul>
                    <li><a href="#home">Inicio</a></li>
                    <li><a href="#programacion_estructurada">Programación</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
        </header>
    `;

    // Cargar el contenido del footer
    document.getElementById('footer-placeholder').innerHTML =`
        <footer>
            <p>&copy; 2025 Aprende Programación</p>
        </footer>
    `;
    
});
