<?php

declare(strict_types=1);

function register_my_menus(): void
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'extra-menu' => __('Extra Menu')
        )
    );
}

add_action('init', 'register_my_menus');

function getMenu(string $menuName): array
{
    $menu = wp_get_nav_menu_items($menuName);

    foreach ($menu as $childKey => $menuItem) {
        if ($menuItem->menu_item_parent) {
            foreach ($menu as $key => $parrentItem) {
                if ($menuItem->menu_item_parent == $parrentItem->object_id) {
                    $parrentItem->children[] = $menuItem;
                }
            }

            unset($menu[$childKey]);
        }
    }

    return $menu;
}

function getMenuList(string $menuName): string
{
    $menu = getMenu($menuName);

    ob_start();
    foreach ($menu as $menuItem) {
        if (count($menuItem->children) > 0) {
            ?>
            <li class="d-flex menu-dropdown-trigger">
                <?php echo __($menuItem->post_title) ?>
                <img src="<?php echo getImage('menu/dropdown.svg') ?>" alt="Dropdown">
            </li>
            <?php
        } else {
            ?>
            <li><?php echo __($menuItem->post_title) ?></li>
            <?php
        }
    }

    return ob_get_clean();
}