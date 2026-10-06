document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form[data-confirm]').forEach(form => {
        form.addEventListener('submit', e => {
            if (!window.confirm(form.dataset.confirm)) e.preventDefault();
        });
    });

    const menuButton = document.querySelector('.mobile-menu');

    if (menuButton) {
        menuButton.addEventListener('click', () => {
            const isMobile = window.matchMedia('(max-width: 900px)').matches;

            if (isMobile) {
                document.body.classList.toggle('menu-open');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }

            const expanded = isMobile
                ? document.body.classList.contains('menu-open')
                : !document.body.classList.contains('sidebar-collapsed');

            menuButton.setAttribute('aria-expanded', String(expanded));
        });
    }

    document.querySelectorAll('.sidebar .nav-item[href]').forEach(item => {
        item.addEventListener('click', () => document.body.classList.remove('menu-open'));
    });

    window.addEventListener('resize', () => {
        if (window.matchMedia('(min-width: 901px)').matches) {
            document.body.classList.remove('menu-open');
        }
    });
});
