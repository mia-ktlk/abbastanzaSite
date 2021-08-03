<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ample_Blog
 */

get_header();
?>

<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 content-wrap" id="primary">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h2 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'ample-blog' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h2>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

	          </div>
			 <div class="col-md-4 sidebar-wrap" id="secondary">
			 	<?php get_sidebar(); ?>
			</div> 	
		</div>
	</div>				
				
</div><!-- main-container -->


<?php
get_footer();
