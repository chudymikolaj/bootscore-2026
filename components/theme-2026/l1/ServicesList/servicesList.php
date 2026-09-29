<?php
/**
 * Component: Services List (L1 Specific)
 *
 * 3x2 Grid showcasing the 6 specialized payment security & compliance services
 * available within this practice hub on a cyber dark background (#070A12).
 *
 * @package Bootscore Child
 * @subpackage Theme_2026
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

if (!function_exists('L1_2026_ServicesList')) {
    /**
     * Render the Services List section on L1 template.
     *
     * @param array $args Data array passed via action hook or template.
     */
    function L1_2026_ServicesList($args = array())
    {
        $badge = !empty($args['badge'])
            ? $args['badge']
            : 'WHO [SAMPLE SERVICE] IS FOR';

        $title = !empty($args['title'])
            ? $args['title']
            : 'Services section heading';

        $lead = !empty($args['lead'])
            ? $args['lead']
            : '';

        $placeholder_desc = '[Placeholder copy. Describe a common pain point, compliance blocker, or operational scenario that this service directly addresses.]';

        $default_services = array(
            array(
                'id'          => 'service-1',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'link_url'    => '#',
                'link_text'   => 'Learn more',
                'icon_type'   => 'shield-roc',
            ),
            array(
                'id'          => 'service-2',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'link_url'    => '#',
                'link_text'   => 'Learn more',
                'icon_type'   => '3ds-shield',
            ),
            array(
                'id'          => 'service-3',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'link_url'    => '#',
                'link_text'   => 'Learn more',
                'icon_type'   => 'pin-pad',
            ),
            array(
                'id'          => 'service-4',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'link_url'    => '#',
                'link_text'   => 'Learn more',
                'icon_type'   => 'p2pe-lock',
            ),
            array(
                'id'          => 'service-5',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'link_url'    => '#',
                'link_text'   => 'Learn more',
                'icon_type'   => 'asv-radar',
            ),
            array(
                'id'          => 'service-6',
                'title'       => '[Heading 1]',
                'description' => $placeholder_desc,
                'link_url'    => '#',
                'link_text'   => 'Learn more',
                'icon_type'   => 'gap-checklist',
            ),
        );

        $services = (!empty($args['services']) && is_array($args['services']))
            ? $args['services']
            : $default_services;
        ?>
        <section class="c-l1-services-list c-section" id="services-list" aria-labelledby="l1-services-list-title">
            <div class="c-container">
                
                <!-- Section Header -->
                <header class="c-l1-services-list__header">
                    <?php if (!empty($badge)): ?>
                        <div class="c-l1-services-list__badge-wrap">
                            <span class="c-badge c-badge--clear c-l1-services-list__badge"><span class="c-badge__dot"></span><?php echo esc_html($badge); ?></span>
                        </div>
                    <?php endif; ?>

                    <h2 class="c-h2 c-l1-services-list__title" id="l1-services-list-title">
                        <?php echo esc_html($title); ?>
                    </h2>

                    <?php if (!empty($lead)): ?>
                        <p class="c-text-body c-l1-services-list__lead">
                            <?php echo esc_html($lead); ?>
                        </p>
                    <?php endif; ?>
                </header>

                <!-- 3x2 Grid of 6 Detailed Services -->
                <div class="c-l1-services-list__grid">
                    <?php foreach ($services as $index => $service): ?>
                        <?php
                        $service_title = $service['title'] ?? '';
                        $service_tag   = $service['tag'] ?? '';
                        $service_desc  = $service['description'] ?? '';
                        $service_link  = !empty($service['link_url']) ? $service['link_url'] : '#contact-form';
                        $service_cta   = !empty($service['link_text']) ? $service['link_text'] : __('Learn more', 'bootscore');
                        $icon_type     = $service['icon_type'] ?? 'shield-roc';
                        ?>
                        <article class="c-l1-services-list__card">
                            
                            <!-- Card Top Bar: Icon (1:1 Figma 133:1513) -->
                            <div class="c-l1-services-list__card-header">
                                <div class="c-l1-services-list__card-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" width="20" height="20" stroke="#CBF400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                    </svg>
                                </div>
                            </div>

                            <!-- Card Body (1:1 Figma 133:1516) -->
                            <div class="c-l1-services-list__card-body">
                                <h3 class="c-l1-services-list__card-title">
                                    <?php echo esc_html($service_title); ?>
                                </h3>

                                <?php if (!empty($service_desc)): ?>
                                    <p class="c-l1-services-list__card-desc">
                                        <?php echo esc_html($service_desc); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                        </article>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}

add_action('L1_2026_ServicesList', 'L1_2026_ServicesList', 10, 1);
