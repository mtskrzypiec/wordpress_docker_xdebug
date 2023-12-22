<?php
/*
 * Template Name: MainPageTemplate
 */

declare(strict_types=1);

get_header();
?>

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <figure class="main_image">
                <img src="<?php echo getImage("img.png") ?>" alt="IT">
            </figure>
        </div>
        <div class="col-md-7 main-about">
            <div style="position: sticky">
                <h1>Hey there ✌️ I'm Solo, a minimal personal theme for Ghost</h1>
                <p>Showcase your work to your growing audience. Readers can subscribe below to receive the latest posts
                    directly in their inbox 👇</p>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 mt-5">
                <ul class="list-unstyled">
                    <?php
                    $posts = get_posts();

                    foreach ($posts as $post) {
                        ?>
                        <li>
                            <div class="row">
                                <div class="col-md-7 post_desc">
                                    <a href="<?php echo get_permalink($post) ?>">
                                        <h2 class="main_page_post_title"><?php echo $post->post_title ?></h2>
                                        <?php // TODO: ADD ACF FOR TIME READING  ?>
                                        <p class="post_info">Aug 28, 2022 1 min read</p>
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <figure class="post_image">
                                        <img src="https://images.unsplash.com/photo-1619118884592-11b151f1ae11" alt="">
                                    </figure>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

<?php
get_footer();
