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
 * Template Name: Страница "Новость"
 * Template Post Type: news
 */

$news = get_queried_object();
$news_id = $news->ID;

$previous_post = get_previous_post();
$next_post = get_next_post();

get_header();
?>
    <main>
        <section class="page single-news">
            <div class="single-news_box box">
                <h2 class="single-news_head page_head">
                  <?php single_post_title(); ?>
                </h2>
                <pre class="single-news_description post_description">
                  <?= get_field('news_description', $news_id); ?>
                </pre>
                <div class="single-news_navigation post-navigation">
                    <div>
                      <?php if ($previous_post) : ?>
                          <a href="<?= get_permalink($previous_post->ID); ?>">
                            Предыдущая новость: <?= $previous_post->post_title; ?>
                          </a>
                      <?php endif; ?>
                    </div>
                    <div>
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