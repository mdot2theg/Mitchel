<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Thinker Lite
 */
get_header(); ?>
	<div class="page hfeed site center">
		<div class="main site-main archive">
			<div class="c-pass">
			<div class="f-center">
				<span class="pass-small red"></span>
				<span class="pass-small purple"></span>
				<span class="pass-small blue"></span>
				<span class="pass-small green"></span>
				<span class="pass-small yellow"></span>
			</div>
			</div>
			<?php if ( have_posts() ) : ?>
				<h1 class="page-title">
				<?php
					if ( is_category() ) :
						single_cat_title();
					elseif ( is_tag() ) :
						single_tag_title();
					elseif ( is_author() ) :
						printf( esc_html__( 'Author: %s', 'the-thinker-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
					elseif ( is_day() ) :
						printf( esc_html__( 'Day: %s', 'the-thinker-lite' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( esc_html__( 'Month: %s', 'the-thinker-lite' ), '<span>' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'the-thinker-lite' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( esc_html__( 'Year: %s', 'the-thinker-lite' ), '<span>' . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'the-thinker-lite' ) ) . '</span>' );
					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						esc_html_e( 'Asides', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						esc_html_e( 'Galleries', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						esc_html_e( 'Images', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						esc_html_e( 'Videos', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						esc_html_e( 'Quotes', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						esc_html_e( 'Links', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
						esc_html_e( 'Statuses', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
						esc_html_e( 'Audios', 'the-thinker-lite' );
					elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
						esc_html_e( 'Chats', 'the-thinker-lite' );
					else :
						esc_html_e( 'Archives', 'the-thinker-lite' );
					endif;
				?>
				</h1>
				<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</div><!-- #main -->
	</div><!-- .page -->
	<div class="page layout hfeed site defaulttemplate">
		<div class="main site-main">
			<section id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
				<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>
					<?php endwhile; ?>
					<?php thinker_content_nav( 'nav-below' ); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
				</div><!-- #content -->
			</section><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>