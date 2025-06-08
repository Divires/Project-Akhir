import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // Toggle sidebar hamburger
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');

    hamburger.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });

});
