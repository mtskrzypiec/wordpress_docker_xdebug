<?php

declare(strict_types=1);

get_header();

?>
    <div class="container">
<?php

$the_query = new WP_Query(['s' => get_search_query()]);

if ($the_query->have_posts()) {
    ?>
    <h2 style="font-weight:bold;color:#000">
        <?php printf(__('Search Results for: %s', 'text_domain'), get_query_var('s')); ?>
    </h2>
    <ul>
        <?php
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $post = get_post();
            ?>
            <li>
                <div class="row">
                    <div class="col-md-7 post_desc">
                        <a href="<?php echo get_permalink($post) ?>">
                            <h2 class="main_page_post_title"><?php echo $post->post_title ?></h2>
                            <?php // TODO: ADD ACF FOR TIME READING  ?>
                            <p class="post_info"><?php echo date("d/m/Y", strtotime($post->post_date)) ?></p>
                        </a>
                    </div>
                    <div class="col-md-5">
                        <figure class="post_image">
                            <img src="<?php echo get_the_post_thumbnail($post) ? get_the_post_thumbnail($post) : "https://images.unsplash.com/photo-1619118884592-11b151f1ae11" ?>" alt="">
                        </figure>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
} else {
    ?>
    <h2 style="font-weight:bold;color:#000"><?php _e('Nothing Found', 'text_domain'); ?></h2>
    <div class="alert alert-info">
        <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'text_domain'); ?></p>
    </div>
    <?php
}
?>
    </div>
<?php
get_footer();

