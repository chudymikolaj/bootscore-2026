<?php

function OurValues($arrOurValues)
{
  $getTitle = $arrOurValues['title'];
  $getValues = $arrOurValues['values'];
  $getButton = $arrOurValues['button'];
  ?>
  <div class="OurValues__container">
    <div class="container">
      <h2 class="OurValues__container--title"><?= $getTitle; ?></h2>
      <div class="OurValues__container--values">
        <?php foreach ($getValues as $value): ?>
          <div class="OurValues__container__value">
            <div class="OurValues__container__value--header">
              <h4 class="OurValues__container__value--header-title"><?= $value['header']['title']; ?></h4>
              <p class="OurValues__container__value--header-description"><?= $value['header']['description']; ?></p>
            </div>
            <?= wp_get_attachment_image($value['image'], 'full', false, array('class' => 'OurValues__container__value--image')); ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="OurValues__container--cta">
        <a class="btn btn-green" href="<?= $getButton['link']; ?>">
          <?= $getButton['name']; ?>
        </a>
      </div>
    </div>
  </div>
  <?php
}

add_action('OurValues', 'OurValues', 10, 1);