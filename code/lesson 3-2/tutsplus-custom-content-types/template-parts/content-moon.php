<?php
/**
 * The template part for displaying content on the moons CPT archive
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php
	//	display the post thumbnail
	if ( has_post_thumbnail() ) {
		
		$attrs = array(
			'class' => 'alignleft',
			'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) ),
			'title' => trim( strip_tags( $attachment->post_title ) )
		);
		
		the_post_thumbnail( 'medium', $attrs );
		
	} ?>

	<div class="entry-content">
			
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentysixteen' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			
			

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
		
		<?php 
		if( is_post_type_archive( 'moon' )) {
			echo get_the_term_list( $post->ID, 'planet', '<p>Orbits <strong>', ',' , '</strong></p>' ); 
		}	
		?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit %s', 'twentysixteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
