<?php
/**
 * Component: Hero (Theme 2026)
 *
 * 1:1 Figma Implementation supporting:
 * - HOME 1 (Figma 132:1005 / 132:1009): Right-aligned text card, raven visible on left, dark right gradient
 * - HOME 2 (Figma 241:2048 / 241:2692): Centered full-width text, lime callout, integrated Quick Stats Banner
 * - L1 / L2 (Figma 133:1481 / 132:1032): Left-aligned text card, auditor photo overlay
 *
 * @package Bootscore Child
 * @subpackage Theme 2026 / Shared
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_Hero')) {
    /**
     * Render the unified Hero component.
     *
     * @param array $data Configuration and content data.
     */
    function Theme2026_Hero($data = array())
    {
        $data = is_array($data) ? $data : array();

        $is_home = is_page_template('templates/template-home-2026.php') || is_front_page();
        $is_l2   = is_page_template('templates/template-l2-2026.php');

        // Check variant from query param (for easy switching/previewing) or $data
        $url_variant = '';
        if (isset($_GET['variant'])) {
            $url_variant = 'variant_' . sanitize_text_field($_GET['variant']);
        } elseif (isset($_GET['hero_variant'])) {
            $url_variant = sanitize_text_field($_GET['hero_variant']);
        }

        $hero_variant = !empty($url_variant) 
            ? $url_variant 
            : (!empty($data['hero_variant']) ? $data['hero_variant'] : 'variant_1');

        $variant_classes = array('c-hero');

        if ($is_home) {
            $variant_classes[] = 'c-hero--home';
            if ($hero_variant === 'variant_2') {
                $variant_classes[] = 'c-hero--variant-2';
            } else {
                $variant_classes[] = 'c-hero--home-1';
            }
        } else {
            $variant_classes[] = 'c-hero--subpage';
            if ($is_l2) {
                $variant_classes[] = 'c-hero--l2';
            } else {
                $variant_classes[] = 'c-hero--l1';
            }
        }

        // Background image (L1 and L2 share the same 1:1 hallway photo from Figma 132:1037 / 133:1481)
        $default_photo = $is_home
            ? get_stylesheet_directory_uri() . '/assets/img/hero/hero-home.png'
            : get_stylesheet_directory_uri() . '/assets/img/theme-2026/hero-l2-bg.png';

        $photo_url = !empty($data['photo_url']) ? $data['photo_url'] : (!empty($data['bg_image']) ? $data['bg_image'] : $default_photo);
        $photo_alt = !empty($data['photo_alt']) ? $data['photo_alt'] : 'Patronus Security';

        // Content defaults according to 1:1 Figma specs
        if ($is_home && $hero_variant === 'variant_2') {
            // Figma 241:2048 (HOME 2)
            $category    = !empty($data['category']) ? $data['category'] : 'PCI • ISO 27001 • DORA • NIS2 • TISAX • VCISO • PENTESTING';
            $title       = !empty($data['title']) ? $data['title'] : 'You expand your business.';
            $subtitle    = !empty($data['subtitle']) ? $data['subtitle'] : 'We keep it secure.';
            $description = !empty($data['description']) ? $data['description'] : (!empty($data['desc']) ? $data['desc'] : 'Rising cyber threats, data loss risks, and new IT regulations can strike at any moment, jeopardising your company\'s reputation. Don\'t leave it to chance. We deliver comprehensive protection: PCI DSS and payment security certification, IT compliance and standards work (ISO 27001, DORA, NIS2, TISAX), and cybersecurity services from vCISO leadership to penetration testing — all under one roof.');
            $callout     = !empty($data['callout']) ? $data['callout'] : 'Patronusec protects your systems so you can focus entirely on growing your business.';
        } elseif ($is_home) {
            // Figma 132:1005 (HOME 1)
            $category    = !empty($data['category']) ? $data['category'] : 'SERVICE TEMPLATE';
            $title       = !empty($data['title']) ? $data['title'] : '[Service title]';
            $subtitle    = !empty($data['subtitle']) ? $data['subtitle'] : '[Subtitle goes here]';
            $description = !empty($data['description']) ? $data['description'] : (!empty($data['desc']) ? $data['desc'] : '[Placeholder intro paragraph. Describe the service in one or two sentences. Replace this text with the real value proposition before publishing.]');
            $callout     = !empty($data['callout']) ? $data['callout'] : '';
        } else {
            // Subpages (L1 / L2)
            $category    = !empty($data['category']) ? $data['category'] : 'SERVICE TEMPLATE';
            $title       = !empty($data['title']) ? $data['title'] : '[Service title]';
            $subtitle    = !empty($data['subtitle']) ? $data['subtitle'] : '[Subtitle goes here]';
            $description = !empty($data['description']) ? $data['description'] : (!empty($data['desc']) ? $data['desc'] : '[Placeholder intro paragraph. Describe the service in one or two sentences. Replace this text with the real value proposition before publishing.]');
            $callout     = '';
        }

        // Buttons
        $primary_btn     = !empty($data['primary_btn']) ? $data['primary_btn'] : array();
        $default_primary = $is_home ? 'Talk to an assessor' : '[Primary CTA]';
        $primary_text    = !empty($primary_btn['text']) ? $primary_btn['text'] : (!empty($data['primary_text']) ? $data['primary_text'] : $default_primary);
        $primary_url     = !empty($primary_btn['url']) ? $primary_btn['url'] : (!empty($data['primary_url']) ? $data['primary_url'] : '#contact-cta');

        $secondary_btn     = !empty($data['secondary_btn']) ? $data['secondary_btn'] : array();
        $default_secondary = $is_home ? 'Explore certifications' : '[Secondary CTA]';
        $secondary_text    = !empty($secondary_btn['text']) ? $secondary_btn['text'] : (!empty($data['secondary_text']) ? $data['secondary_text'] : $default_secondary);
        $secondary_url     = !empty($secondary_btn['url']) ? $secondary_btn['url'] : (!empty($data['secondary_url']) ? $data['secondary_url'] : '#services');
        ?>
        <section class="<?= esc_attr(implode(' ', $variant_classes)); ?>" aria-label="<?= esc_attr($title); ?>">
            <!-- Background container with Figma gradient overlay -->
            <div class="c-hero__backdrop" aria-hidden="true">
                <?php if (!empty($photo_url)): ?>
                    <div class="c-hero__photo-container">
                        <img src="<?= esc_url($photo_url); ?>" alt="<?= esc_attr($photo_alt); ?>" class="c-hero__photo-img" loading="eager" decoding="async">
                        <div class="c-hero__photo-gradient"></div>
                    </div>
                <?php endif; ?>
                <?php if ($is_home): ?>
                    <div class="c-hero__ambient-glow c-hero__ambient-glow--top"></div>
                    <div class="c-hero__ambient-glow c-hero__ambient-glow--accent"></div>
                <?php endif; ?>
            </div>

            <div class="c-hero__container">
                <div class="c-hero__inner">
                    <div class="c-hero__content">
                        <?php if (!empty($category)): ?>
                            <div class="c-hero__category-wrapper">
                                <span class="c-hero__category">
                                    <span class="c-hero__category-dot" aria-hidden="true"></span>
                                    <?= esc_html($category); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="c-hero__titles">
                            <h1 class="c-hero__title"><?= wp_kses_post($title); ?></h1>

                            <?php if (!empty($subtitle)): ?>
                                <p class="c-hero__subtitle"><?= esc_html($subtitle); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($description)): ?>
                            <p class="c-hero__desc"><?= esc_html($description); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($callout)): ?>
                            <p class="c-hero__callout"><?= esc_html($callout); ?></p>
                        <?php endif; ?>

                        <div class="c-hero__actions">
                            <?php if (!empty($primary_text)): ?>
                                <a href="<?= esc_url($primary_url); ?>" class="c-btn c-btn--primary">
                                    <span><?= esc_html($primary_text); ?></span>
                                    <svg class="c-btn__arrow" width="14" height="14" viewBox="0 0 17 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M1 8H15M8 15L15 8L8 1"/>
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($secondary_text)): ?>
                                <a href="<?= esc_url($secondary_url); ?>" class="c-btn c-btn--secondary">
                                    <span><?= esc_html($secondary_text); ?></span>
                                    <svg class="c-btn__arrow" width="14" height="14" viewBox="0 0 17 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M1 8H15M8 15L15 8L8 1"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Banner (HOME 2 Variant Only: Figma 241:2711) -->
                <?php if ($is_home && $hero_variant === 'variant_2'): ?>
                    <div class="c-hero__quick-stats-banner">
                        <div class="c-hero__quick-stat-item">
                            <span class="c-hero__quick-stat-icon" aria-hidden="true">
                                <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/icons/icon-shield-check.svg'); ?>" width="14" height="14" alt="" />
                            </span>
                            <span class="c-hero__quick-stat-text">1,000+ projects delivered</span>
                        </div>
                        <div class="c-hero__quick-stat-item">
                            <span class="c-hero__quick-stat-icon" aria-hidden="true">
                                <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/icons/icon-users.svg'); ?>" width="14" height="14" alt="" />
                            </span>
                            <span class="c-hero__quick-stat-text">94% client retention</span>
                        </div>
                        <div class="c-hero__quick-stat-item">
                            <span class="c-hero__quick-stat-icon" aria-hidden="true">
                                <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/icons/icon-map-pin.svg'); ?>" width="14" height="14" alt="" />
                            </span>
                            <span class="c-hero__quick-stat-text">60+ countries served</span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_Hero', 'Theme2026_Hero', 10, 1);
