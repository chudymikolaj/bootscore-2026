<?php

function TeamCTA($cta_data = array())
{
  $left = !empty($cta_data['left']) ? $cta_data['left'] : array();
  $right = !empty($cta_data['right']) ? $cta_data['right'] : array();

  $left_badge = !empty($left['badge']) ? $left['badge'] : (function_exists('pll__') ? pll__('Dla klientów') : 'Dla klientów');
  $left_title = !empty($left['title']) ? $left['title'] : (function_exists('pll__') ? pll__('Chcesz pracować z naszym zespołem?') : 'Chcesz pracować z naszym zespołem?');
  $left_description = !empty($left['description']) ? $left['description'] : (function_exists('pll__') ? pll__('Umów bezpłatną konsultację — odpowiemy w 24h.') : 'Umów bezpłatną konsultację — odpowiemy w 24h.');
  $left_button_text = !empty($left['button_text']) ? $left['button_text'] : (function_exists('pll__') ? pll__('Umów konsultację') : 'Umów konsultację');
  $left_button_url = !empty($left['button_url']) ? $left['button_url'] : '#contact';

  $right_badge = !empty($right['badge']) ? $right['badge'] : (function_exists('pll__') ? pll__('Dla kandydatów') : 'Dla kandydatów');
  $right_title = !empty($right['title']) ? $right['title'] : (function_exists('pll__') ? pll__('Chcesz dołączyć do Patronusec?') : 'Chcesz dołączyć do Patronusec?');
  $right_description = !empty($right['description']) ? $right['description'] : (function_exists('pll__') ? pll__('Szukamy QSA i ekspertów ISO/DORA. Zobacz otwarte stanowiska.') : 'Szukamy QSA i ekspertów ISO/DORA. Zobacz otwarte stanowiska.');
  $right_button_text = !empty($right['button_text']) ? $right['button_text'] : (function_exists('pll__') ? pll__('Zobacz oferty') : 'Zobacz oferty');
  $right_button_url = !empty($right['button_url']) ? $right['button_url'] : '#';
  ?>
  <section class="team-cta-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6">
          <div class="team-cta team-cta--clients">
            <div>
              <span class="team-cta__badge"><?= esc_html($left_badge); ?>
              </span>
              <h3 class="team-cta__title">
                <?= esc_html($left_title); ?>
              </h3>
              <p class="team-cta__description">
                <?= esc_html($left_description); ?>
              </p>
            </div>
            <a href="<?= esc_attr($left_button_url); ?>"
              class="btn btn-green team-cta__button"><?= esc_html($left_button_text); ?> &rarr;</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="team-cta team-cta--candidates">
            <div>
              <span class="team-cta__badge"><?= esc_html($right_badge); ?>
              </span>
              <h3 class="team-cta__title">
                <?= esc_html($right_title); ?>
              </h3>
              <p class="team-cta__description">
                <?= esc_html($right_description); ?>
              </p>

            </div>
            <a href="<?= esc_attr($right_button_url); ?>"
              class="btn btn-outline-danger team-cta__button"><?= esc_html($right_button_text); ?> &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
}

add_action('TeamCTA', 'TeamCTA', 10, 1);
