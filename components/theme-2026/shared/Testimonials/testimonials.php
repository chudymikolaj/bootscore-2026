<?php
/**
 * Component: Testimonials (Theme 2026)
 *
 * Hook: Theme2026_Testimonials
 * Description: 1:1 Figma (Node 241:2008) testimonial-section.
 * Glassmorphic central card on dark background #070A1E with neon accent.
 *
 * @package Bootscore_Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_Testimonials')) {
    /**
     * Render the Testimonials component.
     *
     * @param array $data Component attributes.
     * @return void
     */
    function Theme2026_Testimonials($data = [])
    {
        $data = is_array($data) ? $data : [];

        $theme      = (!empty($data['theme']) && in_array($data['theme'], ['light', 'dark'], true)) ? $data['theme'] : 'dark';
        $badge      = !empty($data['badge']) ? $data['badge'] : 'WHAT OUR CLIENTS SAY';
        $title      = !empty($data['title']) ? $data['title'] : 'What our clients say';
        $section_id = !empty($data['id']) ? $data['id'] : 'testimonials-section';

        $default_testimonials = [
            [
                'quote'   => !empty($data['quote']) ? $data['quote'] : 'Patronusec streamlined our entire PCI DSS audit. Their senior assessors provided exceptionally clear guidance and cut down our certification timeline by weeks.',
                'role'    => !empty($data['role']) ? $data['role'] : 'Chief Information Security Officer',
                'company' => !empty($data['company']) ? $data['company'] : 'Enterprise FinTech Client',
            ],
            [
                'quote'   => 'The depth of technical expertise during our penetration testing was outstanding. They identified critical attack vectors that our previous auditors had completely missed.',
                'role'    => 'Head of Information Security',
                'company' => 'Global SaaS Provider',
            ],
            [
                'quote'   => 'Their pragmatic approach to ISO 27001 and NIS2 compliance helped us achieve certification without disrupting our core engineering roadmap.',
                'role'    => 'VP of Engineering',
                'company' => 'European Banking Infrastructure',
            ],
        ];

        $testimonials_list = (!empty($data['items']) && is_array($data['items'])) ? $data['items'] : ((!empty($data['testimonials']) && is_array($data['testimonials'])) ? $data['testimonials'] : $default_testimonials);
        ?>
        <section class="c-testimonials c-testimonials--<?= esc_attr($theme); ?>" id="<?= esc_attr($section_id); ?>" aria-label="<?= esc_attr($badge); ?>">
            <!-- Background Image & Ribbon 1:1 Figma 241:2019, 241:2031 -->
            <div class="c-testimonials__bg" aria-hidden="true">
                <img class="c-testimonials__bg-img" 
                     src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/theme-2026/testimonials-bg.png'); ?>" 
                     alt="" 
                     loading="lazy" 
                     decoding="async" 
                     width="1440" 
                     height="804">
                <img class="c-testimonials__ribbon" 
                     src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/theme-2026/testimonials-ribbon.svg'); ?>" 
                     alt="" 
                     loading="lazy" 
                     decoding="async" 
                     width="244" 
                     height="597">
            </div>

            <div class="c-container c-testimonials__container">
                <!-- Section Header 1:1 Figma 241:2041 -->
                <header class="c-testimonials__header">
                    <span class="c-testimonials__badge">
                        <span class="c-testimonials__badge-dot" aria-hidden="true"></span>
                        <?= esc_html($badge); ?>
                    </span>
                    <h2 class="c-testimonials__title"><?= esc_html($title); ?></h2>
                </header>

                <!-- Central Card 1:1 Figma 241:2020 (800px width) -->
                <div class="c-testimonials__card-wrap">
                    <div class="c-testimonials__card">
                        <!-- Neon Quote Icon 1:1 Figma 241:2021 -->
                        <div class="c-testimonials__quote-icon" aria-hidden="true">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.4477 4.78105C19.9478 4.28095 20.6261 4 21.3333 4H25.3333C26.0406 4 26.7189 4.28095 27.219 4.78105C27.719 5.28115 28 5.95942 28 6.66667V20C28 22.1217 27.1571 24.1566 25.6569 25.6569C24.1566 27.1571 22.1217 28 20 28C19.6464 28 19.3072 27.8595 19.0572 27.6095C18.8071 27.3594 18.6667 27.0203 18.6667 26.6667V24C18.6667 23.6464 18.8071 23.3072 19.0572 23.0572C19.3072 22.8071 19.6464 22.6667 20 22.6667C20.7072 22.6667 21.3855 22.3857 21.8856 21.8856C22.3857 21.3855 22.6667 20.7072 22.6667 20V18.6667C22.6667 18.313 22.5262 17.9739 22.2761 17.7239C22.0261 17.4738 21.687 17.3333 21.3333 17.3333C20.6261 17.3333 19.9478 17.0524 19.4477 16.5523C18.9476 16.0522 18.6667 15.3739 18.6667 14.6667V6.66667C18.6667 5.95942 18.9476 5.28115 19.4477 4.78105Z" stroke="#CBF400" stroke-width="2" stroke-linecap="round"/>
                                <path d="M4.78105 4.78105C5.28115 4.28095 5.95942 4 6.66667 4H10.6667C11.3739 4 12.0522 4.28095 12.5523 4.78105C13.0524 5.28115 13.3333 5.95942 13.3333 6.66667V20C13.3333 22.1217 12.4905 24.1566 10.9902 25.6569C9.4899 27.1571 7.45507 28 5.33333 28C4.97971 28 4.64057 27.8595 4.39052 27.6095C4.14048 27.3594 4 27.0203 4 26.6667V24C4 23.6464 4.14048 23.3072 4.39052 23.0572C4.64057 22.8071 4.97971 22.6667 5.33333 22.6667C6.04058 22.6667 6.71885 22.3857 7.21895 21.8856C7.71905 21.3855 8 20.7072 8 20V18.6667C8 18.313 7.85952 17.9739 7.60948 17.7239C7.35943 17.4738 7.02029 17.3333 6.66667 17.3333C5.95942 17.3333 5.28115 17.0524 4.78105 16.5523C4.28095 16.0522 4 15.3739 4 14.6667V6.66667C4 5.95942 4.28095 5.28115 4.78105 4.78105Z" stroke="#CBF400" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>

                        <!-- Swiper Slider Container -->
                        <div class="swiper c-testimonials__slider" role="region" aria-roledescription="carousel" aria-label="Opinie klientów">
                            <div class="swiper-wrapper">
                                <?php foreach ($testimonials_list as $item) : ?>
                                    <div class="swiper-slide c-testimonials__slide">
                                        <blockquote class="c-testimonials__quote">
                                            <p class="c-testimonials__text">"<?= esc_html($item['quote']); ?>"</p>
                                        </blockquote>

                                        <!-- Author Meta: Role & Company -->
                                        <div class="c-testimonials__author-meta">
                                            <span class="c-testimonials__role"><?= esc_html($item['role']); ?></span>
                                            <span class="c-testimonials__company"><?= esc_html($item['company']); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- 3 Dot Rotator Indicator -->
                        <div class="c-testimonials__dots swiper-pagination" role="tablist" aria-label="Testimonials pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_Testimonials', 'Theme2026_Testimonials', 10, 1);
