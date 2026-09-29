<?php
/**
 * Theme 2026 - FAQ Component (Accordion)
 *
 * Accessible accordion with WAI-ARIA compliance, CSS Grid smooth expand/collapse (0fr -> 1fr),
 * rotating plus/cross icon, and full theme (dark / light) support.
 *
 * @package    Bootscore_Child
 * @subpackage Theme_2026\Shared
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_Faq')) {
    /**
     * Render the FAQ Component.
     *
     * @param array $data {
     *     Optional. Configuration and content for the FAQ section.
     *
     *     @type string $badge       Section badge text. Default 'COMMON QUESTIONS'.
     *     @type string $title       Section title (H2). Default 'Frequently Asked Questions'.
     *     @type string $subtitle    Optional descriptive subtitle.
     *     @type string $theme       Visual theme: 'dark' (default) or 'light'.
     *     @type array  $items       Array of FAQ items. Each item:
     *                               [
     *                                   'question' => string,
     *                                   'answer'   => string (HTML allowed),
     *                               ]
     *     @type bool   $open_first  Whether the first accordion item starts open. Default false.
     *     @type string $id          Element ID for the section.
     *     @type string $class_name  Additional CSS class names.
     * }
     * @return void
     */
    function Theme2026_Faq($data = [])
    {
        $data = is_array($data) ? $data : [];

        $theme       = (!empty($data['theme']) && in_array($data['theme'], ['light', 'dark'], true)) ? $data['theme'] : 'dark';
        $badge       = !empty($data['badge']) ? $data['badge'] : 'QUESTIONS';
        $title       = !empty($data['title']) ? $data['title'] : '[Frequently asked questions]';
        $subtitle    = isset($data['subtitle']) ? $data['subtitle'] : '';
        $open_first  = !empty($data['open_first']);
        $section_id  = !empty($data['id']) ? $data['id'] : 'faq-section';
        $class_name  = !empty($data['class_name']) ? ' ' . esc_attr($data['class_name']) : '';

        $placeholder_ans = '[Placeholder answer text goes here.]';

        // Default 4 questions matching Figma (133:1618, 132:1169, 237:1590)
        $default_items = [
            [
                'question' => '[Question one?]',
                'answer'   => $placeholder_ans,
            ],
            [
                'question' => '[Question two?]',
                'answer'   => $placeholder_ans,
            ],
            [
                'question' => '[Question three?]',
                'answer'   => $placeholder_ans,
            ],
            [
                'question' => '[Question four?]',
                'answer'   => $placeholder_ans,
            ],
        ];

        // Resolve items (support both 'items' and 'faq' keys)
        if (!empty($data['items']) && is_array($data['items'])) {
            $items = $data['items'];
        } elseif (!empty($data['faq']) && is_array($data['faq'])) {
            $items = $data['faq'];
        } else {
            $items = $default_items;
        }

        if (empty($items)) {
            return;
        }
        ?>
        <section class="c-section c-faq c-faq--<?= esc_attr($theme); ?><?= $class_name; ?>" id="<?= esc_attr($section_id); ?>">
            <div class="c-container c-faq__container">
                <header class="c-faq__header">
                    <span class="c-badge <?= $theme === 'light' ? 'c-badge--light' : 'c-badge--clear'; ?> c-faq__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= esc_html($badge); ?></span>
                    <h2 class="c-h2 c-faq__title"><?= esc_html($title); ?></h2>
                    <?php if (!empty($subtitle)) : ?>
                        <p class="c-faq__subtitle"><?= esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </header>

                <div class="c-faq__list" role="region" aria-label="<?= esc_attr($title); ?>">
                    <?php foreach ($items as $index => $item) :
                        $question = !empty($item['question']) ? $item['question'] : '';
                        $answer   = !empty($item['answer']) ? $item['answer'] : '';

                        if (empty($question)) {
                            continue;
                        }

                        $item_id    = $section_id . '-item-' . ($index + 1);
                        $trigger_id = $section_id . '-trigger-' . ($index + 1);
                        $content_id = $section_id . '-content-' . ($index + 1);
                        $is_open    = ($open_first && $index === 0);
                    ?>
                        <article class="c-faq__item<?= $is_open ? ' is-open' : ''; ?>" id="<?= esc_attr($item_id); ?>" data-index="<?= esc_attr($index); ?>">
                            <h3 class="c-faq__question">
                                <button
                                    type="button"
                                    class="c-faq__trigger"
                                    id="<?= esc_attr($trigger_id); ?>"
                                    aria-expanded="<?= $is_open ? 'true' : 'false'; ?>"
                                    aria-controls="<?= esc_attr($content_id); ?>"
                                >
                                    <span class="c-faq__question-text"><?= esc_html($question); ?></span>
                                    <span class="c-faq__icon-wrapper" aria-hidden="true">
                                        <svg class="c-faq__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 4V16M4 10H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <div
                                class="c-faq__content"
                                id="<?= esc_attr($content_id); ?>"
                                role="region"
                                aria-labelledby="<?= esc_attr($trigger_id); ?>"
                            >
                                <div class="c-faq__content-inner">
                                    <div class="c-faq__answer">
                                        <?= wp_kses_post($answer); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_Faq', 'Theme2026_Faq', 10, 1);
