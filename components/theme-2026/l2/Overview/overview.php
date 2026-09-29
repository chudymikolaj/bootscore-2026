<?php
/**
 * Component: Overview (L2 Template)
 *
 * Hook: L2_2026_Overview
 * Split layout matching Figma (132:1084):
 * - Section Badge: 'Overview'
 * - Left column: Visual container / mockup box (588x340)
 * - Right column: [Section heading] & [Placeholder intro paragraph...]
 *
 * @package Bootscore Child
 * @version 1.0.0 (2026)
 */

defined('ABSPATH') || exit;

if (!function_exists('L2_2026_Overview')) {
    /**
     * Render Overview section for L2 service detail template.
     *
     * @param array $args Optional custom data passed via do_action.
     * @return void
     */
    function L2_2026_Overview($args = array())
    {
        $badge = !empty($args['badge']) ? esc_html($args['badge']) : 'Overview';
        $title = !empty($args['title']) ? esc_html($args['title']) : '[Section heading]';
        $lead  = !empty($args['lead'])
            ? esc_html($args['lead'])
            : (!empty($args['description'])
                ? esc_html($args['description'])
                : '[Placeholder intro paragraph. Explain what this service covers and who it is for. Replace this with detailed compliance scope details, standard expectations, or methodology summaries before publishing.]');

        $default_img = get_stylesheet_directory_uri() . '/assets/img/theme-2026/overview-mockup.png';
        $image_url = !empty($args['image_url']) ? esc_url($args['image_url']) : (!empty($args['image']) ? esc_url($args['image']) : $default_img);
        $image_alt = !empty($args['image_alt']) ? esc_attr($args['image_alt']) : esc_attr($title);
        ?>
        <section class="c-l2-overview" id="service-overview" aria-labelledby="overview-heading">
            <div class="c-container">
                <header class="c-l2-overview__header">
                    <span class="c-badge c-badge--light c-l2-overview__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= $badge; ?></span>
                </header>

                <div class="c-l2-overview__layout">
                    <!-- Left Column: Visual Mockup / Media Frame (1:1 Figma 132:1087) -->
                    <div class="c-l2-overview__mockup-col">
                        <div class="c-l2-overview__mockup-frame">
                            <?php if (!empty($image_url)): ?>
                                <img src="<?= $image_url; ?>" alt="<?= $image_alt; ?>" class="c-l2-overview__mockup-img" loading="lazy" decoding="async">
                            <?php else: ?>
                                <div class="c-l2-overview__mockup-placeholder" aria-hidden="true">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                                        <circle cx="9" cy="9" r="2"/>
                                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                                    </svg>
                                    <span class="c-l2-overview__mockup-text">OVERVIEW VISUAL</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Right Column: Narrative Content -->
                    <div class="c-l2-overview__content-col">
                        <h2 id="overview-heading" class="c-l2-overview__title">
                            <?= $title; ?>
                        </h2>

                        <div class="c-l2-overview__body">
                            <p class="c-l2-overview__lead">
                                <?= $lead; ?>
                            </p>
                            <?php if (!empty($args['paragraph_two'])): ?>
                                <p class="c-l2-overview__text">
                                    <?= esc_html($args['paragraph_two']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('L2_2026_Overview', 'L2_2026_Overview', 10, 1);
