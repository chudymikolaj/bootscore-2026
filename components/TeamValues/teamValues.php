<?php

function TeamValues($data)
{
  $tag = !empty($data['tag']) ? $data['tag'] : 'Wartości';
  $title = $data['title'];
  $items = $data['items'];
  ?>
  <section class="team-values">
    <div class="container">
      <div class="team-values__header">
        <div class="team-values__tag"><?= esc_html($tag); ?></div>
        <h2 class="team-values__title"><?= $title; ?></h2>
      </div>

      <?php if (is_array($items)): ?>
        <div class="values-grid">
          <?php foreach ($items as $item): ?>
            <div class="values-card">
              <?php if (!empty($item['value_image'])): ?>
                <?= wp_get_attachment_image($item['value_image'], 'full', false, array('class' => 'values-card__image')); ?>
              <?php endif; ?>
              <div class="values-card__content">
                <h3 class="values-card__title"><?= $item['title']; ?>
                </h3>
                <p class="values-card__desc">
                  <?= $item['description']; ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <?php
}

add_action('TeamValues', 'TeamValues', 10, 1);
