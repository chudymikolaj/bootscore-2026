<?php

function ShowcaseNewsletterSection($arrShowcase)
{
  $header = $arrShowcase['header'];
  $background = $arrShowcase['background'];
  $descriptionBelow = $arrShowcase['descriptionBelow'];
  $newsletterDataForm = $arrShowcase['data-form'];
  ?>

  <div class="Showcase-intro-section__container ShowcaseNewsletterSection">
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

          <div class="ml-embedded" data-form="<?= $newsletterDataForm; ?>"></div>
        </div>

        <div class="Showcase-intro-section__container__background">
          <?= wp_get_attachment_image($background, 'full'); ?>
        </div>
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

add_action('ShowcaseNewsletterSection', 'ShowcaseNewsletterSection', 10, 1);