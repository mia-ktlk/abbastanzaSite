<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog Mag
 */

get_header();
?>
	 <!-- .main-container start -->

            <div class="col-md-8 content-wrap" id="primary">
               <div id="masonry-loop">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h2 class="page-title">', '</h2>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile; ?>
                    </div>	
				<?php	the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</div>	
			    
			    <div class="col-md-4 sidebar-wrap" id="secondary">
                
                 <?php  get_sidebar(); ?>
               

                </div>  
	
<?php
get_footer();
