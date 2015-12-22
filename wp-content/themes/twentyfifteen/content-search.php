<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$category = get_the_category();
?>
<div class="inner">
        <div class="group">
            <div class="image">	
                <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                    <?php
                    the_post_thumbnail('post-thumbnail', array('alt' => get_the_title()));
                    ?>
                </a>
            </div>
            <div class="desc">
                <header class="article-header">
                    <h1 class="title">
                        <?php
                            the_title();
                        ?>
                    </h1>
                </header>
                <div class="article-content">
                    <div class="desc">
                        <?php
                            the_content();
                        ?>
                    </div>
                    <a href="<?php echo get_permalink(); ?>" title="<?php _e('Lire la suite'); ?>" class="button-1"><?php _e('Lire la suite'); ?></a>
                </div>
            </div>
        </div>
        <footer class="article-footer">
            <span class="date">
                <a href="#" title="7 octobre 2014">
                    <i class="fa fa-calendar"></i>
                    <?php the_time('j F Y'); ?>
                </a>
            </span>
            <span class="author">
                <a href="#" title="Auteur">
                    <i class="fa fa-user"></i>
                    <?php
                    $author = get_the_author();
                    echo $author;
                    ?>
                </a>
            </span>
            <span class="event">
                <a href="<?php echo get_category_link($category[0]->term_id); ?>" title="<?php echo $category[0]->name; ?>">
                    <i class="fa fa-file-archive-o"></i>
                    <?php echo $category[0]->name; ?>
                </a>
            </span>
            <span class="comments">
                <i class="fa fa-comment-o"></i>
               <?php 
                    $comment = wp_count_comments(get_the_ID());
                    echo $comment->total_comments . ' '; _e('commentaires'); 
                ?>  
            </span>
        </footer>
    </div>
</article>
