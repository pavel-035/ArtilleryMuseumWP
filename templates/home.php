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
 * Template Name: Страница "Главная"
 */

$argsNews = array(
  'numberposts' => -1,
  'post_type' => 'news'
);

$news = get_posts($argsNews);

$argsPublications = array(
  'numberposts' => -1,
  'post_type' => 'publications'
);

$publications = get_posts($argsPublications);

get_header();
?>
    <main>
        <section class="page home">
            <div class="home_box box">
                <div id="publications_slider" class="publications_cards">
                  <? foreach ($publications as $post) { ?>
                    <?php setup_postdata($post); ?>
                      <div>
                          <a href="<?= get_post_permalink(); ?>" class="publications_card">
                              <div class="publications_info">
                                  <h3 class="publications_title">
                                    <?= get_field('publications_title') ?>
                                  </h3>
                                  <p class="publications_description">
                                    <?= get_field('publications_short_description') ?>
                                  </p>
                              </div>
                              <div class="publications_image img_box">
                                  <img src="<?= get_field('publications_main_image') ?>" alt="">
                              </div>
                          </a>
                      </div>
                  <?php } ?>
                  <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                </div>
                <div class="news_cards">
                  <? foreach ($news as $post) { ?>
                    <?php setup_postdata($post); ?>
                      <a href="<?= get_post_permalink(); ?>" class="news_card">
                          <div class="news_title">
                            <?= get_field('news_title') ?>
                          </div>
                          <div class="news_image img_box">
                              <div
                                      class="news_image-before"
                                      style="background-image: url(<?= get_field('news_main_image') ?>)"
                              ></div>
                              <img src="<?= get_field('news_main_image') ?>" alt="">
                          </div>
                          <div class="news_date">
                            <?= get_field('news_date') ?>
                          </div>
                      </a>
                  <?php } ?>
                  <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();