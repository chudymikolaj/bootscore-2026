<?php
/**
 * Component: CredentialsWall (Theme 2026)
 *
 * Hook: Home2026_CredentialsWall
 * Description: 1:1 Figma (Node 237:1419) credentials-section.
 * 13 accreditations in 2 rows + bottom stats banner.
 *
 * @package Bootscore_Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Home2026_CredentialsWall')) {
    /**
     * Renders the CredentialsWall section.
     *
     * @param array $data Component options and accreditation lists.
     * @return void
     */
    function Home2026_CredentialsWall($data = [])
    {
        $badge    = !empty($data['badge']) ? $data['badge'] : '✦ ACCREDITATIONS';
        $title    = !empty($data['title']) ? $data['title'] : 'Credentials across the full spectrum.';
        $subtitle = !empty($data['subtitle']) ? $data['subtitle'] : 'We hold certifications across the full spectrum of cyber security, IT compliance and payment security — including PCI SSC\'s full range of standards, ISO 27001 Lead Auditor, CISM, CISA, CRISC and CISSP. We\'re also proud members of the Business Centre Club, an exclusive network of trustworthy and reputable business organisations.';

        $full_stats_text = !empty($data['stats_banner_text']) 
            ? $data['stats_banner_text'] 
            : 'In PCI since v1.2. QSA-accredited since 2015. 200+ PCI DSS audits delivered across 60+ countries — with a 94% client retention rate and a 100% on-schedule record.';

        // Highlight "In PCI since v1.2." in neon lime 1:1 Figma 237:1454
        $highlight_target = 'In PCI since v1.2.';
        if (strpos($full_stats_text, $highlight_target) !== false) {
            $parts = explode($highlight_target, $full_stats_text, 2);
            $banner_html = '<span class="home-credentials-wall__banner-highlight">' . esc_html($highlight_target) . '</span>' . esc_html($parts[1]);
        } else {
            $banner_html = esc_html($full_stats_text);
        }

        // Row 1: 6 logos (Figma 237:1425)
        $row_1 = [
            ['code' => 'QSA', 'label' => 'QSA Logo'],
            ['code' => 'CISM', 'label' => 'CISM Logo'],
            ['code' => 'PA-QSA', 'label' => 'PA-QSA Logo'],
            ['code' => 'CISA', 'label' => 'CISA Logo'],
            ['code' => 'ASV', 'label' => 'ASV Logo'],
            ['code' => 'CGEIT', 'label' => 'CGEIT Logo'],
        ];

        // Row 2: 7 logos (Figma 237:1438)
        $row_2 = [
            ['code' => 'P2PE', 'label' => 'P2PE Logo'],
            ['code' => 'CRISC', 'label' => 'CRISC Logo'],
            ['code' => '3DS', 'label' => '3DS Logo'],
            ['code' => 'CISSP', 'label' => 'CISSP Logo'],
            ['code' => 'PIN', 'label' => 'PIN Logo'],
            ['code' => 'PenTest+', 'label' => 'PenTest+ Logo'],
            ['code' => 'ITIL', 'label' => 'ITIL Logo'],
        ];

        if (!empty($data['accreditations']) && is_array($data['accreditations'])) {
            $count = count($data['accreditations']);
            $split = ceil($count / 2);
            $row_1 = array_slice($data['accreditations'], 0, $split);
            $row_2 = array_slice($data['accreditations'], $split);
        }
        ?>
        <section class="home-credentials-wall" id="credentials-wall" aria-labelledby="credentials-wall-heading">
            <div class="c-container home-credentials-wall__container">
                <div class="home-credentials-wall__header">
                    <span class="home-credentials-wall__badge">
                        <span class="home-credentials-wall__badge-dot" aria-hidden="true"></span>
                        <?= esc_html($badge); ?>
                    </span>
                    <h2 id="credentials-wall-heading" class="home-credentials-wall__title"><?= esc_html($title); ?></h2>
                    <?php if (!empty($subtitle)) : ?>
                        <p class="home-credentials-wall__subtitle"><?= esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </div>

                <!-- 13 Accreditations in 2 rows 1:1 Figma 237:1424 -->
                <div class="home-credentials-wall__logos" role="list" aria-label="Professional Accreditations">
                    <div class="home-credentials-wall__row home-credentials-wall__row--1">
                        <?php foreach ($row_1 as $item) : 
                            $logo_label = !empty($item['label']) ? $item['label'] : (!empty($item['name']) ? $item['name'] : (!empty($item['code']) ? $item['code'] . ' Logo' : ''));
                            $logo_img = !empty($item['image']) ? $item['image'] : '';
                        ?>
                            <div class="home-credentials-wall__logo-block" role="listitem">
                                <?php if (!empty($logo_img)) : ?>
                                    <img src="<?= esc_url($logo_img); ?>" alt="<?= esc_attr($logo_label); ?>" class="home-credentials-wall__logo-img" loading="lazy" decoding="async">
                                <?php else : ?>
                                    <span class="home-credentials-wall__logo-text"><?= esc_html($logo_label); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="home-credentials-wall__row home-credentials-wall__row--2">
                        <?php foreach ($row_2 as $item) : 
                            $logo_label = !empty($item['label']) ? $item['label'] : (!empty($item['name']) ? $item['name'] : (!empty($item['code']) ? $item['code'] . ' Logo' : ''));
                            $logo_img = !empty($item['image']) ? $item['image'] : '';
                        ?>
                            <div class="home-credentials-wall__logo-block" role="listitem">
                                <?php if (!empty($logo_img)) : ?>
                                    <img src="<?= esc_url($logo_img); ?>" alt="<?= esc_attr($logo_label); ?>" class="home-credentials-wall__logo-img" loading="lazy" decoding="async">
                                <?php else : ?>
                                    <span class="home-credentials-wall__logo-text"><?= esc_html($logo_label); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Stats banner 1:1 Figma 237:1453 -->
                <div class="home-credentials-wall__stats-banner">
                    <p class="home-credentials-wall__banner-text"><?= $banner_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Home2026_CredentialsWall', 'Home2026_CredentialsWall', 10, 1);
