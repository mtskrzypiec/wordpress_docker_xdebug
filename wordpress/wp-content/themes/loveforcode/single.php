<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
 
get_header(); ?>
 
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
 
        <?php
            $post = get_post();

            echo $post->post_content;
        ?>
 
        </main><!-- .site-main -->
    </div><!-- .content-area -->
 
<?php get_footer(); ?>