<?php
function elementFaq($props)
{
  $elementTitle = $props['name_emelent'] ?? '';
  $elementQuestions = $props['faq'] ?? [];

  if (!empty($props)): ?>
    <section class="elementFaq__container">
      <div class="container">

        <?php if ($elementTitle): ?>
          <h2 class="elementFaq__container--title">
            <?= esc_html($elementTitle); ?>
          </h2>
        <?php endif; ?>

        <?php foreach ($elementQuestions as $index => $question):
          $firstOpen = $index === 0 ? 'open' : ''; ?>

          <details class="elementFaq__faq" name="faq" <?= $firstOpen; ?>>
            <summary class="elementFaq__faq--question">
              <?= esc_html($question['question']); ?>
              <span class="faq-arrow">›</span>
            </summary>

            <div class="elementFaq__faq--answer">
              <div class="elementFaq__faq--answerInner">
                <?= wp_kses_post($question['answer']); ?>
              </div>
            </div>
          </details>

        <?php endforeach; ?>

      </div>
    </section>
  <?php endif;
}

add_action('elementFaq', 'elementFaq', 10, 1);
