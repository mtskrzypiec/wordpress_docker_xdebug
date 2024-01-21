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
             <div style="position: sticky; top: 35px">
                 <?php
                 $author = get_user_by('id', $post->post_author);
                 $avatar = get_avatar($author->ID, args: ['class' => ["rounded-circle"]]);
                 ?>
                 <?php echo $avatar ?>
                 <p class="author_name"><?php echo $author->first_name . ' ' . $author->last_name ?></p>
                 <p class="post_date"><?php echo date("d/m/Y", strtotime($post->post_date)) ?></p>
             </div>
         </div>
         <div class="col-md-7">
             <?php
             echo $post->post_content;
             ?>
         </div>
     </div>
 </div>
<?php get_footer(); ?>