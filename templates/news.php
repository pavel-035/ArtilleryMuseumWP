<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package artilleryMuseum
 * Template Name: Страница "Новости"
 */

$news = carbon_get_theme_option('news');

get_header();
?>
  <main>
    <section class="page news">
      <div class="news_box box">
        <h2 class="news_head page_head">
          <?php single_post_title(); ?>
        </h2>
        <div class="news_cards">
          <? foreach ($news as $item) { ?>
              <a href="#" class="news_card">
                  <div class="news_title">
                    <?php echo $item['news_title']; ?>
                  </div>
                  <div class="news_image img_box">
                      <div
                        class="news_image-before"
                        style="background-image: url(<?= wp_get_attachment_image_url( $item['news_main_image'], 'full' ); ?>)"
                      ></div>
                      <img src="<?= wp_get_attachment_image_url( $item['news_main_image'], 'full' ); ?>" alt="">
                  </div>
                  <div class="news_date">
                    <?php echo $item['news_date']; ?>
                  </div>
              </a>
          <? }; ?>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();