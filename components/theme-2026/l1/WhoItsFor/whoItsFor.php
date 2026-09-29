<?php
/**
 * Component: Who Its For (L1 Specific)
 *
 * Split layout presenting target audience segments for the payment security practice
 * alongside a 3D faceted cryptographic crystal visual.
 *
 * @package Bootscore Child
 * @subpackage Theme_2026
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

if (!function_exists('L1_2026_WhoItsFor')) {
    /**
     * Render the Who Its For section on L1 template.
     *
     * @param array $args Data array passed via action hook or template.
     */
    function L1_2026_WhoItsFor($args = array())
    {
        $badge = !empty($args['badge'])
            ? $args['badge']
            : '✦ WHO IT\'S FOR';

        $title = !empty($args['title'])
            ? $args['title']
            : '[Who this is for heading]';

        $description = !empty($args['description'])
            ? $args['description']
            : '[Placeholder intro. Describe the types of organisations or buyers this page targets.]';

        $icons_base = get_stylesheet_directory_uri() . '/assets/img/icons/';

        $default_items = array(
            array(
                'id'          => 'audience-1',
                'title'       => '[Audience one]',
                'description' => '[Placeholder copy describing who this is for.]',
                'icon'        => $icons_base . 'icon-activity.svg',
            ),
            array(
                'id'          => 'audience-2',
                'title'       => '[Audience two]',
                'description' => '[Placeholder copy describing who this is for.]',
                'icon'        => $icons_base . 'icon-wallet.svg',
            ),
            array(
                'id'          => 'audience-3',
                'title'       => '[Audience three]',
                'description' => '[Placeholder copy describing who this is for.]',
                'icon'        => $icons_base . 'icon-terminal.svg',
            ),
            array(
                'id'          => 'audience-4',
                'title'       => '[Audience four]',
                'description' => '[Placeholder copy describing who this is for.]',
                'icon'        => $icons_base . 'icon-fingerprint.svg',
            ),
        );

        $items = (!empty($args['items']) && is_array($args['items']))
            ? $args['items']
            : $default_items;

        $default_base_img = get_stylesheet_directory_uri() . '/assets/img/l1/who-for-base.png';
        $media_src = !empty($args['crystal'])
            ? $args['crystal']
            : (!empty($args['image'])
                ? $args['image']
                : (!empty($args['media'])
                    ? $args['media']
                    : $default_base_img));
        $is_default_media = ($media_src === $default_base_img || strpos($media_src, 'who-for-base') !== false || strpos($media_src, 'who-for-media') !== false);
        ?>
        <section class="c-l1-who-its-for c-section" id="who-its-for" aria-labelledby="l1-who-its-for-title">
            <div class="c-container">
                <div class="c-l1-who-its-for__layout">
                    
                    <!-- Left Column: 1:1 Figma Media Container (480x520, Node 137:2277) -->
                    <div class="c-l1-who-its-for__media-col">
                        <div class="c-l1-who-its-for__media-container">
                            <img
                                class="c-l1-who-its-for__media-img"
                                src="<?php echo esc_url($media_src); ?>"
                                alt="<?php echo esc_attr($title); ?>"
                                loading="lazy"
                                decoding="async"
                                width="988"
                                height="551"
                            >
                            <?php if ($is_default_media): ?>
                                <!-- Figma Vector #137:3009 (273x668, fill #3F8AFD 30%) -->
                                <svg class="c-l1-who-its-for__media-vector" viewBox="0 0 273 668" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M0 0L221.829 50.327V477.847L0.263774 609.112V668L273 506.123V0H0Z" fill="#3F8AFD" fill-opacity="0.3"/>
                                </svg>
                            <?php endif; ?>
                        </div>
                    </div><!-- Right Column: Content Header and 4 Audience Tiles -->
                    <div class="c-l1-who-its-for__content-col">
                        
                        <header class="c-l1-who-its-for__header">
                            <?php if (!empty($badge)): ?>
                                <span class="c-badge c-badge--l1-who c-l1-who-its-for__badge"><span class="c-badge__dot"></span><?php echo esc_html($badge); ?></span>
                            <?php endif; ?>

                            <h2 class="c-h2 c-l1-who-its-for__title" id="l1-who-its-for-title">
                                <?php echo esc_html($title); ?>
                            </h2>

                            <?php if (!empty($description)): ?>
                                <p class="c-text-body c-l1-who-its-for__description">
                                    <?php echo esc_html($description); ?>
                                </p>
                            <?php endif; ?>
                        </header>

                        <!-- 4 Tiles Grid (2x2 on desktop, 1-col on mobile) -->
                        <div class="c-l1-who-its-for__grid">
                            <?php foreach ($items as $index => $item): ?>
                                <?php
                                $item_title = $item['title'] ?? '';
                                $item_desc  = $item['description'] ?? '';
                                $item_icon  = $item['icon'] ?? '';
                                $item_points = (!empty($item['points']) && is_array($item['points'])) ? $item['points'] : array();
                                ?>
                                <article class="c-l1-who-its-for__card">
                                    <div class="c-l1-who-its-for__card-icon-container" aria-hidden="true">
                                        <?php if ($item_icon === 'activity' || strpos($item_icon, 'activity') !== false) : ?>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.5012 8.99962H14.6411C14.3133 8.99892 13.9942 9.10561 13.7328 9.30337C13.4714 9.50114 13.2819 9.77908 13.1934 10.0947L11.4308 16.3652C11.4194 16.4042 11.3957 16.4384 11.3633 16.4627C11.3308 16.4871 11.2914 16.5002 11.2508 16.5002C11.2102 16.5002 11.1707 16.4871 11.1383 16.4627C11.1058 16.4384 11.0821 16.4042 11.0708 16.3652L6.93043 1.63403C6.91907 1.59508 6.89539 1.56087 6.86293 1.53653C6.83047 1.51218 6.79099 1.49902 6.75042 1.49902C6.70985 1.49902 6.67037 1.51218 6.63791 1.53653C6.60545 1.56087 6.58177 1.59508 6.57041 1.63403L4.80776 7.90454C4.71961 8.21893 4.53128 8.49597 4.27137 8.69361C4.01146 8.89125 3.69417 8.99869 3.36765 8.99962H1.5" stroke="#040612" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php elseif ($item_icon === 'wallet' || strpos($item_icon, 'wallet') !== false) : ?>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.75 12V15C15.75 15.1989 15.671 15.3897 15.5303 15.5303C15.3897 15.671 15.1989 15.75 15 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H13.5C13.6989 2.25 13.8897 2.32902 14.0303 2.46967C14.171 2.61032 14.25 2.80109 14.25 3V5.25M2.25 3.75C2.25 4.14782 2.40804 4.52936 2.68934 4.81066C2.97064 5.09196 3.35218 5.25 3.75 5.25H15C15.1989 5.25 15.3897 5.32902 15.5303 5.46967C15.671 5.61032 15.75 5.80109 15.75 6V9M15.75 9H13.5C13.1022 9 12.7206 9.15804 12.4393 9.43934C12.158 9.72064 12 10.1022 12 10.5C12 10.8978 12.158 11.2794 12.4393 11.5607C12.7206 11.842 13.1022 12 13.5 12H15.75M15.75 9C15.9489 9 16.1397 9.07902 16.2803 9.21967C16.421 9.36032 16.5 9.55109 16.5 9.75V11.25C16.5 11.4489 16.421 11.6397 16.2803 11.7803C16.1397 11.921 15.9489 12 15.75 12" stroke="#040612" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php elseif ($item_icon === 'terminal' || strpos($item_icon, 'terminal') !== false) : ?>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.9994 14.2502H14.9988M3 12.7501L7.49955 8.24954L3 3.74902" stroke="#040612" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php else : ?>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.00091 7.49947C8.60305 7.49947 8.22148 7.65752 7.94015 7.93884C7.65881 8.22017 7.50076 8.60172 7.50076 8.99958C7.50076 9.76464 7.42576 10.8822 7.30574 11.9998M10.5009 9.83973C10.5009 11.6249 10.5009 14.6251 9.75081 16.5002M12.9687 15.7651C13.0587 15.315 13.2912 14.04 13.3437 13.4999M1.5 8.99958C1.5 7.42534 1.99533 5.89101 2.91582 4.61393C3.83632 3.33684 5.13531 2.38174 6.62879 1.88393C8.12228 1.38611 9.73454 1.37081 11.2372 1.8402C12.7399 2.30958 14.0568 3.23986 15.0013 4.49925M1.5 11.9998H1.5075M16.3513 11.9998C16.5013 10.4997 16.4496 7.984 16.3513 7.49947M3.75022 14.625C4.12526 13.4999 4.50029 11.2497 4.50029 8.99958C4.49954 8.48869 4.58578 7.9814 4.75532 7.49947M6.48828 16.5001C6.6458 16.0051 6.82581 15.5101 6.91582 15M6.75051 5.09925C7.43488 4.70414 8.21122 4.49619 9.00146 4.49632C9.79169 4.49644 10.568 4.70464 11.2522 5.09997C11.9364 5.4953 12.5045 6.06382 12.8993 6.74836C13.2941 7.4329 13.5017 8.20932 13.5012 8.99954V10.4996" stroke="#040612" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php endif; ?>
                                    </div>

                                    <div class="c-l1-who-its-for__card-content">
                                        <h3 class="c-l1-who-its-for__card-title">
                                            <?php echo esc_html($item_title); ?>
                                        </h3>

                                        <?php if (!empty($item_desc)): ?>
                                            <p class="c-l1-who-its-for__card-desc">
                                                <?php echo esc_html($item_desc); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($item_points)): ?>
                                        <ul class="c-l1-who-its-for__card-points" aria-label="<?php echo esc_attr($item_title . ' ' . __('qualifying criteria', 'bootscore')); ?>">
                                            <?php foreach ($item_points as $point): ?>
                                                <li class="c-l1-who-its-for__card-point">
                                                    <svg class="c-l1-who-its-for__card-point-icon" viewBox="0 0 16 16" fill="none" width="14" height="14" aria-hidden="true">
                                                        <circle cx="8" cy="8" r="7" stroke="#38BDF8" stroke-width="1.5" />
                                                        <path d="M5.2 8.2L7 10L10.8 6.2" stroke="#0284C7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <span class="c-l1-who-its-for__card-point-text"><?php echo esc_html($point); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; ?>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}

add_action('L1_2026_WhoItsFor', 'L1_2026_WhoItsFor', 10, 1);
