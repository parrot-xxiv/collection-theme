<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Collection_Theme
 */

?>


<footer class="bg-slate-800 text-white py-10" id="colophon" class="site-fotter">
	<div class="container mx-auto px-4">
		<div class="flex flex-col md:flex-row justify-between items-center">
			<div class="text-xl font-bold mb-6 md:mb-0 flex items-center">
				<span class="text-teal-500 mr-2">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
						stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
					</svg>
				</span>
				WordPress Collections	
			</div>
			<div class="flex space-x-6">
				<!-- <a href="#" class="text-slate-400 hover:text-teal-500 transition-colors duration-300">
					<span class="sr-only">Twitter</span>
					<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
						<path
							d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
						</path>
					</svg>
				</a> -->
				<a href="#" class="text-slate-400 hover:text-teal-500 transition-colors duration-300">
					<span class="sr-only">GitHub</span>
					<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
						<path fill-rule="evenodd"
							d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
							clip-rule="evenodd"></path>
					</svg>
				</a>
				<a href="#" class="text-slate-400 hover:text-teal-500 transition-colors duration-300">
					<span class="sr-only">LinkedIn</span>
					<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
						<path fill-rule="evenodd"
							d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
							clip-rule="evenodd"></path>
					</svg>
				</a>
			</div>
		</div>
		<div class="text-center mt-8 text-slate-400">
			<p>&copy; 2025 Eldren Par. All rights reserved.</p>
		</div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Flip.min.js"></script>
<script>
	(function($) {
		$(document).ready(function() {
			// Register GSAP plugins
			gsap.registerPlugin(Flip);

			// Simple entrance animation for cards (only on initial load)
			gsap.fromTo(".project-card", {
				y: 50,
				opacity: 0
			}, {
				y: 0,
				opacity: 1,
				duration: 0.8,
				stagger: 0.1,
				ease: "power2.out"
			});

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
			$('#theme-toggle, #mobile-theme-toggle').click(function() {
				toggleTheme();
			});

			// Mobile menu toggle
			$('#menu-toggle').click(function() {
				$('#mobile-menu').slideToggle(300);
			});

			// Project filtering with GSAP Flip
			$('.filter-btn').click(function() {
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
					projectCards.each(function() {
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
			$('a[href^="#"]').on('click', function(e) {
				e.preventDefault();

				const target = this.hash;
				const $target = $(target);

				if ($target.length) {
					$('html, body').animate({
						'scrollTop': $target.offset().top - 80
					}, 800, 'swing');
				}
			});

			// Hover animations for project cards
			$('.project-card').hover(
				function() {
					// Mouse enter
					gsap.to($(this), {
						y: -10,
						boxShadow: "0 20px 25px rgba(0, 0, 0, 0.15)",
						duration: 0.3,
						ease: "power2.out"
					});

					// Subtle zoom on the image
					gsap.to($(this).find('img'), {
						scale: 1.05,
						duration: 0.5,
						ease: "power1.out"
					});
				},
				function() {
					// Mouse leave
					gsap.to($(this), {
						y: 0,
						boxShadow: "0 10px 15px rgba(0, 0, 0, 0.1)",
						duration: 0.3,
						ease: "power2.out"
					});

					// Reset image zoom
					gsap.to($(this).find('img'), {
						scale: 1,
						duration: 0.5,
						ease: "power1.out"
					});
				}
			);
		});
	})(jQuery);
</script>

</body>

</html>