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
<div class="sidebar">
    <div class="inner">
        <?php if (is_active_sidebar('sidebar-social')) : ?>
                <?php dynamic_sidebar('sidebar-social'); ?>
        <?php endif; ?>
        <?php get_sidebar(); ?>
    </div>
</div>
</main>
</div><!-- .container -->
<footer class="footer">
    <p>Réalisation et référencement par : <a href="#" title="Diabolo Web" class="link-1">Diabolo Web</a>
    </p>
</footer>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/l10n.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/libs.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/script.js"></script>
<?php wp_footer(); ?>

</body>
</html>
