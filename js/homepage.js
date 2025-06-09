(function ($) {
    $(document).ready(function () {
        // Register GSAP plugins
        gsap.registerPlugin(Flip);

        // Check for saved theme preference or use system preference
        function getInitialTheme() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                return savedTheme;
            }
            // Check if system prefers dark mode
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }

        // Apply the initial theme
        const initialTheme = getInitialTheme();
        const htmlEl = document.documentElement; // or document.querySelector('html')

        // Set the initial data-theme attribute
        if (initialTheme === 'dark') {
            htmlEl.setAttribute('data-theme', 'dark');
        } else {
            htmlEl.setAttribute('data-theme', 'light');
        }

        // Theme toggle function
        function toggleTheme() {
            console.log('toggle');
            const currentTheme = htmlEl.getAttribute('data-theme');
            if (currentTheme === 'dark') {
                htmlEl.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            } else {
                htmlEl.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }
        }


        // Theme toggle click handlers
        $('#theme-toggle, #mobile-theme-toggle').click(function () {
            toggleTheme();
        });
        
        // Mobile menu toggle
        $('#menu-toggle').click(function () {
            $('#mobile-menu').slideToggle(300);
        });

        // Project filtering with GSAP Flip
        $('.filter-btn').click(function () {
            // Update active button styling
            $('.filter-btn').removeClass('bg-teal-500').addClass('bg-slate-700');
            $(this).removeClass('bg-slate-700').addClass('bg-teal-500');

            const filter = $(this).data('filter');
            const projectCards = $('.project-card');
            const projectsGrid = $('.projects-grid');

            // Get the current state before changes
            const state = Flip.getState([projectCards, projectsGrid]);

            // Show/hide elements based on filter
            if (filter === 'all') {
                projectCards.show();
            } else {
                projectCards.each(function () {
                    if ($(this).data('category') === filter) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Animate from the previous state to the new state
            Flip.from(state, {
                duration: 0.5,
                ease: "power1.inOut",
                absolute: true,
                // Add this to properly handle container height animation
                absoluteOnLeave: true,
                onEnter: elements => {
                    // Only animate new elements, not the container
                    const cards = elements.filter(el => el.classList.contains('project-card'));
                    if (cards.length === 0) return null;

                    return gsap.fromTo(cards, {
                        opacity: 0,
                        scale: 0.8,
                        y: 30
                    }, {
                        opacity: 1,
                        scale: 1,
                        y: 0,
                        duration: 0.8,
                        ease: "back.out(1.2)"
                    });
                },
                onLeave: elements => {
                    // Only animate removed elements, not the container
                    const cards = elements.filter(el => el.classList.contains('project-card'));
                    if (cards.length === 0) return null;

                    return gsap.to(cards, {
                        opacity: 0,
                        scale: 0.8,
                        y: -30,
                        duration: 0.5
                    });
                }
            });

            // Add a nice button animation
            gsap.from(this, {
                scale: 0.95,
                duration: 0.3,
                ease: "back.out(1.5)"
            });
        });

        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();

            const target = this.hash;
            const $target = $(target);

            if ($target.length) {
                $('html, body').animate({
                    'scrollTop': $target.offset().top - 80
                }, 800, 'swing');
            }
        });

    });
})(jQuery);