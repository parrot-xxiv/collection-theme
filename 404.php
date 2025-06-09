<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Collection_Theme
 */

get_header('empty');
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<div class="min-h-screen bg-slate-900 flex items-center justify-center px-6">
			<div class="text-center max-w-md">
				<h1 class="text-7xl font-extrabold text-teal-500 mb-4">404</h1>
				<h2 class="text-2xl md:text-3xl font-semibold text-white mb-2">Page Not Found</h2>
				<p class="text-slate-400 mb-6">
					Sorry, the page you are looking for doesn't exist or has been moved.
				</p>
				<a href="/"
					class="inline-block px-6 py-3 bg-teal-500 text-slate-900 font-semibold rounded hover:bg-teal-400 transition">
					Go Home
				</a>
			</div>
		</div>

	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer('empty');
