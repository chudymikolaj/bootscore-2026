<?php

function OpinionCarouselModule()
{
  $getOpinionCarouselModule = get_field('opinion_carousel_module', 'option');

  ?>

  <div class="OpinionCarouselModule__container">
    <div class="container">
      <div class="swiper opinionCarouselModule-swiper--opinions">
        <div class="swiper-wrapper">

          <?php foreach ($getOpinionCarouselModule['carousel_with_opinions'] as $opinion):
            $arrClient = array(
              'image' => $opinion['client']['image'],
              'name' => $opinion['client']['name'],
              'other' => $opinion['client']['other_title_company_name']
            );
            ?>
            <div class="swiper-slide">
              <div class="OpinionCarouselModule__container__opinion">
                <?= wp_get_attachment_image($arrClient['image'], 'full', false, array('class' => 'OpinionCarouselModule__container__opinion--avatar')); ?>
                <div class="OpinionCarouselModule__container__opinion--client">
                  <h4 class="OpinionCarouselModule__container__opinion--client-name"><?= $arrClient['name']; ?></h4>
                  <h5 class="OpinionCarouselModule__container__opinion--client-other"><?= $arrClient['other']; ?></h5>
                </div>
                <p class="OpinionCarouselModule__container__opinion--content"><?= $opinion['opinion']; ?></p>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>

  <?php
}

add_action('OpinionCarouselModule', 'OpinionCarouselModule', 10);