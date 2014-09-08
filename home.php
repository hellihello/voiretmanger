<?php

get_header(); ?>

		<div id="container" class="<?php af_layout_class(); ?>">
			<div id="content" role="main">
			
			<?php 
			// Start the main loop 
		    global $paged, $more, $shortname;
			$more = 0;
		    
			$af_blog_category = of_get_option( $shortname . '_blog_cat' );
		
			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'showposts' => get_option('posts_per_page'),
				'category__not_in' => array( $af_blog_category ),
				'ignore_sticky_posts' => 1,
				'paged' => $paged
			)); 

			/* 
			 * Run the loop to output the autofocus loop.
			 * If you want to overload this in a child theme then include a file
			 * called loop-autofocus.php and that will be used instead.
			 */
			get_template_part( 'content', 'index' );
			?>
			
			</div><!-- #content -->
			
			
		</div><!-- #container -->
					

<?php get_footer(); ?>