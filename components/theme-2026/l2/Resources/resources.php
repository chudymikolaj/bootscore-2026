<?php
/**
 * Component: Resources (L2 Template)
 *
 * Hook: L2_2026_Resources
 * 3 downloadable resource cards matching Figma 132:1227.
 *
 * @package Bootscore Child
 * @version 2.0.0 (2026)
 */

defined('ABSPATH') || exit;

if (!function_exists('L2_2026_Resources')) {
    /**
     * Render Resources section for L2 service detail template.
     *
     * @param array $args Optional custom data passed via do_action.
     * @return void
     */
    function L2_2026_Resources($args = array())
    {
        $badge = !empty($args['badge']) ? esc_html($args['badge']) : 'RESOURCES';
        $title = !empty($args['title']) ? esc_html($args['title']) : '[Free resources to download]';
        $lead  = !empty($args['description'])
            ? esc_html($args['description'])
            : '[Placeholder intro. Describe the resources offered and any access conditions.]';

        // Default 3 downloadable resource cards (Figma 132:1227)
        $default_resources = array(
            array(
                'title'        => '[Resource title one]',
                'format'       => 'PDF',
                'size'         => '[SIZE]',
                'description'  => '[Placeholder description for the first downloadable resource.]',
                'download_url' => '#',
                'btn_text'     => 'Download',
            ),
            array(
                'title'        => '[Resource title two]',
                'format'       => 'PDF',
                'size'         => '[SIZE]',
                'description'  => '[Placeholder description for the second downloadable resource.]',
                'download_url' => '#',
                'btn_text'     => 'Download',
            ),
            array(
                'title'        => '[Resource title three]',
                'format'       => 'PDF',
                'size'         => '[SIZE]',
                'description'  => '[Placeholder description for the third downloadable resource.]',
                'download_url' => '#',
                'btn_text'     => 'Download',
            ),
        );

        $resources = array();
        if (!empty($args['resources']) && is_array($args['resources'])) {
            $resources = $args['resources'];
        } elseif (!empty($args['items']) && is_array($args['items'])) {
            $resources = $args['items'];
        } else {
            $resources = $default_resources;
        }
        ?>
        <section class="c-l2-resources" id="resources-guides" aria-labelledby="resources-heading">
            <div class="c-container">
                <header class="c-l2-resources__header">
                    <span class="c-badge c-badge--light c-l2-resources__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= $badge; ?></span>
                    <h2 id="resources-heading" class="c-l2-resources__title">
                        <?= $title; ?>
                    </h2>
                    <?php if (!empty($lead)) : ?>
                        <p class="c-l2-resources__lead">
                            <?= $lead; ?>
                        </p>
                    <?php endif; ?>
                </header>

                <div class="c-l2-resources__grid">
                    <?php foreach ($resources as $res) :
                        $r_title = !empty($res['title']) ? esc_html($res['title']) : '';
                        $r_fmt   = !empty($res['format']) ? esc_html($res['format']) : 'PDF';
                        $r_size  = !empty($res['size']) ? esc_html($res['size']) : '[SIZE]';
                        $r_desc  = !empty($res['description']) ? esc_html($res['description']) : '';
                        $r_url   = !empty($res['download_url']) ? esc_url($res['download_url']) : '#';
                        $r_btn   = !empty($res['btn_text']) ? esc_html($res['btn_text']) : 'Download';
                        ?>
                        <article class="c-l2-resources__card">
                            <div class="c-l2-resources__top-meta">
                                <div class="c-l2-resources__doc-icon" aria-hidden="true">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg>
                                </div>
                                <div class="c-l2-resources__pills">
                                    <span class="c-l2-resources__pill"><?= $r_fmt; ?></span>
                                    <span class="c-l2-resources__pill"><?= $r_size; ?></span>
                                </div>
                            </div>

                            <div class="c-l2-resources__content">
                                <h3 class="c-l2-resources__card-title"><?= $r_title; ?></h3>
                                <p class="c-l2-resources__card-desc"><?= $r_desc; ?></p>
                            </div>

                            <div class="c-l2-resources__action">
                                <a href="<?= $r_url; ?>" class="c-l2-resources__download-link" download aria-label="Download <?= $r_title; ?>">
                                    <svg class="c-l2-resources__download-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                    <span class="c-l2-resources__download-text"><?= $r_btn; ?></span>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('L2_2026_Resources', 'L2_2026_Resources', 10, 1);
