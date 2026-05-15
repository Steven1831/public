/**
 * CityWorks Animations
 * Intersection Observer based scroll animations
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Check for IntersectionObserver support
    if (!('IntersectionObserver' in window)) {
        // Fallback: show all elements
        document.querySelectorAll('.fade-in-up').forEach(el => {
            el.classList.add('visible');
        });
        return;
    }

    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all fade-in-up elements
    document.querySelectorAll('.fade-in-up').forEach(el => {
        observer.observe(el);
    });

    // Stats counter animation
    const statNumbers = document.querySelectorAll('.stat-item h3');
    let hasAnimated = false;

    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasAnimated) {
                hasAnimated = true;
                statNumbers.forEach(stat => {
                    const finalValue = stat.textContent;
                    animateCounter(stat, finalValue);
                });
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(stat => statsObserver.observe(stat));

    function animateCounter(element, finalValue) {
        const num = parseFloat(finalValue.replace(/[^0-9.]/g, ''));
        const suffix = finalValue.replace(/[0-9.]/g, '');
        const duration = 2000;
        const steps = 60;
        const increment = num / steps;
        let current = 0;
        const timer = setInterval(() => {
            current += increment;
            if (current >= num) {
                current = num;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + suffix;
        }, duration / steps);
    }
});
