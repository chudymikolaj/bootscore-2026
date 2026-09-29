<?php
/**
 * Component: CaseStudies (Theme 2026)
 *
 * Hook: Theme2026_CaseStudies
 * Description: 1:1 Figma (Node 237:1524) case-studies-section.
 * 3 cards with persona badge, icon wrapper, situation, outcome, and bottom metric row.
 *
 * @package Bootscore_Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_CaseStudies')) {
    /**
     * Render the Case Studies component.
     *
     * @param array $data Component configuration.
     * @return void
     */
    function Theme2026_CaseStudies($data = [])
    {
        $data = is_array($data) ? $data : [];

        $badge       = !empty($data['badge']) ? $data['badge'] : '✦ CASE STUDIES';
        $title       = !empty($data['title']) ? $data['title'] : '[Case studies heading]';
        $description = !empty($data['description']) 
            ? $data['description'] 
            : '[Placeholder intro. Introduce the case studies and note any confidentiality constraints. Replace before publishing.]';
        $section_id  = !empty($data['id']) ? $data['id'] : 'case-studies-section';

        $placeholder_situation = '[Placeholder situation. Describe the challenge this client faced.]';
        $placeholder_outcome   = '[Placeholder outcome. Describe the result delivered.]';

        $default_items = [
            [
                'badge'     => '[Client persona one]',
                'title'     => 'PCI-DSS v4 Scope Reduction',
                'situation' => $placeholder_situation,
                'outcome'   => $placeholder_outcome,
                'metric'    => '[Metric]',
                'icon'      => 'shield-check',
            ],
            [
                'badge'     => '[Client persona two]',
                'title'     => 'Emergency Vault Mitigation',
                'situation' => $placeholder_situation,
                'outcome'   => $placeholder_outcome,
                'metric'    => '[Metric]',
                'icon'      => 'cpu',
            ],
            [
                'badge'     => '[Client persona three]',
                'title'     => 'Air-gapped Key Custody',
                'situation' => $placeholder_situation,
                'outcome'   => $placeholder_outcome,
                'metric'    => '[Metric]',
                'icon'      => 'key',
            ],
        ];

        $items = !empty($data['items']) && is_array($data['items']) ? $data['items'] : $default_items;
        ?>
        <section class="c-case-studies" id="<?= esc_attr($section_id); ?>" aria-label="<?= esc_attr($badge); ?>">
            <div class="c-container c-case-studies__container">
                <!-- Section Header 1:1 Figma 237:1525 -->
                <header class="c-case-studies__header">
                    <span class="c-case-studies__badge">
                        <span class="c-case-studies__badge-dot" aria-hidden="true"></span>
                        <?= esc_html($badge); ?>
                    </span>
                    <h2 class="c-case-studies__title"><?= esc_html($title); ?></h2>
                    <?php if (!empty($description)) : ?>
                        <p class="c-case-studies__description"><?= esc_html($description); ?></p>
                    <?php endif; ?>
                </header>

                <!-- Grid: 1-Column full width or 3-Column Grid 1:1 Figma -->
                <?php $is_single = count($items) === 1; ?>
                <div class="c-case-studies__grid <?= $is_single ? 'c-case-studies__grid--single' : ''; ?>" role="list">
                    <?php foreach ($items as $item) : ?>
                        <div class="c-case-studies__col" role="listitem">
                            <article class="c-case-studies__card">
                                <!-- Header Row: Persona Badge + Icon Wrapper -->
                                <div class="c-case-studies__card-header">
                                    <span class="c-case-studies__persona-badge"><?= esc_html($item['badge']); ?></span>
                                    <div class="c-case-studies__icon-wrapper" aria-hidden="true">
                                        <?php if ($item['icon'] === 'cpu') : ?>
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3F8AFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="4" y="4" width="16" height="16" rx="2"/>
                                                <rect x="9" y="9" width="6" height="6"/>
                                                <path d="M15 2v2M9 2v2M15 20v2M9 20v2M2 15h2M2 9h2M20 15h2M20 9h2"/>
                                            </svg>
                                        <?php elseif ($item['icon'] === 'key') : ?>
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3F8AFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="7.5" cy="15.5" r="5.5"/>
                                                <path d="m21 2-9.6 9.6M15.5 7.5l3 3L22 7l-3-3"/>
                                            </svg>
                                        <?php else : ?>
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3F8AFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                                <path d="m9 12 2 2 4-4"/>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h3 class="c-case-studies__card-title"><?= esc_html($item['title']); ?></h3>

                                <!-- Scenario Details: Situation & Outcome -->
                                <div class="c-case-studies__scenario-details">
                                    <div class="c-case-studies__block">
                                        <span class="c-case-studies__label c-case-studies__label--situation">SITUATION</span>
                                        <p class="c-case-studies__text"><?= esc_html($item['situation']); ?></p>
                                    </div>
                                    <div class="c-case-studies__block">
                                        <span class="c-case-studies__label c-case-studies__label--outcome">OUTCOME</span>
                                        <p class="c-case-studies__text"><?= esc_html($item['outcome']); ?></p>
                                    </div>
                                </div>

                                <div class="c-case-studies__divider" aria-hidden="true"></div>

                                <!-- Metric Row 1:1 Figma 237:1546 -->
                                <div class="c-case-studies__metric-row">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#CBF400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M3 3v18h18"/>
                                        <path d="m19 9-5 5-4-4-3 3"/>
                                    </svg>
                                    <span class="c-case-studies__metric-text"><?= esc_html($item['metric']); ?></span>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_CaseStudies', 'Theme2026_CaseStudies', 10, 1);
