/* Optional block reveals. Content remains visible until observation is available. */
(() => {
    const elements = [...document.querySelectorAll('.is-style-reveal, .at-reveal')];
    const motion = window.matchMedia('(prefers-reduced-motion: reduce)');

    if (!elements.length || motion.matches || typeof window.IntersectionObserver !== 'function') {
        return;
    }

    const reveal = (element) => {
        element.classList.remove('at-reveal-pending');
        observer.unobserve(element);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                reveal(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -48px 0px', threshold: 0 });

    elements.forEach((element) => {
        // Keep content already on screen visible, including restored scroll positions.
        if (element.getBoundingClientRect().top < window.innerHeight) {
            return;
        }

        const grid = element.closest('.at-mission-grid');
        if (grid && element.matches('.at-mission-card')) {
            const cards = [...grid.querySelectorAll('.at-mission-card')];
            element.style.setProperty('--at-reveal-index', Math.min(cards.indexOf(element), 2));
        }

        observer.observe(element);
        element.classList.add('at-reveal-ready', 'at-reveal-pending');
    });

    document.addEventListener('focusin', (event) => {
        elements.forEach((element) => {
            if (element.contains(event.target)) {
                reveal(element);
            }
        });
    });

    motion.addEventListener('change', () => {
        if (motion.matches) {
            elements.forEach(reveal);
            observer.disconnect();
        }
    });
})();
