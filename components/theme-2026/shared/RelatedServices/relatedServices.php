<?php
/**
 * Theme 2026 - Related Services Component
 *
 * 3-column responsive grid showcasing complementary security & compliance practices,
 * category brackets [PAYMENT SECURITY], actionable links with animated arrow, and dual theme support
 * ('light' for L1, 'dark' for L2).
 *
 * @package    Bootscore_Child
 * @subpackage Theme_2026\Shared
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_RelatedServices')) {
    /**
     * Render the Related Services component.
     *
     * @param array $data {
     *     Optional. Component configuration and custom content.
     *
     *     @type string $theme       Visual theme: 'light' (L1) or 'dark' (L2). Default 'dark'.
     *     @type string $badge       Section badge text. Default 'EXPLORE FURTHER'.
     *     @type string $title       Section heading (H2). Default 'Complementary Security & Compliance Practices'.
     *     @type string $subtitle    Optional descriptive subtitle.
     *     @type array  $items       Array of related service cards. Each item:
     *                               [
     *                                   'category'    => string (e.g. 'PAYMENT SECURITY'),
     *                                   'title'       => string (e.g. 'PCI 3-D Secure (3DS) Assessment'),
     *                                   'description' => string,
     *                                   'link'        => string (URL),
     *                                   'link_text'   => string (default 'Learn more'),
     *                               ]
     *     @type string $id          Element ID for the section.
     *     @type string $class_name  Additional CSS class names.
     * }
     * @return void
     */
    function Theme2026_RelatedServices($data = [])
    {
        $data = is_array($data) ? $data : [];

        $theme       = (!empty($data['theme']) && in_array($data['theme'], ['light', 'dark'], true)) ? $data['theme'] : 'dark';
        $badge       = !empty($data['badge']) ? $data['badge'] : 'RELATED SERVICES';
        $title       = !empty($data['title']) ? $data['title'] : 'Other services you might be interested in';
        $default_subtitle = $theme === 'light' 
            ? '[Placeholder intro. Describe the resources offered and any access conditions.]'
            : '';
        $subtitle = isset($data['subtitle']) ? $data['subtitle'] : $default_subtitle;
        $section_id  = !empty($data['id']) ? $data['id'] : 'related-services-section';
        $class_name  = !empty($data['class_name']) ? ' ' . esc_attr($data['class_name']) : '';

        // Default 3 related services matching Figma (L1 133:1676 vs L2 132:1290)
        $default_items = $theme === 'light' ? [
            [
                'title'       => '[Title one]',
                'description' => '[Placeholder description for the first downloadable resource.]',
                'link'        => '#',
                'link_text'   => 'Learn more',
            ],
            [
                'title'       => '[Title two]',
                'description' => '[Placeholder description for the second downloadable resource.]',
                'link'        => '#',
                'link_text'   => 'Learn more',
            ],
            [
                'title'       => '[Title three]',
                'description' => '[Placeholder description for the third downloadable resource.]',
                'link'        => '#',
                'link_text'   => 'Learn more',
            ],
        ] : [
            [
                'category'    => '[CATEGORY]',
                'title'       => '[Related service one]',
                'description' => '[Placeholder blurb. Describe this related service and how it complements the current offering.]',
                'link'        => '#',
                'link_text'   => 'Learn more',
            ],
            [
                'category'    => '[CATEGORY]',
                'title'       => '[Related service two]',
                'description' => '[Placeholder blurb. Describe this related service and how it complements the current offering.]',
                'link'        => '#',
                'link_text'   => 'Learn more',
            ],
            [
                'category'    => '[CATEGORY]',
                'title'       => '[Related service three]',
                'description' => '[Placeholder blurb. Describe this related service and how it complements the current offering.]',
                'link'        => '#',
                'link_text'   => 'Learn more',
            ],
        ];

        // Resolve items
        if (!empty($data['items']) && is_array($data['items'])) {
            $items = $data['items'];
        } elseif (!empty($data['services']) && is_array($data['services'])) {
            $items = $data['services'];
        } elseif (!empty($data['resources']) && is_array($data['resources'])) {
            $items = $data['resources'];
        } else {
            $items = $default_items;
        }

        if (empty($items)) {
            return;
        }
        ?>
        <section class="c-section c-related-services c-related-services--<?= esc_attr($theme); ?><?= $class_name; ?>" id="<?= esc_attr($section_id); ?>">
            <div class="c-container c-related-services__container">
                <header class="c-related-services__header">
                    <span class="c-badge <?= $theme === 'light' ? 'c-badge--light' : 'c-badge--clear'; ?> c-related-services__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= esc_html($badge); ?></span>
                    <h2 class="c-h2 c-related-services__title"><?= esc_html($title); ?></h2>
                    <?php if (!empty($subtitle)) : ?>
                        <p class="c-related-services__subtitle"><?= esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </header>

                <div class="c-related-services__grid">
                    <?php foreach ($items as $index => $item) :
                        $category    = !empty($item['category']) ? trim($item['category'], '[] ') : '';
                        $item_title  = !empty($item['title']) ? $item['title'] : '';
                        $description = !empty($item['description']) ? $item['description'] : '';
                        $link        = !empty($item['link']) ? $item['link'] : (!empty($item['download_url']) ? $item['download_url'] : '#');
                        $link_text   = !empty($item['link_text']) ? $item['link_text'] : (!empty($item['btn_text']) ? $item['btn_text'] : 'Learn more');

                        if (empty($item_title)) {
                            continue;
                        }
                    ?>
                        <article class="c-related-services__card" data-index="<?= esc_attr($index); ?>">
                            <a href="<?= esc_url($link); ?>" class="c-related-services__card-link">
                                <?php if ($theme === 'light' || !empty($item['show_icon'])) : ?>
                                    <div class="c-related-services__icon-wrapper" aria-hidden="true">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg>
                                    </div>
                                <?php elseif (!empty($category)) : ?>
                                    <div class="c-related-services__category" aria-label="Service category">
                                        [<?= esc_html($category); ?>]
                                    </div>
                                <?php endif; ?>

                                <h3 class="c-related-services__item-title"><?= esc_html($item_title); ?></h3>
                                <?php if (!empty($description)) : ?>
                                    <p class="c-related-services__description"><?= esc_html($description); ?></p>
                                <?php endif; ?>
                                <div class="c-related-services__action">
                                    <span class="c-related-services__action-text"><?= esc_html($link_text); ?></span>
                                    <span class="c-related-services__arrow" aria-hidden="true">&rarr;</span>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_RelatedServices', 'Theme2026_RelatedServices', 10, 1);
