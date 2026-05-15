/**
 * CityWorks Theme JavaScript
 * @package CityWorks
 */

(function($) {
    'use strict';

    $(function() {
        initMobileMenu();
        initSmoothScroll();
        initContactForm();
        initScrollAnimations();
        initHeaderScroll();
    });

    function initMobileMenu() {
        const $btn = $('#mobile-menu-btn');
        const $menu = $('#mobile-menu');
        const $overlay = $('#mobile-menu-overlay');
        const $closeBtn = $('#mobile-menu-close');
        let isOpen = false;

        function openMenu() {
            $menu.addClass('active');
            $overlay.addClass('active');
            $btn.addClass('active').attr('aria-expanded', 'true');
            $('body').css('overflow', 'hidden');
            isOpen = true;
        }

        function closeMenu() {
            $menu.removeClass('active');
            $overlay.removeClass('active');
            $btn.removeClass('active').attr('aria-expanded', 'false');
            $('body').css('overflow', '');
            isOpen = false;
        }

        $btn.on('click', function() {
            isOpen ? closeMenu() : openMenu();
        });

        $closeBtn.on('click', closeMenu);
        $overlay.on('click', closeMenu);

        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && isOpen) {
                closeMenu();
            }
        });

        $(window).on('resize', function() {
            if ($(window).width() >= 768 && isOpen) {
                closeMenu();
            }
        });
    }

    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));

            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });
    }

    function initContactForm() {
        $('#cityworks-contact-form, .cityworks-contact-form').on('submit', function(e) {
            e.preventDefault();

            const $form = $(this);
            const $btn = $form.find('.submit-btn');
            const originalText = $btn.text();
            const name = $form.find('[name="name"]').val().trim();
            const email = $form.find('[name="email"]').val().trim();
            const message = $form.find('[name="message"]').val().trim();

            if (!name || !email || !message) {
                alert('Please fill in all fields.');
                return;
            }

            if (!isValidEmail(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            $btn.text('Sending...').prop('disabled', true);

            $.ajax({
                url: cityworks_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'cityworks_contact',
                    name: name,
                    email: email,
                    message: message,
                    nonce: $form.find('[name="cityworks_contact_nonce"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.data && response.data.message ? response.data.message : 'Message sent successfully.');
                        $form[0].reset();
                    } else {
                        alert(response.data && response.data.message ? response.data.message : 'Error sending message. Please try again.');
                    }
                },
                error: function() {
                    alert('Network error. Please try again.');
                },
                complete: function() {
                    $btn.text(originalText).prop('disabled', false);
                }
            });
        });
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function initScrollAnimations() {
        if (!('IntersectionObserver' in window)) {
            $('.service-card, .industry-card, .stat-item').addClass('fade-in-up');
            return;
        }

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        $('.service-card, .industry-card, .stat-item, .about-content, .impact-image').each(function() {
            observer.observe(this);
        });
    }

    function initHeaderScroll() {
        const $header = $('.site-header');

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 50) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
        });
    }
})(jQuery);
