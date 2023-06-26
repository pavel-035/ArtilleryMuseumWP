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
 * Template Name: Страница "Публикации"
 */

$args = array(
  'numberposts' => -1,
  'post_type' => 'publications'
);

$publications = get_posts($args);

get_header();
?>
    <main>
        <section class="page publications">
            <div class="publications_box box">
                <h2 class="publications_head page_head">
                  <?php single_post_title(); ?>
                </h2>
                <div class="publications_cards">
                  <? foreach ($publications as $post) { ?>
                    <?php setup_postdata($post); ?>
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
                  <?php } ?>
                  <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();