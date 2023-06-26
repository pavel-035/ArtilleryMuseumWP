<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artilleryMuseum
 */

    $timetable = carbon_get_theme_option( 'timetable' );
?>

<footer class="footer">
    <div class="footer_box box">
        <div class="footer_section">
            <div class="footer_map">
                <div
                    style="position:relative; overflow:hidden;"
                >
                    <iframe
                        src="https://yandex.ru/map-widget/v1/?ll=56.310150%2C58.035732&mode=search&oid=1167279844&ol=biz&sctx=ZAAAAAgBEAAaKAoSCaMCJ9vAJ0xAEY20VN6OBE1AEhIJ8fEJ2Xkbaz8R6V%2BSyhRzUD8iBgABAgMEBSgKOABAjK8HSAFqAnJ1nQHNzEw9oAEAqAEAvQGwR%2Ba7wgEL5I3NrATk9bKGyQPqAQDyAQD4AQCCAjDQnNGD0LfQtdC5INC%2F0LXRgNC80YHQutC%2B0Lkg0LDRgNGC0LjQu9C70LXRgNC40LiKAgCSAgCaAgxkZXNrdG9wLW1hcHM%3D&sll=56.310150%2C58.035732&sspn=0.014688%2C0.004458&text=%D0%9C%D1%83%D0%B7%D0%B5%D0%B9%20%D0%BF%D0%B5%D1%80%D0%BC%D1%81%D0%BA%D0%BE%D0%B9%20%D0%B0%D1%80%D1%82%D0%B8%D0%BB%D0%BB%D0%B5%D1%80%D0%B8%D0%B8&z=16.62"
                        width="560"
                        height="400"
                        frameborder="1"
                        allowfullscreen="true"
                        style="position:relative;"
                    ></iframe>
                </div>
            </div>
            <div class="footer_information">
                <div class="footer_navigation">
                  <?php
                  $args = array(
                    'fallback_cb'       => 'wp_page_menu',
                    'container'         => 'ul',
                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'item_spacing'      => 'preserve'
                  );

                  wp_nav_menu( $args ); ?>
                </div>
                <ul class="footer_timetable timetable">
                  <? foreach ($timetable as $item) { ?>
                      <li class="timetable_item">
                        <span><?php echo $item['timetable_day']; ?></span>:
                        <?php if ($item['weakened'] === 'true') :?>
                            Выходной
                        <?php else :?>
                          <?php echo $item['timetable_time_begin_museum']; ?> - <?php echo $item['timetable_time_end_museum']; ?><?php if ($item['lunch'] === 'true') :?>(Обед: <?php echo $item['timetable_lunch_start']; ?> - <?php echo $item['timetable_lunch_end']; ?>)<?php endif; ?>
                        <?php endif; ?>
                      </li>
                  <? }; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/slick/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/gallery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/buyForm.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/main.js"></script>
</body>
</html>
