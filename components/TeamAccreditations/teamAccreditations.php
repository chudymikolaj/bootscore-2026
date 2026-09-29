<?php

function TeamAccreditations($data)
{
  $tag = !empty($data['tag']) ? $data['tag'] : 'Akredytacje';
  $title = $data['title'];
  $subtitle = !empty($data['subtitle']) ? $data['subtitle'] : 'Jedna z nielicznych firm na świecie z kompletem akredytacji <strong>PCI Security Standards Council</strong>.';
  $groups = $data['groups'];
  ?>
  <section class="team-accreditations">
    <div class="container">
      <div class="team-accreditations__header">
        <div class="team-accreditations__tag"><?= esc_html($tag); ?></div>
        <h2 class="team-accreditations__title"><?= $title; ?></h2>
        <p class="team-accreditations__subtitle"><?= wp_kses_post($subtitle); ?></p>
      </div>

      <?php if (is_array($groups)): ?>
        <?php foreach ($groups as $group): ?>
          <div class="accreditations-group">
            <h3 class="accreditations-group__title"><?= $group['title']; ?></h3>
            <div class="accreditations-grid">
              <?php if (is_array($group['items'])): ?>
                <?php foreach ($group['items'] as $item): ?>
                  <div class="accreditations-card">
                    <div class="accreditations-card__icon">
                      <?php if (!empty($item['icon_image'])): ?>
                        <?= wp_get_attachment_image($item['icon_image'], 'full', false, array('class' => 'accreditations-card__img')); ?>
                      <?php else: ?>
                        <?= esc_html($item['icon_text']); ?>
                      <?php endif; ?>
                    </div>
                    <?php if (empty($item['icon_image'])): ?>
                      <span class="accreditations-card__title"><?= $item['label']; ?></span>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>
  <?php
}

add_action('TeamAccreditations', 'TeamAccreditations', 10, 1);
