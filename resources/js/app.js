// Navbar Scroll Logic
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('main-nav');
    if (!navbar) return;

    const handleScroll = () => {
        if (window.scrollY > 50) {
            navbar.classList.add('py-1.5', 'shadow-2xl');
            navbar.classList.remove('py-3');
        } else {
            navbar.classList.remove('py-1.5');
            navbar.classList.add('py-3');
        }
    };

    // Run on init
    handleScroll();
    window.addEventListener('scroll', handleScroll);
});
