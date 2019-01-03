<?php
if ( ! is_archive() ) {
	return;
}
?>
<div class="row">
	<div class="span9">
    	<div class="aside-block-grey">
        	<div class="headline-blue">
            	<h3>
				<?php echo the_archive_title(); ?>
				</h3>
                <div class="clear"></div>
            </div>