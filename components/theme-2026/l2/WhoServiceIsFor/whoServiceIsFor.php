<?php
/**
 * Component: WhoServiceIsFor (L2 Template)
 *
 * Hook: L2_2026_WhoServiceIsFor
 * Displays 3 qualification cards for organizations requiring PCI DSS Level 1/2 assessments.
 *
 * @package Bootscore Child
 * @version 1.0.0 (2026)
 */

defined('ABSPATH') || exit;

if (!function_exists('L2_2026_WhoServiceIsFor')) {
    /**
     * Render WhoServiceIsFor section for L2 service detail template.
     *
     * @param array $args Optional custom data passed via do_action.
     * @return void
     */
    function L2_2026_WhoServiceIsFor($args = array())
    {
        $badge = !empty($args['badge']) ? esc_html($args['badge']) : 'WHO [SAMPLE SERVICE] IS FOR';
        $title = !empty($args['title']) ? esc_html($args['title']) : 'See if this is your situation.';
        $description = !empty($args['description'])
            ? esc_html($args['description'])
            : '';

        // Default 3 qualification cards with Figma bullet placeholders
        $placeholder_desc = '[Placeholder copy. Describe a common pain point, compliance blocker, or operational scenario that this service directly addresses.]';
        $placeholder_bullets = array(
            '[Bullet point 1]',
            '[Bullet point 2]',
            '[Bullet point 3]',
        );

        $default_cards = array(
            array(
                'badge'       => '',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'criteria'    => $placeholder_bullets,
            ),
            array(
                'badge'       => '',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'criteria'    => $placeholder_bullets,
            ),
            array(
                'badge'       => '',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'criteria'    => $placeholder_bullets,
            ),
        );

        $cards = array();
        if (!empty($args['cards']) && is_array($args['cards'])) {
            $cards = $args['cards'];
        } elseif (!empty($args['items']) && is_array($args['items'])) {
            $cards = $args['items'];
        } elseif (!empty($args['qualification_cards']) && is_array($args['qualification_cards'])) {
            $cards = $args['qualification_cards'];
        } else {
            $cards = $default_cards;
        }
        ?>
        <section class="c-l2-who-service-is-for" id="who-service-is-for" aria-labelledby="who-service-is-for-heading">
            <div class="c-container">
                <header class="c-l2-who-service-is-for__header">
                    <span class="c-badge c-badge--clear c-l2-who-service-is-for__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= $badge; ?></span>
                    <h2 id="who-service-is-for-heading" class="c-l2-who-service-is-for__title">
                        <?= $title; ?>
                    </h2>
                    <?php if (!empty($description)) : ?>
                        <p class="c-l2-who-service-is-for__lead">
                            <?= $description; ?>
                        </p>
                    <?php endif; ?>
                </header>

                <div class="c-l2-who-service-is-for__grid">
                    <?php foreach ($cards as $index => $card) :
                        $card_badge       = !empty($card['badge']) ? esc_html($card['badge']) : 'Tier ' . ($index + 1);
                        $card_title       = !empty($card['title']) ? esc_html($card['title']) : '';
                        $card_description = !empty($card['description']) ? esc_html($card['description']) : '';
                        $card_criteria    = !empty($card['criteria']) && is_array($card['criteria']) ? $card['criteria'] : array();
                        ?>
                        <article class="c-l2-who-service-is-for__card">
                            <div class="c-l2-who-service-is-for__card-header">
                                <div class="c-l2-who-service-is-for__card-icon-wrap" aria-hidden="true">
                                    <svg class="c-l2-who-service-is-for__card-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#CBF400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                        <line x1="2" x2="22" y1="10" y2="10"></line>
                                    </svg>
                                </div>
                            </div>

                            <div class="c-l2-who-service-is-for__card-body">
                                <h3 class="c-l2-who-service-is-for__card-title"><?= $card_title; ?></h3>
                                <p class="c-l2-who-service-is-for__card-desc"><?= $card_description; ?></p>

                                <?php if (!empty($card_criteria)) : ?>
                                    <ul class="c-l2-who-service-is-for__bullet-list">
                                        <?php foreach ($card_criteria as $point) : ?>
                                            <li class="c-l2-who-service-is-for__bullet-item">
                                                <span class="c-l2-who-service-is-for__bullet-dot" aria-hidden="true">•</span>
                                                <span class="c-l2-who-service-is-for__bullet-text"><?= esc_html($point); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('L2_2026_WhoServiceIsFor', 'L2_2026_WhoServiceIsFor', 10, 1);
