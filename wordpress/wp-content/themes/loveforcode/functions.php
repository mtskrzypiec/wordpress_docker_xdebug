<?php

declare(strict_types=1);

function autoload(string $directory): void
{
    $fileList = array();

    if (is_dir($directory)) {
        $files = scandir($directory);

        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $filePath = $directory . DIRECTORY_SEPARATOR . $file;

                if (is_dir($filePath)) {
                    $subFiles = loadFilesFromDirectory($filePath);
                    $fileList = array_merge($fileList, $subFiles);
                } else {
                    $fileList[] = $filePath;
                }
            }
        }
    }

    foreach ($fileList as $file)
    {
        require_once $file;
    }
}

autoload(__DIR__.'/function');

function enqueue_webpack_scripts(): void {
    $cssFilePath = glob( get_template_directory() . '/assets/css/build/main.min.*.css' );
    $cssFileURI = get_template_directory_uri() . '/assets/css/build/' . basename($cssFilePath[0]);
    wp_enqueue_style( 'main_css', $cssFileURI );

    $jsFilePath = glob( get_template_directory() . '/assets/js/build/main.min.*.js' );
    $jsFileURI = get_template_directory_uri() . '/assets/js/build/' . basename($jsFilePath[0]);
    wp_enqueue_script( 'main_js', $jsFileURI);
}

add_action( 'wp_enqueue_scripts', 'enqueue_webpack_scripts' );

add_theme_support( 'post-thumbnails' );

function wpse121723_register_sidebars() {
    register_sidebar( array(
        'name' => 'Home right sidebar',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpse121723_register_sidebars' );

function custom_template_directory( string $template ): string {
    $custom_template_dir = sprintf("%s/templates", get_template_directory()); // Replace with your custom template directory path

    // Check if the page template exists in the custom template directory
    if ( file_exists( trailingslashit( $custom_template_dir ) . $template ) ) {
        return trailingslashit( $custom_template_dir ) . $template;
    }

    return $template;
}
add_filter( 'page_template', 'custom_template_directory' );

function enqueue_block_assets() {
    wp_enqueue_script(
        'your-plugin-script',
        plugins_url('your-plugin.js', __FILE__),
        array('wp-blocks', 'wp-element')
    );

    wp_enqueue_style(
        'your-plugin-style',
        plugins_url('your-plugin.css', __FILE__),
        array('wp-edit-blocks')
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_block_assets');