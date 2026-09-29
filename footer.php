<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

$getLogotype = get_field('template_settings', 'option');
$getFooter = get_field('footer', 'option');

$arrMenus = array(
  'regulations' => $getFooter['regulations']['menu'],
  'menuFooter' => $getFooter['menu_footer'],
  'socialIcons' => $getFooter['menu_footer'],
)

  ?>

<?php if (!is_page_template(array('templates/template-home-2026.php', 'templates/template-l1-2026.php', 'templates/template-l2-2026.php'))) : ?>
<footer class="bootscore-footer__container">
  <div class="container">
    <div class="bootscore-footer__container__menu">
      <div class="bootscore-footer__container__menu-logotype">
        <?= wp_get_attachment_image($getLogotype['logotype'], 'full', false, array("class" => "bootscore-footer__container__menu-logotype--logo")); ?>
        <ul class="bootscore-footer__container__menu-logotype--menu">
          <?php foreach ($arrMenus['regulations'] as $regulation): ?>
            <li class="bootscore-footer__container__menu-logotype--menu-item"><a
                href="<?= $regulation['link']['url']; ?>"><?= $regulation['link']['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="bootscore-footer__container__flexible">
        <?php
        // Check if the group field exists
        if ($arrMenus && isset($arrMenus['menuFooter'])):
          $form_sections = $arrMenus['menuFooter'];

          // Loop through the flexible content field within the group
          if (is_array($form_sections) && !empty($form_sections)): ?>

            <?php foreach ($form_sections as $section):
              if ($section['acf_fc_layout'] == 'menu'): ?>
                <div class="bootscore-footer__container__flexible--menu">
                  <h5 class="bootscore-footer__container__flexible--menu-name"><?= $section['menu_name']; ?></h5>
                  <ul class="bootscore-footer__container__flexible--menu-list list-margin">
                    <?php foreach ($section['links'] as $item): ?>
                      <li class="bootscore-footer__container__flexible--menu-item">
                        <a href="<?= $item['link']['url']; ?>"><?= $item['link']['title']; ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>

                  <?php if ($section['bolded_links'] && !empty($section['bolded_links'])): ?>
                    <ul class="bootscore-footer__container__flexible--menu-list">
                      <?php foreach ($section['bolded_links'] as $item): ?>
                        <li class="bootscore-footer__container__flexible--menu-item bolded">
                          <a href="<?= $item['link']['url']; ?>"><?= $item['link']['title']; ?></a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>

              <?php elseif ($section['acf_fc_layout'] == 'socials'): ?>
                <div class="bootscore-footer__container__flexible--menu">
                  <h5 class="bootscore-footer__container__flexible--menu-name"><?= $section['name']; ?></h5>
                  <ul class="bootscore-footer__container__flexible__list--icons">
                    <?php foreach ($section['menu'] as $item): ?>
                      <li class="bootscore-footer__container__flexible__list--item">
                        <a class="bootscore-footer__container__flexible__list--icon" href="<?= $item['link']; ?>">
                          <div><?= wp_get_attachment_image($item['icon'], "full"); ?></div>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif;
            endforeach; ?>

          <?php endif;
        endif;
        ?>

      </div>
    </div>

  </div>

  <div class="bootscore-footer__container__info">
    <div class="container">
      <div class="bootscore-footer__container__info--copyright"><span
          class="cr-symbol">&copy;</span>&nbsp;<?= date('Y'); ?>
        <?php bloginfo('name'); ?>
        All rights reserved.
      </div>
    </div>
  </div>

</footer>
<?php endif; ?>

<!-- To top button -->
<a href="#"
  class="<?= apply_filters('bootscore/class/footer/to_top_button', 'btn btn-primary shadow'); ?> position-fixed zi-1000 top-button"><i
    class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>