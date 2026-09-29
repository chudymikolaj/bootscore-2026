<?php

function WhyUsSection($arrWhyUsAcf)
{
  $header = $arrWhyUsAcf['header'];
  $tiles = $arrWhyUsAcf['tiles'];
  ?>
  <div class="WhyUsSection__container">
    <div class="container">
      <div class="WhyUsSection__container__header">
        <h2 class="WhyUsSection__container__header--title"><?= $header['title']; ?></h2>
        <p class="WhyUsSection__container__header--description"><?= $header['description']; ?></p>
      </div>
      <div class="WhyUsSection__container__tiles">
        <?php foreach ($tiles as $tile): ?>
          <div class="WhyUsSection__container__tile">
            <div class="WhyUsSection__container__content">
              <h3 class="WhyUsSection__container__content--title"><?= $tile['title']; ?></h3>
              <p class="WhyUsSection__container__content--description"><?= $tile['description']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php
}

add_action('WhyUsSection', 'WhyUsSection', 10, 1);