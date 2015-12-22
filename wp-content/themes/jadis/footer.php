<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php if(!is_page()): ?>
<div class="sidebar">
    <div class="inner">
        <?php if (is_active_sidebar('sidebar-social')) : ?>
                <?php dynamic_sidebar('sidebar-social'); ?>
        <?php endif; ?>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php endif; ?>
</main>
</div><!-- .container -->
<footer class="footer">
    <div class="container">
        <?php wp_nav_menu( array( 'menu' => 'footer','container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'footer-menu' ) ); ?>
        <?php $options = get_option('jadis');  ?>
        <p><?php echo $options['gb_adress_footer']; ?> : <a target="_blank" href="<?php echo $options['gb_url_footer']; ?>" title="Diabolo Web" class="link-1">Diabolo Web</a></p>
    </div>
</footer>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/l10n.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/libs.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/script.js"></script>
<?php wp_footer(); ?>

</body>
</html>
