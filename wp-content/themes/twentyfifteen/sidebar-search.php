<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>


<?php if (is_active_sidebar('sidebar-search')) : ?>
    <?php dynamic_sidebar('sidebar-search'); ?>
<?php endif; ?>


