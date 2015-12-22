<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<article class="article">
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
                    <?php
                        the_title(sprintf('<h3 class="title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');
                    ?>
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
                <a href="#" title="Evénements marquants">
                    <i class="fa fa-file-archive-o"></i>
                    Evénements marquants
                </a>
            </span>
            <span class="comments">
                <i class="fa fa-comment-o"></i>
                <a href="<?php echo get_permalink(); ?>#comment" title="<?php _e('Lire la suite'); ?>" >
                    <?php 
                        $comment = wp_count_comments(get_the_ID());
                        echo $comment->total_comments . ' '; _e('commentaires'); 
                    ?>  
                </a>
            </span>
        </footer>
    </div>
</article>