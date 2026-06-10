document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.dropbtn').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const item = button.closest('.dropdown');
            if (!item) return;
            item.classList.toggle('show');
        });
    });
});
