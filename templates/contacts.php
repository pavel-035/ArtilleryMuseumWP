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
 * Template Name: Страница "О музее"
 */

$main_phone = carbon_get_theme_option('main_phone');
$main_address = carbon_get_theme_option('main_address');
$main_fax = carbon_get_theme_option('main_fax');
$main_email = carbon_get_theme_option('main_email');

$timetable = carbon_get_theme_option( 'timetable' );

get_header();
?>
    <main>
        <section class="page information">
            <div class="information_box box">
                <h2 class="information_head page_head">
                  <?php single_post_title(); ?>
                </h2>
                <ul class="information_timetable timetable">
                  <? foreach ($timetable as $item) { ?>
                      <li class="timetable_item">
                          <span><?php echo $item['timetable_day']; ?></span>:
                        <?php if ($item['weakened'] === 'true') : ?>
                            Выходной
                        <?php else : ?>
                          <?php echo $item['timetable_time_begin_museum']; ?> - <?php echo $item['timetable_time_end_museum']; ?><?php if ($item['lunch'] === 'true') : ?>(Обед: <?php echo $item['timetable_lunch_start']; ?> - <?php echo $item['timetable_lunch_end']; ?>)<?php endif; ?>
                        <?php endif; ?>
                      </li>
                  <? }; ?>
                </ul>
                <div>
                  <?php if ($main_address) : ?>
                      <div class="information_item">
                          Адрес: <?= $main_address ?>
                      </div>
                  <?php endif; ?>
                  <?php if ($main_phone) : ?>
                      <div class="information_item">
                          Тел.: <?= $main_phone ?>
                      </div>
                  <?php endif; ?>
                  <?php if ($main_fax) : ?>
                      <div class="information_item">
                          Факс: <?= $main_fax ?>
                      </div>
                  <?php endif; ?>
                  <?php if ($main_email) : ?>
                      <div class="information_item">
                          Е-mail: <?= $main_email ?>
                      </div>
                  <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();