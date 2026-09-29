<?php
/**
 * Component: CaseOutcomes (L2 Template)
 *
 * Hook: L2_2026_CaseOutcomes
 * 2-column split layout with section intro on the left and 6 metadata tiles + quote card on the right.
 *
 * @package Bootscore Child
 * @version 2.0.0 (2026)
 */

defined('ABSPATH') || exit;

if (!function_exists('L2_2026_CaseOutcomes')) {
    /**
     * Render CaseOutcomes section for L2 service detail template.
     *
     * @param array $args Optional custom data passed via do_action.
     * @return void
     */
    function L2_2026_CaseOutcomes($args = array())
    {
        $badge = !empty($args['badge']) ? esc_html($args['badge']) : 'CASE OUTCOMES';
        $title = !empty($args['title']) ? esc_html($args['title']) : '[Case outcomes heading]';
        $lead  = !empty($args['lead'])
            ? esc_html($args['lead'])
            : (!empty($args['description'])
                ? esc_html($args['description'])
                : '[Placeholder intro. Introduce the case study and note any confidentiality constraints. Replace before publishing.]');

        // Default 6 metadata items matching Figma 313:3671
        $default_meta = array(
            array(
                'label' => 'Industry',
                'value' => 'Sample industry',
                'icon'  => 'building',
            ),
            array(
                'label' => 'Region',
                'value' => 'Sample region',
                'icon'  => 'globe',
            ),
            array(
                'label' => 'Scale',
                'value' => 'Sample scale',
                'icon'  => 'layers',
            ),
            array(
                'label' => 'Scope',
                'value' => 'Sample scope',
                'icon'  => 'ruler',
            ),
            array(
                'label' => 'Duration',
                'value' => 'Sample duration',
                'icon'  => 'calendar',
            ),
            array(
                'label' => 'Outcome',
                'value' => 'Sample outcome',
                'icon'  => 'trophy',
            ),
        );

        $meta_items = !empty($args['metadata']) && is_array($args['metadata']) ? $args['metadata'] : $default_meta;

        // Quote data
        $quote_text   = !empty($args['quote'])
            ? esc_html($args['quote'])
            : '"[Sample quote. Replace with a real, attributed client quote before publishing.]"';
        $quote_author = !empty($args['author']) ? esc_html($args['author']) : '[ATTRIBUTION]';
        ?>
        <section class="c-l2-case-outcomes" id="case-outcomes" aria-labelledby="case-outcomes-heading">
            <!-- Background Glow Vector (Figma 313:3664) -->
            <svg class="c-l2-case-outcomes__vector" width="318" height="700" viewBox="0 0 318 700" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M0 0L258.394 52.7379V500.738L0.307253 638.291V700L318 530.369V0H0Z" fill="#3F8AFD" fill-opacity="0.0784314"/>
            </svg>

            <div class="c-container c-l2-case-outcomes__container">
                <div class="c-l2-case-outcomes__badge-wrap">
                    <span class="c-badge c-badge--light c-l2-case-outcomes__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= $badge; ?></span>
                </div>

                <div class="c-l2-case-outcomes__layout">
                    <!-- Left Content -->
                    <div class="c-l2-case-outcomes__left">
                        <h2 id="case-outcomes-heading" class="c-l2-case-outcomes__title">
                            <?= $title; ?>
                        </h2>
                        <?php if (!empty($lead)) : ?>
                            <p class="c-l2-case-outcomes__lead">
                                <?= $lead; ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Right Outcomes Card -->
                    <div class="c-l2-case-outcomes__card">
                        <!-- 6 Metadata Tiles Grid -->
                        <div class="c-l2-case-outcomes__meta-grid">
                            <?php foreach ($meta_items as $item) :
                                $m_label = !empty($item['label']) ? esc_html($item['label']) : '';
                                $m_val   = !empty($item['value']) ? esc_html($item['value']) : '';
                                $m_icon  = !empty($item['icon']) ? $item['icon'] : 'building';
                                ?>
                                <div class="c-l2-case-outcomes__meta-item">
                                    <div class="c-l2-case-outcomes__meta-icon-container" aria-hidden="true">
                                        <?php if ($m_icon === 'building') : ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M8 10h.01"></path><path d="M16 10h.01"></path><path d="M8 14h.01"></path><path d="M16 14h.01"></path></svg>
                                        <?php elseif ($m_icon === 'globe') : ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                        <?php elseif ($m_icon === 'layers') : ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                        <?php elseif ($m_icon === 'ruler') : ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.3 8.7-6-6a1 1 0 0 0-1.4 0l-11 11a1 1 0 0 0 0 1.4l6 6a1 1 0 0 0 1.4 0l11-11a1 1 0 0 0 0-1.4Z"></path><path d="m7.5 10.5 2 2"></path><path d="m10.5 7.5 2 2"></path><path d="m13.5 4.5 2 2"></path><path d="m4.5 13.5 2 2"></path></svg>
                                        <?php elseif ($m_icon === 'calendar') : ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                        <?php elseif ($m_icon === 'trophy') : ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path></svg>
                                        <?php else : ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <?php endif; ?>
                                    </div>
                                    <div class="c-l2-case-outcomes__meta-text">
                                        <span class="c-l2-case-outcomes__meta-label"><?= $m_label; ?></span>
                                        <span class="c-l2-case-outcomes__meta-val"><?= $m_val; ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Divider Line -->
                        <div class="c-l2-case-outcomes__divider" aria-hidden="true"></div>

                        <!-- Quote Block -->
                        <div class="c-l2-case-outcomes__quote-block">
                            <div class="c-l2-case-outcomes__quote-icon" aria-hidden="true">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3F8AFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"></path></svg>
                            </div>
                            <blockquote class="c-l2-case-outcomes__quote-content">
                                <p class="c-l2-case-outcomes__quote-text"><?= $quote_text; ?></p>
                                <cite class="c-l2-case-outcomes__quote-attribution"><?= $quote_author; ?></cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('L2_2026_CaseOutcomes', 'L2_2026_CaseOutcomes', 10, 1);
