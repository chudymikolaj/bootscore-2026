<?php
/**
 * Component: StartingPoint (Theme 2026)
 *
 * Hook: Home2026_StartingPoint
 * Description: 1:1 Figma (Node 233:1296) starting-point-section.
 * 2x2 Grid of horizontal situation cards guiding users to the right service.
 *
 * @package Bootscore_Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Home2026_StartingPoint')) {
    /**
     * Renders the StartingPoint section.
     *
     * @param array $data Component options and card items.
     * @return void
     */
    function Home2026_StartingPoint($data = [])
    {
        $badge    = !empty($data['badge']) ? $data['badge'] : '✦ WHERE ARE YOU STARTING FROM?';
        $title    = !empty($data['title']) ? $data['title'] : "Not sure where to start? Tell us what's bringing you here.";
        $subtitle = !empty($data['subtitle']) ? $data['subtitle'] : "Pick the situation closest to yours - we'll take you straight to the right service.";

        $default_items = [
            [
                'title'  => 'We need PCI DSS or payment security certification',
                'target' => 'pci-dss',
                'icon'   => 'credit-card',
            ],
            [
                'title'  => 'We need to meet a regulation or standard - ISO 27001, DORA, NIS2, TISAX',
                'target' => 'regulatory',
                'icon'   => 'shield-check',
            ],
            [
                'title'  => 'We want ongoing security leadership - vCISO',
                'target' => 'vciso',
                'icon'   => 'users',
            ],
            [
                'title'  => 'We need testing or incident readiness - penetration testing, business continuity, awareness training',
                'target' => 'technical',
                'icon'   => 'trending-up',
            ],
        ];

        $items = !empty($data['items']) && is_array($data['items']) ? $data['items'] : $default_items;
        ?>
        <section class="home-starting-point" id="starting-point" aria-labelledby="starting-point-heading">
            <div class="c-container home-starting-point__container">
                <div class="home-starting-point__header">
                    <span class="home-starting-point__badge">
                        <span class="home-starting-point__badge-dot" aria-hidden="true"></span>
                        <?= esc_html($badge); ?>
                    </span>
                    <h2 id="starting-point-heading" class="home-starting-point__title"><?= esc_html($title); ?></h2>
                    <?php if (!empty($subtitle)) : ?>
                        <p class="home-starting-point__subtitle"><?= esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </div>

                <div class="home-starting-point__grid" role="list">
                    <?php foreach ($items as $index => $item) : ?>
                        <?php
                        $target_id = !empty($item['target']) ? esc_attr($item['target']) : 'service-' . ($index + 1);
                        ?>
                        <div class="home-starting-point__col" role="listitem">
                            <a href="#service-<?= $target_id; ?>" 
                               class="home-starting-point__card" 
                               data-target="<?= $target_id; ?>">
                                <div class="home-starting-point__card-icon" aria-hidden="true">
                                    <?php if ($item['icon'] === 'credit-card') : ?>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 6.42857H18M1.8 0H16.2C17.1941 0 18 1.15127 18 2.57143V15.4286C18 16.8487 17.1941 18 16.2 18H1.8C0.805887 18 0 16.8487 0 15.4286V2.57143C0 1.15127 0.805887 0 1.8 0Z" stroke="#15803D" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    <?php elseif ($item['icon'] === 'shield-check') : ?>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.625 8.99849L7.875 10.7982L12.375 7.19879M18 9.89875C18 14.398 14.0625 16.6476 9.3825 17.9524C9.13743 18.0188 8.87123 18.0156 8.62875 17.9434C3.9375 16.6476 0 14.398 0 9.89875V3.5998C0 3.36115 0.118527 3.13227 0.329505 2.96351C0.540484 2.79476 0.826631 2.69995 1.125 2.69995C3.375 2.69995 6.1875 1.62013 8.145 0.252362C8.38334 0.0894885 8.68652 0 9 0C9.31348 0 9.61666 0.0894885 9.855 0.252362C11.8238 1.62913 14.625 2.69995 16.875 2.69995C17.1734 2.69995 17.4595 2.79476 17.6705 2.96351C17.8815 3.13227 18 3.36115 18 3.5998V9.89875Z" stroke="#15803D" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    <?php elseif ($item['icon'] === 'users') : ?>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.6 18V16C12.6 14.9391 12.2207 13.9217 11.5456 13.1716C10.8705 12.4214 9.95478 12 9 12H3.6C2.64522 12 1.72955 12.4214 1.05442 13.1716C0.379285 13.9217 0 14.9391 0 16V18M12.6 0.12793C13.372 0.350299 14.0557 0.851194 14.5437 1.55199C15.0318 2.25279 15.2966 3.11382 15.2966 3.99993C15.2966 4.88604 15.0318 5.74707 14.5437 6.44787C14.0557 7.14867 13.372 7.64956 12.6 7.87193M18 17.9999V15.9999C17.9994 15.1136 17.7339 14.2527 17.2452 13.5522C16.7565 12.8517 16.0723 12.3515 15.3 12.1299M9.9 4C9.9 6.20914 8.28823 8 6.3 8C4.31178 8 2.7 6.20914 2.7 4C2.7 1.79086 4.31178 0 6.3 0C8.28823 0 9.9 1.79086 9.9 4Z" stroke="#15803D" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    <?php else : ?>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 10.8V0H12.6M18 0L10.35 15.3L5.85 6.3L0 18" stroke="#15803D" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <span class="home-starting-point__card-title"><?= esc_html($item['title']); ?></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Home2026_StartingPoint', 'Home2026_StartingPoint', 10, 1);
