<?php
/**
 * Index du blog
 */
?>


<?php
if ( !is_paged() ) { ?>
	<div class="post-container">
 <?php } else { ?>
	<div class="fukol-grid">
 <?php } ?>

<?php // Début de la boucle
	
	while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

	<?php // Image mise en avant
		
		if( $wp_query->current_post == 0 ) :
			$size = "full";
			else :
			$size = "large";
		endif;
	   
		$featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id(), $size, true);

		if (get_field( "image_focal" )) {
			$focal_point = get_field( "image_focal" );
			$position = "style=\"object-position:" . ($focal_point['focal_point']['left'] * 100) . "% " . ($focal_point['focal_point']['top'] * 100) . "%\"";
		} elseif (get_post_meta($post->ID, 'position', true)) {
			$position = "style=\"object-position:" . get_post_meta($post->ID, 'position', true) . "\"";
		} else {
			$position = false;
		}

	?>		
	
		<article id="post-<?php the_ID(); ?>" class="post">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Lien direct vers %s', 'autofocus' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<img src="<?php echo $featuredImage[0]; ?>" <?php if( $position ) { echo $position; } ?>> 
				<header><h2 class="post-title"><?php the_title(); ?></h2></header>
			</a>
		</article><!-- #post-## -->

<?php endwhile; // Fin de la boucle ?>
</div>

<nav id="nav-below" class="navigation bas">
	<?php if ( !is_paged() ) { ?>
		<div class="nav-home nav-next"><a href="https://voiretmanger.fr/page/2/">Les articles suivants</a></div>
	<?php }
	
	else { ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Avant', 'autofocus' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Après <span class="meta-nav">&rarr;</span>', 'autofocus' ) ); ?></div>
	<?php } ?>
</nav><!-- #nav-below -->

<div style="display:none;">

<?php
	  //You will probably want to wrap this in a div and hide it from your users. 
		the_posts_pagination( array(
			'mid_size' => 2,
			'prev_text' => __( '<i class="fa fa-angle-double-left"></i>', 'textdomain' ),
			'next_text' => __( '<i class="fa fa-angle-double-right"></i>', 'textdomain' ),
		));
?>
</div>