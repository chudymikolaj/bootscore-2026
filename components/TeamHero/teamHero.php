<?php

function TeamHero($hero_data)
{
  $category = !empty($hero_data['category']) ? $hero_data['category'] : 'Zespół Patronusec';
  $title = $hero_data['title'];
  $description = $hero_data['description'];
  $locations = $hero_data['locations'];

  $is_en = (strpos(get_bloginfo('language'), 'en') === 0);
  $aria_label = $is_en ? 'Breadcrumbs' : 'Okruszki chleba';
  $breadcrumbs_text = $is_en ? 'team patronusec' : 'zespół patronusec';
  ?>
  <section class="team-hero">
    <div class="container">
      <nav class="team-hero__breadcrumbs" aria-label="<?= esc_attr($aria_label); ?>">
        <a href="<?= home_url(); ?>">patronusec.com</a>
        <?= get_tabler_svg('chevron-right', 10); ?>
        <span><?= esc_html($breadcrumbs_text); ?></span>
      </nav>

      <div class="team-hero__category"><?= esc_html($category); ?></div>
      <h1 class="team-hero__title"><?= $title; ?></h1>
      <p class="team-hero__description"><?= $description; ?></p>

      <?php if (is_array($locations)): ?>
        <div class="team-hero__locations">
          <?php foreach ($locations as $location): ?>
            <div class="team-hero__location">
              <?= get_tabler_svg('map-pin', 16); ?>
              <span><?= $location['name']; ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <?php
}

add_action('TeamHero', 'TeamHero', 10, 1);
