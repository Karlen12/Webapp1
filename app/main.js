/* ════════════════════════════════════════
   ARARAT — Fine Armenian Dining
   main.js
════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', () => {

    /* ── Sticky header ── */
    const header = document.getElementById('site-header');

    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });


    /* ── Accessible menu tabs ── */
    const tabs   = document.querySelectorAll('.menu-tab');
    const panels = document.querySelectorAll('.menu-panel');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {

            // Deactivate all tabs and panels
            tabs.forEach(t => {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });
            panels.forEach(p => p.classList.remove('active'));

            // Activate selected tab and its panel
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');
            document.getElementById(tab.getAttribute('aria-controls')).classList.add('active');
        });

        // Keyboard navigation (← →) within the tablist
        tab.addEventListener('keydown', e => {
            const tabArray = [...tabs];
            const index    = tabArray.indexOf(tab);

            if (e.key === 'ArrowRight') {
                e.preventDefault();
                tabArray[(index + 1) % tabArray.length].focus();
            }
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                tabArray[(index - 1 + tabArray.length) % tabArray.length].focus();
            }
        });
    });

});
