<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>



<?php if (have_posts()) : ?>

        <div class="desc-text">
            <h1 class="heading"> <?php  echo single_cat_title( '', false ); ?> </h1>
            <?php
                the_archive_description('<div class="desc">', '</div>');
            ?>
        </div><!-- .page-header -->
        <div class="content">
        <?php
        // Start the Loop.
        while (have_posts()) : the_post();
            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part('content', get_post_format());

        // End the loop.
        endwhile;

        // Previous/next page navigation.
        the_posts_pagination(array(
             'prev_text' => __('<i class="fa fa-angle-left"></i>' . 'Précédent', 'twentyfifteen'),
             'next_text' => __('Suivant' . '<i class="fa fa-angle-right"></i>', 'twentyfifteen'),
         ));
    // If no content, include the "No posts found" template.
    else :
        get_template_part('content', 'none');

    endif;
    ?>

</div>

<?php get_footer(); ?>
