<?php
/**
 * Component: Process (L2 Template)
 *
 * Hook: L2_2026_Process
 * 4-Stage process cards matching Figma 207:1803.
 *
 * @package Bootscore Child
 * @version 2.0.0 (2026)
 */

defined('ABSPATH') || exit;

if (!function_exists('L2_2026_Process')) {
    /**
     * Render Process section for L2 service detail template.
     *
     * @param array $args Optional custom data passed via do_action.
     * @return void
     */
    function L2_2026_Process($args = array())
    {
        $badge = !empty($args['badge']) ? esc_html($args['badge']) : 'PROCESS';
        $title = !empty($args['title']) ? esc_html($args['title']) : '[How it works]';
        $lead  = !empty($args['description'])
            ? esc_html($args['description'])
            : '[Placeholder intro. Walk the reader through the engagement from start to finish.]';

        $step_placeholder = '[Placeholder copy. Describe the first step of the engagement process in practical milestones.]';

        // Default 4 stages (Figma 207:1803)
        $default_stages = array(
            array(
                'number'      => '1',
                'title'       => '[Step one]',
                'description' => $step_placeholder,
            ),
            array(
                'number'      => '2',
                'title'       => '[Step two]',
                'description' => $step_placeholder,
            ),
            array(
                'number'      => '3',
                'title'       => '[Step three]',
                'description' => $step_placeholder,
            ),
            array(
                'number'      => '4',
                'title'       => '[Step four]',
                'description' => $step_placeholder,
            ),
        );

        $stages = array();
        if (!empty($args['stages']) && is_array($args['stages'])) {
            $stages = $args['stages'];
        } elseif (!empty($args['items']) && is_array($args['items'])) {
            $stages = $args['items'];
        } elseif (!empty($args['steps']) && is_array($args['steps'])) {
            $stages = $args['steps'];
        } else {
            $stages = $default_stages;
        }
        ?>
        <section class="c-l2-process" id="assessment-process" aria-labelledby="process-heading">
            <div class="c-container">
                <header class="c-l2-process__header">
                    <span class="c-badge c-badge--clear c-l2-process__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= $badge; ?></span>
                    <h2 id="process-heading" class="c-l2-process__title">
                        <?= $title; ?>
                    </h2>
                    <?php if (!empty($lead)) : ?>
                        <p class="c-l2-process__lead">
                            <?= $lead; ?>
                        </p>
                    <?php endif; ?>
                </header>

                <div class="c-l2-process__grid">
                    <?php foreach ($stages as $index => $stage) :
                        $num      = !empty($stage['number']) ? esc_html($stage['number']) : (string)($index + 1);
                        $st_title = !empty($stage['title']) ? esc_html($stage['title']) : '';
                        $st_desc  = !empty($stage['description']) ? esc_html($stage['description']) : '';
                        ?>
                        <article class="c-l2-process__card">
                            <div class="c-l2-process__step-badge-row">
                                <div class="c-l2-process__num-badge">
                                    <span class="c-l2-process__num"><?= $num; ?></span>
                                </div>
                                <div class="c-l2-process__tech-indicator" aria-hidden="true">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#9FC7F0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                        <polyline points="16 7 22 7 22 13"></polyline>
                                    </svg>
                                </div>
                            </div>

                            <div class="c-l2-process__card-body">
                                <h3 class="c-l2-process__step-title"><?= $st_title; ?></h3>
                                <p class="c-l2-process__step-desc"><?= $st_desc; ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('L2_2026_Process', 'L2_2026_Process', 10, 1);
