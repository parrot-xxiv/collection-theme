<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Collection_Theme
 */

?>
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
						<div id="theme-toggle"
							class="relative w-12 h-6 mr-4 md:ml-4 rounded-full bg-slate-300/20 dark:bg-slate-800/60 cursor-pointer transition-all duration-500 overflow-hidden">
							<!-- Toggle knob -->
							<div class="absolute top-[2px] left-[2px] w-5 h-5 bg-slate-50 dark:bg-slate-900 rounded-full shadow-sm transition-all duration-500 dark:translate-x-6"></div>
							<!-- Sun Icon -->
							<span
								class="absolute top-1 left-1 w-4 h-4 text-yellow-500 opacity-100 dark:opacity-0 transition-opacity duration-500">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
									<path
										d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
								</svg>
							</span>
							<!-- Moon Icon -->
							<span
								class="absolute top-1 right-1 w-4 h-4 text-blue-500 opacity-0 dark:opacity-100 transition-opacity duration-500">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
									<path
										fill-rule="evenodd"
										d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"
										clip-rule="evenodd" />
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