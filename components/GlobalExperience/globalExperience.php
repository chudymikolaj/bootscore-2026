<?php

function GlobalExperience($arrGlobalExperience)
{
  $getTitle = $arrGlobalExperience['title'];
  $getFacts = $arrGlobalExperience['facts'];
  $getStatistics = $arrGlobalExperience['statistics'];
  $getMap = $arrGlobalExperience['map'];
  ?>
  <div class="GlobalExperience__container">
    <div class="container">
      <div class="GlobalExperience__container--wrapper">
        <h2 class="GlobalExperience__container--title"><?= $getTitle; ?></h2>

        <div class="GlobalExperience__container__facts">
          <?php foreach ($getFacts as $fact): ?>
            <div class="GlobalExperience__container__fact">
              <img class="GlobalExperience__container__fact--icon"
                src="<?= get_stylesheet_directory_uri() . '/assets/img/icons/checkbox-icon.svg'; ?>" alt="Fact icon">
              <p class="GlobalExperience__container__fact--description"><?= $fact['description']; ?></p>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="GlobalExperience__container__group">
          <div class="GlobalExperience__container__statistics">
            <?php foreach ($getStatistics as $stat): ?>
              <div class="GlobalExperience__container__stat">
                <p class="GlobalExperience__container__stat--number"><?= $stat['number']; ?></p>
                <p class="GlobalExperience__container__stat--description"><?= $stat['description']; ?></p>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="GlobalExperience__container__group--map">
            <?= wp_get_attachment_image($getMap, 'full'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
}

add_action('GlobalExperience', 'GlobalExperience', 10, 1);