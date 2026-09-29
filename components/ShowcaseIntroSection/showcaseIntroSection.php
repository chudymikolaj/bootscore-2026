<?php

function ShowcaseIntroSection($arrShowcase)
{
  $header = $arrShowcase['header'];
  $background = $arrShowcase['background'];
  $descriptionBelow = $arrShowcase['descriptionBelow'];
  $contactForm = $arrShowcase['contact_form'];
  ?>

  <div class="Showcase-intro-section__container">
    <div class="container">
      <div class="Showcase-intro-section__container__wrapper">
        <div class="Showcase-intro-section__container__header">
          <h1 class="Showcase-intro-section__container__header--title"><?= $header['title']; ?></h1>

          <?php if ($header['subtitle'] && !empty($header['subtitle'])): ?>
            <h5 class="Showcase-intro-section__container__header--subtitle"><?= $header['subtitle']; ?></h5>
          <?php endif; ?>

          <div class="Showcase-intro-section__container__header--description">
            <?= $header['description']; ?>
          </div>
          <p class="Showcase-intro-section__container__header--bolded-text"><?= $header['bolded_text']; ?>
          </p>
        </div>

        <?php if ($contactForm['show_contact_form']): ?>
          <div class="Showcase-intro-section__container--ContactFormWrapper">
            <?= do_action('ContactFormShowcaseModule') ?>

            <div class="Showcase-intro-section__container__background">
              <?= wp_get_attachment_image($background, 'full'); ?>
            </div>
          </div>
        <?php else: ?>
          <div class="Showcase-intro-section__container__background">
            <?= wp_get_attachment_image($background, 'full'); ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($descriptionBelow && !empty($descriptionBelow)): ?>
        <div class="Showcase-intro-section__container--description">
          <?= $descriptionBelow; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php
}

add_action('ShowcaseIntroSection', 'ShowcaseIntroSection', 10, 1);