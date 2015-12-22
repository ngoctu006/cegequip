<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>
<div class="desc-text">
    <h2 class="heading">Qui est l’anniversaire du jour ?</h2>
    <div class="desc">
        <p>Fan d’une célébrité ou tout simplement avide de culture générale ? Découvrez notre blog qui met à l’honneur tous les anniversaires : anniversaire de célébrité, dates historiques ou événements marquants.</p>
        <p>Et puisque nous sommes à la page en matière d’anniversaire, nous vous avons déniché tout un tas d’idées cadeaux pour les anniversaires de vos proches et même des cadeaux de naissance !</p>
    </div>
</div>
<div class="content">
    <?php if (have_posts()) : ?>
        <?php
        // Start the loop.
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
</div><!-- .content-area -->

<?php get_footer(); ?>
