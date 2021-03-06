<?php
/**
 * The Template for displaying all single posts.
 *
 * @package The Thinker Lite
 */
get_header(); ?>
	<div class="page hfeed site">
		<div class="main site-main">
			<div id="primary" class="content-area single">
				<div id="content" class="site-content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
					<?php thinker_content_nav( 'nav-below' ); ?>
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>
				<?php endwhile; // end of the loop. ?>
				</div><!-- #content -->
			</div><!-- #primary -->
		<?php get_sidebar(); ?>
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>