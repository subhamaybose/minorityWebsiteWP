<?php if ( is_active_sidebar( 'footer' ) ) : ?>
    <div class="footer-top">
		<div class="row">
			<?php dynamic_sidebar( 'footer' ); ?>
			<div class="clear"></div>
		</div>
    </div>
<?php endif; ?>