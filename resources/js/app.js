// Alpine is automatically loaded and started by Livewire v3. Do not import or start it manually here to avoid conflicts.

// Navbar Scroll Logic
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('main-nav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-brand-maroon', 'py-4', 'shadow-xl');
            navbar.classList.remove('bg-transparent', 'py-6');
        } else {
            navbar.classList.remove('bg-brand-maroon', 'py-4', 'shadow-xl');
            navbar.classList.add('bg-transparent', 'py-6');
        }
    });
});
