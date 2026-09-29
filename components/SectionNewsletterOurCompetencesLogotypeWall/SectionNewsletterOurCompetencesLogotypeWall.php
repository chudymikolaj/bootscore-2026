<?php

function SectionNewsletterOurCompetencesLogotypeWall()
{
  $getSectionNewsletterOurCompetencesLogotypeWall = get_field('modul_our_competences_logotype_wall', 'option');
  $getHeader = $getSectionNewsletterOurCompetencesLogotypeWall['header'];
  $getLogotypes = $getSectionNewsletterOurCompetencesLogotypeWall['logotypes'];
  ?>

  <div class="SectionNewsletterOurCompetencesLogotypeWall__container">
    <?php if (!is_front_page()): ?>
      <div class="container">
        <div class="SectionNewsletterOurCompetencesLogotypeWall__container__header">
          <h2 class="SectionNewsletterOurCompetencesLogotypeWall__container__header--title"><?= $getHeader['title']; ?></h2>
          <p class="SectionNewsletterOurCompetencesLogotypeWall__container__header--description">
            <?= $getHeader['description']; ?></p>
        </div>
      </div>
    <?php endif; ?>

    <div class="container special-width">
      <div class="SectionNewsletterOurCompetencesLogotypeWall__container__logotypes">
        <?php foreach ($getLogotypes as $logotype): ?>
          <div class="SectionNewsletterOurCompetencesLogotypeWall__container__logotype">
            <?= wp_get_attachment_image($logotype['logotyp'], 'full', false, array('class' => 'SectionNewsletterOurCompetencesLogotypeWall__container__logotype--image')); ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <?php
}

add_action('SectionNewsletterOurCompetencesLogotypeWall', 'SectionNewsletterOurCompetencesLogotypeWall', 10, 1);