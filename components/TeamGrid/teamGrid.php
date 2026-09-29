<?php

function TeamGrid($team_data)
{
  $ceo = $team_data['ceo'];
  $members = $team_data['members'];
  ?>
  <section class="team-grid-section">
    <div class="container">
      <div class="team-grid">

        <?php if ($ceo): ?>
          <!-- Founder & CEO (Full-width card) -->
          <div class="team-grid__ceo">
            <article class="card-ceo">
              <div class="card-ceo__layout">
                <div class="card-ceo__avatar" aria-hidden="true">
                  <?php if ($ceo['photo']): ?>
                    <?= wp_get_attachment_image($ceo['photo'], 'medium', false, array('class' => 'card-ceo__avatar-img')); ?>
                  <?php else: ?>
                    <?= $ceo['initials']; ?>
                  <?php endif; ?>
                </div>
                <div class="card-ceo__content">
                  <div class="card-ceo__tagline">
                    <?= get_tabler_svg('shield-check', 16); ?> <?= esc_html(!empty($ceo['tagline']) ? $ceo['tagline'] : 'Founder & CEO'); ?>
                  </div>
                  <h2 class="card-ceo__name"><?= $ceo['name']; ?></h2>
                  <p class="card-ceo__bio"><?= $ceo['bio']; ?></p>

                  <div class="card-ceo__footer">
                    <?php if ($ceo['tags']): ?>
                      <div class="card-ceo__tags">
                        <?php
                        $tags = explode(',', $ceo['tags']);
                        foreach ($tags as $tag): ?>
                          <span class="card-ceo__tag"><?= trim($tag); ?></span>
                        <?php endforeach; ?>
                      </div>
                    <?php endif; ?>

                    <div class="card-ceo__meta">
                      <?php if ($ceo['location']): ?>
                        <span class="card-ceo__meta-location">
                          <?= get_tabler_svg('map-pin', 16); ?> <?= $ceo['location']; ?>
                        </span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        <?php endif; ?>

        <?php if ($members): ?>
          <?php foreach ($members as $member): ?>
            <!-- Team Member -->
            <article class="card-team">
              <div class="card-team__avatar" aria-hidden="true">
                <?php if ($member['photo']): ?>
                  <?= wp_get_attachment_image($member['photo'], 'medium', false, array('class' => 'card-team__avatar-img')); ?>
                <?php else: ?>
                  <?= $member['initials']; ?>
                <?php endif; ?>
              </div>
              <div class="card-team__body">
                <h3 class="card-team__name"><?= $member['name']; ?></h3>
                <div class="card-team__role"><?= $member['role']; ?></div>
                <p class="card-team__desc"><?= $member['description']; ?></p>
                
                <?php if (!empty($member['tags'])): ?>
                  <div class="card-team__tags">
                    <?php
                    $tags = explode(',', $member['tags']);
                    foreach ($tags as $tag): ?>
                      <span class="card-team__tag"><?= trim($tag); ?></span>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>

                <div class="card-team__footer">
                  <?php if ($member['location']): ?>
                    <span class="card-team__location">
                      <?= get_tabler_svg('map-pin', 16); ?> <?= $member['location']; ?>
                    </span>
                  <?php endif; ?>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>

      </div>
    </div>
  </section>
  <?php
}

add_action('TeamGrid', 'TeamGrid', 10, 1);

