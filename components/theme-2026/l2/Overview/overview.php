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
                            <!-- Background Ribbon Vector (Figma 132:1088) -->
                            <svg class="c-l2-overview__ribbon" width="206" height="504" viewBox="0 0 206 504" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M0 0L167.387 37.9713V360.531L0.199038 459.57V504L206 381.866V0H0Z" fill="#3F8AFD" fill-opacity="0.3"/>
                            </svg>

                            <?php if (!empty($image_url) && strpos($image_url, 'overview-mockup.png') === false): ?>
                                <img src="<?= $image_url; ?>" alt="<?= $image_alt; ?>" class="c-l2-overview__mockup-img" loading="lazy" decoding="async">
                            <?php else: ?>
                                <div class="c-l2-overview__mockup-placeholder" aria-hidden="true">
                                    <!-- Figma 132:1090 Exact Placeholder Icon -->
                                    <svg class="c-l2-overview__mockup-icon" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M37 24.9994L30.828 18.8274C30.0779 18.0775 29.0607 17.6562 28 17.6562C26.9393 17.6562 25.9221 18.0775 25.172 18.8274L7 36.9994M5 1H33C35.2091 1 37 2.79086 37 5V33C37 35.2091 35.2091 37 33 37H5C2.79086 37 1 35.2091 1 33V5C1 2.79086 2.79086 1 5 1ZM17 13C17 15.2091 15.2091 17 13 17C10.7909 17 9 15.2091 9 13C9 10.7909 10.7909 9 13 9C15.2091 9 17 10.7909 17 13Z" stroke="#94A3B8" stroke-width="2" stroke-linecap="round"/>
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
