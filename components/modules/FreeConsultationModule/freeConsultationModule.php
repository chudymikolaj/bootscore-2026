<?php

function FreeConsultationModule()
{
  $getFreeConsultationModule = get_field('free_consultation_module', 'option');
  $arrFreeConsultationHeader = array(
    'description' => $getFreeConsultationModule['header']['description'],
    'button_text' => $getFreeConsultationModule['header']['button']['name'],
    'button_link' => $getFreeConsultationModule['header']['button']['link'],
  );

  ?>
  <div class="FreeConsultationModule__container">
    <div class="container">
      <div class="FreeConsultationModule__container__background">
        <div class="FreeConsultationModule__container__header">
          <p class="FreeConsultationModule__container__header--description">
            <?= $arrFreeConsultationHeader['description']; ?>
          </p>
          <a class="FreeConsultationModule__container__header--button btn-green"
            href="<?= $arrFreeConsultationHeader['button_link']; ?>">
            <?= $arrFreeConsultationHeader['button_text']; ?>
          </a>
        </div>
        <img class="FreeConsultationModule__container__image"
          src="<?= wp_get_attachment_image_url($getFreeConsultationModule['background'], "full") ?>" alt="">
      </div>
    </div>
  </div>
  <?php
}

add_action('FreeConsultationModule', 'FreeConsultationModule', 10);