<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Collection_Theme
 */

get_header();
?>

<!-- <main id="primary" class="site-main"> -->
	<!-- Filter Section -->
	<section class="py-8 bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm shadow-inner">
		<div class="container mx-auto px-4">
			<div class="flex flex-wrap justify-center gap-3 mb-8" id="filter-buttons">
				<button
					class="filter-btn relative bg-teal-500 text-white px-5 py-2 rounded-full hover:bg-slate-600 cursor-pointer transition-colors duration-300 shadow-md hover:bg-teal-500"
					data-filter="all">All Projects</button>
				<button
					class="filter-btn relative bg-slate-700 text-white px-5 py-2 rounded-full hover:bg-slate-600 cursor-pointer transition-colors duration-300 shadow-md hover:bg-teal-500"
					data-filter="web">Web Development</button>
				<button
					class="filter-btn relative bg-slate-700 text-white px-5 py-2 rounded-full hover:bg-slate-600 cursor-pointer transition-colors duration-300 shadow-md hover:bg-teal-500"
					data-filter="mobile">Mobile Apps</button>
				<button
					class="filter-btn relative bg-slate-700 text-white px-5 py-2 rounded-full hover:bg-slate-600 cursor-pointer transition-colors duration-300 shadow-md hover:bg-teal-500"
					data-filter="design">UI/UX Design</button>
			</div>
		</div>
	</section>

	<section id="projects" class="py-16">
		<div class="container mx-auto px-4">
			<h2
				class="text-3xl font-bold text-slate-800 dark:text-white text-center mb-16 relative drop-shadow-md">
				<span class="relative z-10">Featured Projects</span>
				<span
					class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-teal-500 rounded-full"></span>
			</h2>

			<div class="projects-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
				<div
					class="project-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50 transform hover:-translate-y-1 duration-300 ease-in-out"
					data-category="web">
					<div class="relative">
						<img src="https://placehold.co/600x400" alt="E-commerce Website"
							class="w-full h-48 object-cover">
						<div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent opacity-60"></div>
						<span
							class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full">Web
							Development</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white">E-commerce Platform</h3>
						<p class="text-slate-600 dark:text-slate-300 mb-4">A fully responsive e-commerce website with
							product filtering, cart functionality, and secure checkout.</p>
						<a href="#"
							class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-slate-600 transition-colors duration-300">View
							Project</a>
					</div>
				</div>

				<div
					class="project-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50 transform hover:-translate-y-1 duration-300 ease-in-out"
					data-category="mobile">
					<div class="relative">
						<img src="https://placehold.co/600x400" alt="Fitness App" class="w-full h-48 object-cover">
						<div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent opacity-60"></div>
						<span
							class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full">Mobile
							App</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white">Fitness Tracker</h3>
						<p class="text-slate-600 dark:text-slate-300 mb-4">A mobile application that helps users track
							workouts, set goals, and monitor their fitness progress.</p>
						<a href="#"
							class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-slate-600 transition-colors duration-300">View
							Project</a>
					</div>
				</div>

				<div
					class="project-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50 transform hover:-translate-y-1 duration-300 ease-in-out"
					data-category="design">
					<div class="relative">
						<img src="https://placehold.co/600x400" alt="Dashboard Design" class="w-full h-48 object-cover">
						<div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent opacity-60"></div>
						<span
							class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full">UI/UX
							Design</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white">Analytics Dashboard</h3>
						<p class="text-slate-600 dark:text-slate-300 mb-4">A clean and intuitive dashboard design for
							visualizing complex data and analytics.</p>
						<a href="#"
							class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-slate-600 transition-colors duration-300">View
							Project</a>
					</div>
				</div>

				<div
					class="project-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50 transform hover:-translate-y-1 duration-300 ease-in-out"
					data-category="web">
					<div class="relative">
						<img src="https://placehold.co/600x400" alt="Blog Platform" class="w-full h-48 object-cover">
						<div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent opacity-60"></div>
						<span
							class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full">Web
							Development</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white">Content Management System</h3>
						<p class="text-slate-600 dark:text-slate-300 mb-4">A custom CMS built for bloggers with markdown
							support and SEO optimization tools.</p>
						<a href="#"
							class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-slate-600 transition-colors duration-300">View
							Project</a>
					</div>
				</div>

				<div
					class="project-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50 transform hover:-translate-y-1 duration-300 ease-in-out"
					data-category="mobile">
					<div class="relative">
						<img src="https://placehold.co/600x400" alt="Food Delivery App" class="w-full h-48 object-cover">
						<div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent opacity-60"></div>
						<span
							class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full">Mobile
							App</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white">Food Delivery Service</h3>
						<p class="text-slate-600 dark:text-slate-300 mb-4">A mobile app for ordering food from local
							restaurants with real-time delivery tracking.</p>
						<a href="#"
							class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-slate-600 transition-colors duration-300">View
							Project</a>
					</div>
				</div>

				<div
					class="project-card rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50 transform hover:-translate-y-1 duration-300 ease-in-out"
					data-category="design">
					<div class="relative">
						<img src="https://placehold.co/600x400" alt="Brand Identity" class="w-full h-48 object-cover">
						<div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent opacity-60"></div>
						<span
							class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full">UI/UX
							Design</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white">Brand Identity System</h3>
						<p class="text-slate-600 dark:text-slate-300 mb-4">A comprehensive brand identity design
							including logo, color palette, typography, and usage guidelines.</p>
						<a href="#"
							class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-slate-600 transition-colors duration-300">View
							Project</a>
					</div>
				</div>
			</div>
		</div>
	</section>


<!-- </main> -->

<?php
get_footer();
