<?php
/**
 * The template part for displaying single posts of the moon post type
 *
 * taken from twenty sixteen (parent) and edited
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' != get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->
	
	<aside class="moons-meta">
		<h3>Data on <?php the_title(); ?></h3>
		
		<!--define metadata variables -->
		<?php
		$differentiated = get_post_meta( $post->ID, 'tutsplus_differentiated', true );
		if ( $differentiated = 'checked' ) {
			$output = 'is';
		}
		else {
			$output = 'is not';
		}
		
		$diameter = get_post_meta( $post->ID, 'Diameter (km)', true );
		?>
		<!-- list of metadata -->
		<ul>
			<li><?php the_title(); ?> <?php echo $output; ?> differentiated.</li>
			<li><?php the_title(); ?> has a diameter of <?php echo $diameter; ?>km.</li>
			<?php echo get_the_term_list( $post->ID, 'planet', '<li>Orbits <strong>', ',' , '</strong></li>' ); ?>
		</ul>
	</aside>

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
