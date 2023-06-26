<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artilleryMuseum
 */

    $main_phone = carbon_get_theme_option( 'main_phone' );
    $main_address = carbon_get_theme_option( 'main_address' );
    $main_heading = carbon_get_theme_option( 'main_heading' );
    $main_logo = wp_get_attachment_image_url( carbon_get_theme_option('main_logo'), 'full' );

    $social_networks = carbon_get_theme_option( 'social_networks' );
    $main_info = carbon_get_theme_option( 'main_info' );
    $main_warning = carbon_get_theme_option( 'main_warning' );
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>МУЗЕЙ ПЕРМСКОЙ АРТИЛЛЕРИИ</title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/src/styles/main.css">
    
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/js/slick/slick/slick.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/js/slick/slick/slick-theme.css">
</head>

<body>
    <header class="header">
        <div class="header_box box">
            <div class="header_banner banner">
                <div class="banner_section">
                    <div class="banner_description">
                        <div class="banner_logo img_box">
                            <a href="<?php echo get_option('home'); ?>/">
                                <img src="<?php echo $main_logo; ?>" alt="logo">
                            </a>
                        </div>

                        <div>
                            <h1 class="banner_head">
                              <?= $main_heading; ?>
                            </h1>
                            <span class="banner_address">
                              <?= $main_address; ?>
                            </span>
                        </div>
                    </div>
                    <div class="banner_nav">
                        <ul class="banner_social">
                          <? foreach ($social_networks as $item) { ?>
                              <li class="banner_link">
                                  <a
                                    href="<?php echo $item['social_network_link']; ?>"
                                    class="banner_icon img_box"
                                    target="_blank"
                                  >
                                      <img src="<?= wp_get_attachment_image_url( $item['social_network_icon'], 'full' ); ?>" alt="link">
                                  </a>
                              </li>
                          <? }; ?>
                        </ul>
                        <div class="banner_buttons">
                            <button
                                class="banner_button"
                                onclick="showBuyForm(true)"
                            >
                                купить билет
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="header_info info">
                <li class="info_item">
                    <a
                        class="info_link"
                        href="tel:<?= $main_phone; ?>"
                    >
                        телефон <?= $main_phone; ?>
                    </a>
                </li>
                <li class="info_item">
                    <span
                        class="info_link"
                        onclick="showBuyForm(true)"
                    >
                        заказ экскурсий
                    </span>
                </li>
                <li class="info_item">
                    <p>
                      <?= $main_info; ?>
                    </p>
                </li>
                <li class="info_item info_item-warning">
                    <p>
                      <?= $main_warning; ?>
                    </p>
                </li>
            </ul>
        </div>
    </header>

    <section class="navigation">
      <?php
      $args = array(
        'menu_class'        => 'navigation_box box',
        'container'         => 'ul',
        'fallback_cb'       => 'wp_page_menu',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'      => 'preserve'
      );

      wp_nav_menu( $args ); ?>
    </section>

    <div id="buy_form" class="buy modal">
        <button
            class="modal_close"
            onclick="showBuyForm(false)"
        >
            <img src="<?php bloginfo('template_directory') ?>/src/icons/x.svg" alt="close">
        </button>
        <div class="buy_box">
            <div class="buy_label">
                Введите номер телефона, и ожидайте звонка
            </div>
            <input
                class="buy_input"
                type="text"
                placeholder="тел.:"
            >
            <button
                class="buy_button"
                onclick="showBuyForm(false)"
            >
                отправить
            </button>
        </div>
    </div>
