<?php

function TeamRecognition($data)
{
  $tag = !empty($data['tag']) ? $data['tag'] : 'Uznanie w branży';
  $title = $data['title'];
  $items = $data['items'];
  ?>
  <section class="team-recognition">
    <div class="container">
      <div class="team-recognition__header">
        <div class="team-recognition__tag"><?= esc_html($tag); ?></div>
        <h2 class="team-recognition__title"><?= $title; ?></h2>
      </div>

      <?php if (is_array($items)): ?>
        <div class="recognition-grid">
          <?php foreach ($items as $item): ?>
            <div class="recognition-item">
              <?= get_tabler_svg($item['icon'], 28); ?>
              <span class="recognition-item__text"><?= $item['text']; ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <?php
}

add_action('TeamRecognition', 'TeamRecognition', 10, 1);
