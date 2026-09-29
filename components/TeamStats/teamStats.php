<?php

function TeamStats($stats_data)
{
  $tag = !empty($stats_data['tag']) ? $stats_data['tag'] : 'Doświadczenie';
  $title = $stats_data['title'];
  $subtitle = !empty($stats_data['subtitle']) ? $stats_data['subtitle'] : 'Wieloletnie doświadczenie i zaangażowanie w bezpieczeństwo danych płatniczych i compliance przekłada się na realne rezultaty.';
  $stats = $stats_data['stats'];
  ?>
  <section class="team-stats">
    <div class="container">
      <div class="team-stats__header">
        <div class="team-stats__tag"><?= esc_html($tag); ?></div>
        <h2 class="team-stats__title"><?= $title; ?></h2>
        <p class="team-stats__subtitle"><?= esc_html($subtitle); ?></p>
      </div>

      <?php if (is_array($stats)): ?>
        <div class="stats-grid">
          <?php foreach ($stats as $stat): ?>
            <div class="stats-grid__item">
              <span class="stats-grid__number"><?= $stat['number']; ?></span>
              <span class="stats-grid__label"><?= $stat['label']; ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <?php
}

add_action('TeamStats', 'TeamStats', 10, 1);
