

<!doctype html>
<html <?php language_attributes(); ?> data-theme="light">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

</head>

<body <?php body_class('min-h-screen bg-pattern bg-slate-200 dark:bg-slate-900 transition-colors'); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'collection-theme'); ?></a>
		<nav class="text-white fixed w-full z-50 bg-slate-900/80 dark:bg-slate-950/80 backdrop-blur-sm transition-all duration-500">
			<div class="container mx-auto px-4 py-4">
				<div class="flex justify-between items-center">
					<a href="/" class="text-xl font-bold flex items-center">
						<span class="text-primary mr-2">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
								stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
							</svg>
						</span>
						WordPress Collections
					</a>
					<div class="flex">
						<!-- <div class="hidden md:flex items-center space-x-8">
							<ul class="flex space-x-8">
								<li><a href="#" class="hover:text-primary transition-colors">Home</a></li>
								<li><a href="#projects" class="hover:text-primary transition-colors">Projects</a></li>
							</ul>
						</div> -->
							<div id="theme-toggle" class="relative w-12 h-6 mr-4 md:ml-4 rounded-full bg-slate-300/20 dark:bg-slate-800/60 cursor-pointer transition-all duration-500 overflow-hidden flex items-center px-0.5">
								<!-- Toggle knob -->
								<div
									class="w-5 h-5 bg-slate-50 dark:bg-slate-900 rounded-full shadow-sm transition-transform duration-500 ease-in-out transform
										translate-x-0 dark:translate-x-6"></div>

								<!-- Sun Icon -->
								<span
									class="absolute top-1 left-1 w-4 h-4 text-yellow-500 transition-opacity duration-500 opacity-100 dark:opacity-0 z-10">
									<!-- Sun SVG -->
									<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-full h-full">
									<path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
									</svg>
								</span>

								<!-- Moon Icon -->
								<span
									class="absolute top-1 right-1 w-4 h-4 text-blue-500 transition-opacity duration-500 opacity-0 dark:opacity-100 z-10">
									<!-- Moon SVG -->
									<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-full h-full">
									<path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd" />
									</svg>
								</span>
							</div>
						<!-- Menu Toggle -->
						<!-- <div class="md:hidden flex items-center space-x-4 cursor-pointer">
							<button id="menu-toggle" class="focus:outline-none">
								<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M4 6h16M4 12h16M4 18h16"></path>
								</svg>
							</button>
						</div> -->
					</div>
				</div>
				<!-- <div id="mobile-menu" class="md:hidden hidden mt-3">
					<ul class="flex flex-col space-y-3 py-3">
						<li><a href="#" class="block hover:text-teal-500 transition-colors">Home</a></li>
						<li><a href="#projects" class="block hover:text-teal-500 transition-colors">Projects</a></li>
					</ul>
				</div> -->
			</div>
		</nav>
		<header id="masthead" class="site-header pt-32 pb-20 bg-gradient-to-b from-teal-700 to-slate-800 text-white relative overflow-hidden">
			<div
				class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg xmlns=\" http://www.w3.org/2000/svg\" width=\"60\" height=\"60\" viewBox=\"0 0 60 60\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%230f766e\" fill-opacity=\"0.2\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30">
			</div>
			<div class="container mx-auto px-4 text-center relative z-10">
				<h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">My <span
						class="text-teal-400">WordPress</span> Collections
				</h1>
				<p class="text-xl max-w-2xl mx-auto text-slate-300 drop-shadow-md">A selection of some of my work and projects.
					Feel free to browse and see the kinds of things I’ve been working on.</p>
				<div class="mt-10">
					<a href="#projects"
						class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-8 rounded-full transition-all duration-300 inline-flex items-center transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
						View Projects
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd"
								d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
								clip-rule="evenodd" />
						</svg>
					</a>
				</div>
			</div>
		</header><!-- #masthead -->

<main id="primary" class="site-main">
	<!-- Filter Section -->
	<!-- <section class="py-8 bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm shadow-inner">
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
	</section> -->

	<section id="projects" class="py-16">
		<div class="container mx-auto px-4">
			<h2
				class="text-3xl font-bold text-slate-800 dark:text-white text-center mb-16 relative drop-shadow-md">
				<span class="relative z-10">All Projects</span>
				<span
					class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-teal-500 rounded-full"></span>
			</h2>

			<div class="projects-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php
				$pages = get_option('frontend_settings_pages', []);

				if (empty($pages)) {
					return;
				}

				foreach ($pages as $page_id) {
					// Get page data
					$title = get_the_title($page_id);
					$link = get_permalink($page_id);
					$excerpt = get_the_excerpt($page_id);
					$image_id = get_post_meta($page_id, '_page_image_id', true);
					$image_url = $image_id
					? wp_get_attachment_image_url($image_id, 'large')
					: get_template_directory_uri() . '/assets/default-thumbnail.png';

				?>
						<div
							class="project-card group rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50"
							data-category="web">

							<div class="relative overflow-hidden">
								<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>"
									class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">

								<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

								<span
									class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full transition-all duration-300 group-hover:scale-105">
									Web Development
								</span>
							</div>

							<div class="p-6 transition-colors duration-300 group-hover:bg-white/40 dark:group-hover:bg-slate-800/40">
								<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white group-hover:text-teal-600 transition-colors">
									<?php echo esc_html($title); ?>
								</h3>
								<p class="text-slate-600 dark:text-slate-300 mb-4">
									<?php echo esc_html($excerpt); ?>
								</p>
								<a href="<?php echo esc_url($link); ?>"
									class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-teal-600 transition-colors duration-300">
									View Project
								</a>
							</div>
						</div>
						<?php
				}
				?>
				<div
					class="project-card group rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 bg-white/30 dark:bg-slate-800/30 backdrop-blur-md border border-slate-200/50 dark:border-slate-700/50 transform ease-in-out"
					data-category="web">

					<div class="relative overflow-hidden">
						<img src="https://placehold.co/600x400" alt="Placeholder"
							class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">

						<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

						<span
							class="absolute bottom-4 left-4 inline-block bg-teal-500 bg-opacity-90 text-white text-xs px-3 py-1 rounded-full transition-all duration-300 group-hover:scale-105">
							Tag
						</span>
					</div>

					<div class="p-6 transition-colors duration-300 group-hover:bg-white/40 dark:group-hover:bg-slate-800/40">
						<h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white group-hover:text-teal-600 transition-colors">
							Project Title
						</h3>
						<p class="text-slate-600 dark:text-slate-300 mb-4">
							Work in Progress
						</p>
						<a href="#"
							class="inline-block bg-slate-700 text-white px-4 py-2 rounded-lg hover:bg-teal-600 transition-colors duration-300">
							View Project
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>


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

</body>

</html>

