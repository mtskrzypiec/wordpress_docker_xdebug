<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$post = get_post();
the_post();
get_header(); ?>
 <div class="container mt-6">
     <div id="primary" class="row">
         <!--        <main id="main" class="site-main" role="main">-->
         <div class="col-lg-12">
             <h1 class="heading-size"><?php echo $post->post_title ?></h1>
             <figure class="post_main_image">
                 <?php
                    $img = get_the_post_thumbnail($post);
                 ?>
                <img src="<?php echo $img ?>" alt="Test">
             </figure>
         </div>
     </div>

     <div class="row post-single-content">
         <div class="post-single-sitebar">
             <?php
                $authorName = get_the_author();
                $avatar = get_the_author_meta();
             ?>
             <p><?php echo $authorName?></p>
         </div>
         <div class="col-md-7">
             <?php
             echo $post->post_content;
             ?>
         </div>
     </div>
 </div>
<?php get_footer(); ?>