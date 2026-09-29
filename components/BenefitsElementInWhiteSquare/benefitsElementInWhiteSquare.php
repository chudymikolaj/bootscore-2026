<?php

function BenefitsElementInWhiteSquare($arrBenefitsElementInWhiteSquare)
{
  $getHeader = $arrBenefitsElementInWhiteSquare['header'];
  $getDescription = $arrBenefitsElementInWhiteSquare['description'];
  ?>
  <div class="BenefitsElementInWhiteSquare__container">
    <div class="container">
      <div class="BenefitsElementInWhiteSquare__container--wrapper">
        <div class="BenefitsElementInWhiteSquare__container__header">
          <h2 class="BenefitsElementInWhiteSquare__container__header--title"><?= $getHeader['title']; ?></h2>
          <div class="BenefitsElementInWhiteSquare__container__header--bar"
            style="--header-bar-color: <?= $getHeader['bar_color']; ?>;"></div>
        </div>
        <div class="BenefitsElementInWhiteSquare__container__description"><?= $getDescription; ?></div>
      </div>
    </div>
  </div>
  <?php
}

add_action('BenefitsElementInWhiteSquare', 'BenefitsElementInWhiteSquare', 10, 1);