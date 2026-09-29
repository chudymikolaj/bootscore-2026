<?php

function SectionNewsletterBanner($props)
{
  $getTitle = $props['title'];
  $getBackground = $props['background'];
  $NewsletterDataForm = $props['data-form'];

  ?>
  <div class="FreeConsultationModule__container NewsletterBanner">
    <div class="container">
      <div class="FreeConsultationModule__container__background">
        <div class="FreeConsultationModule__container__header">
          <p class="FreeConsultationModule__container__header--description">
            <?= $getTitle; ?>
          </p>
          <?php if (!empty($NewsletterDataForm)): ?>
            <div class="ml-embedded" data-form="<?= $NewsletterDataForm; ?>"></div>
          <?php endif; ?>
        </div>
        <?= wp_get_attachment_image($getBackground, 'full', "", array("class" => "FreeConsultationModule__container__image")); ?>
      </div>
    </div>
  </div>
  <?php
}

add_action('SectionNewsletterBanner', 'SectionNewsletterBanner', 10);