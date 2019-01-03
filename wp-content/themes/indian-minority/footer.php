	<?php if( is_front_page() ){?>
		</div>
	</div>
	<div class="span3">
			<?php get_sidebar( 'right' ); ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php }else{ ?>
		</div>
    </div>
	<div class="span3">
		<?php if ( is_category('Opinions') || ( is_single() && in_category('Opinions') ) ) {
			get_sidebar('opinion');
		}else if( is_category('COUNTERACT: Majority Perception') || ( is_single() && in_category('COUNTERACT: Majority Perception') ) ){
			get_sidebar('counteract');
		}else if( is_category('People In News') || ( is_single() && in_category('People In News') ) ){
			get_sidebar('news');
		}else if( is_category(24) || ( is_single() && in_category(24) ) ){
			get_sidebar('art');
		}else if( is_category('Features') || ( is_single() && in_category('Features') ) ){
			get_sidebar('features');
		}else if( is_category('Blog') || ( is_single() && in_category('Blog') ) ){
			get_sidebar('blog');
		}else if( is_category('Hot Topic') || ( is_single() && in_category('Hot Topic') ) ){
			get_sidebar('topic');
		}else{
			get_sidebar('default');
		}
		 ?>
	</div>
	<div class="clear"></div>
	</div>
    <?php } ?>
	<div class="clear"></div>
	</div>
	<div class="footer">
		<?php get_sidebar( 'footer' ); ?>
		<div class="footer-bottom">
            <div class="row">
                <div class="span6">
                    <?php if ( has_nav_menu( 'footer' ) ) : ?>
							<?php get_template_part( 'menu', 'footer' ); ?>
					<?php endif; ?>
					<div class="clear"></div>
                </div>
                <div class="span6">
                    <p class="copyright">&copy; <script type="text/JavaScript"> var theDate=new Date(); document.write(theDate.getFullYear()); </script>, All Rights Reserved | <span>The Indian Minority</span></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
	<?php wp_footer(); ?>
	</body>
</html>