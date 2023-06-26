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
 * Template Name: Страница "Публикация"
 * Template Post Type: publications
 */

$publications = get_queried_object();
$publications_id = $publications->ID;

$previous_post = get_previous_post();
$next_post = get_next_post();

get_header();
?>
    <main>
        <div id="gallery_modal" class="gallery-modal">
            <button
                class="gallery-modal_close"
                onclick="showGalleryModal(false)"
            >
                <img src="<?php bloginfo('template_directory') ?>/src/icons/x.svg" alt="close">
            </button>
            <div id="media_slider" class="gallery-modal_box box">
              <? foreach (get_field('publications_media_image', $publications_id) as $item) { ?>
                  <div class="gallery-modal_item">
                      <div class="gallery-modal_image">
                          <img src="<?php echo $item; ?>" alt="image">
                      </div>
                  </div>
              <?php } ?>
            </div>
        </div>

        <section class="single-publications post page">
            <div class="single-publications_box">
                <h2 class="single-publications_head box page_head">
                  <?php single_post_title(); ?>
                </h2>
                <pre class="single-publications_description post_description box">
                  <?= get_field('publications_description', $publications_id); ?>
                </pre>

                <div class="single-publications_gallery gallery">
                    <div class="gallery_box box">
                      <? foreach (get_field('publications_media_image', $publications_id) as $key => $value) { ?>
                          <div
                              class="gallery_item"
                              onclick="showGalleryModal(true, <?php echo $key; ?>)"
                          >
                              <div class="gallery_image img_box">
                                  <img src="<?php echo $value; ?>" alt="image">
                              </div>
                          </div>
                      <?php } ?>
                    </div>
                </div>

                <div class="single-publications_navigation post-navigation box">
                    <div class="post-navigation_section">
                      <?php if ($previous_post) : ?>
                          <a href="<?= get_permalink($previous_post->ID); ?>">
                              Предыдущая новость: <?= $previous_post->post_title; ?>
                          </a>
                      <?php endif; ?>
                    </div>
                    <div class="post-navigation_section">
                      <?php if ($next_post) : ?>
                          <a href="<?= get_permalink($next_post->ID); ?>">
                              Следующая новость: <?= $next_post->post_title; ?>
                          </a>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();