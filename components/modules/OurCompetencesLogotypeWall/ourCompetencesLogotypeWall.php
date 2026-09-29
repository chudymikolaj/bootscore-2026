<?php

function OurCompetencesLogotypeWall()
{
  $getOurCompetencesLogotypeWall = get_field('modul_our_competences_logotype_wall', 'option');
  $getHeader = $getOurCompetencesLogotypeWall['header'];
  $getLogotypes = $getOurCompetencesLogotypeWall['logotypes'];
  ?>

  <div class="OurCompetencesLogotypeWall__container">
    <?php if (!is_front_page()): ?>
      <div class="container">
        <div class="OurCompetencesLogotypeWall__container__header">
          <h2 class="OurCompetencesLogotypeWall__container__header--title"><?= $getHeader['title']; ?></h2>
          <p class="OurCompetencesLogotypeWall__container__header--description"><?= $getHeader['description']; ?></p>
        </div>
      </div>
    <?php endif; ?>

    <div class="container special-width">
      <div class="OurCompetencesLogotypeWall__container__logotypes">
        <?php foreach ($getLogotypes as $logotype): ?>
          <div class="OurCompetencesLogotypeWall__container__logotype">
            <?= wp_get_attachment_image($logotype['logotyp'], 'full', false, array('class' => 'OurCompetencesLogotypeWall__container__logotype--image')); ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <?php
}

add_action('OurCompetencesLogotypeWall', 'OurCompetencesLogotypeWall', 10, 1);