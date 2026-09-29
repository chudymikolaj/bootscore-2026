<?php
/**
 * Component: StatsBar (Theme 2026)
 *
 * Dedicated 4-column statistics bar 1:1 Figma:
 * HOME (313:3632), L1 (313:4110), L2 (313:4139).
 *
 * Features:
 * - 4 stat items with shield-check icon
 * - Value: 36px bold Instrument Sans
 * - Label: 14px Medium Grey (#858585)
 * - Desktop padding: 48px 100px, border-bottom 1px
 *
 * @package Bootscore Child
 * @subpackage Theme 2026 / Shared
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_StatsBar')) {
    /**
     * Render the Stats Bar component.
     *
     * @param array $data Configuration and metrics array.
     */
    function Theme2026_StatsBar($data = array())
    {
        $data = is_array($data) ? $data : array();

        $default_stats = array(
            array(
                'value' => '0+',
                'label' => '[Stat one]',
            ),
            array(
                'value' => '0%',
                'label' => '[Stat two]',
            ),
            array(
                'value' => '0+',
                'label' => '[Stat three]',
            ),
            array(
                'value' => '0/6',
                'label' => '[Stat four]',
            ),
        );

        $stats = (!empty($data['stats']) && is_array($data['stats'])) ? $data['stats'] : $default_stats;
        ?>
        <section class="c-stats-bar-2026" aria-label="Key Performance Metrics">
            <div class="c-stats-bar-2026__inner">
                <?php foreach ($stats as $idx => $stat): ?>
                    <div class="c-stats-bar-2026__item">
                        <div class="c-stats-bar-2026__icon-wrapper" aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L4 5V11.5C4 16.5 7.5 21 12 22C16.5 21 20 16.5 20 11.5V5L12 2Z" stroke="#CBF400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 11.5L11 13.5L15 9.5" stroke="#CBF400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="c-stats-bar-2026__content">
                            <span class="c-stats-bar-2026__value"><?= esc_html($stat['value']); ?></span>
                            <span class="c-stats-bar-2026__label"><?= esc_html($stat['label']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_StatsBar', 'Theme2026_StatsBar', 10, 1);
