<?php get_header(); ?>
	<div class="row">
		<div class="span9">
		<div class="aside-block-grey">
			<div class="entry inner1">
				<article>
					<div class="post-padding-container">
						<div class='post-header'>
							<h1 class='post-title'><?php esc_html_e('404: Page Not Found', 'im-minority'); ?></h1>
						</div>
						<div class="post-content">
							<p><?php esc_html_e('Sorry, we couldn\'t find a page at this URL', 'im-minority' ); ?></p>
							<p><a class="btn" href="<?php echo get_home_url(); ?>">Go Back to Home Page</a></p>
							<?php //get_search_form(); ?>
						</div>
					</div>
				</article>
			</div>
<?php get_footer(); ?>