<?php
/**
 * Component: Navbar 2026
 * 1:1 Figma 132:1006 - 1440x90 #00020C, logo 137x32, button 155x36 #CBF400 radius 8.
 *
 * @package Bootscore Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_Navbar')) {
    function Theme2026_Navbar($data = array())
    {
        $data = is_array($data) ? $data : array();
        $cta_text = !empty($data['cta_text']) ? $data['cta_text'] : 'Talk to an assessor';
        $cta_url  = !empty($data['cta_url']) ? $data['cta_url'] : '#contact-cta';

        $settings = function_exists('get_field') ? get_field('template_settings', 'option') : null;
        $logo_id  = is_array($settings) && !empty($settings['logotype']) ? $settings['logotype'] : null;
        ?>
        <div class="c-navbar-2026" role="banner">
            <div class="c-navbar-2026__inner">
                <a class="c-navbar-2026__brand" href="<?php echo esc_url(home_url()); ?>" aria-label="<?php bloginfo('name'); ?>">
                    <?php if (!empty($logo_id)) : ?>
                        <?php echo wp_get_attachment_image($logo_id, 'full', false, array('class' => 'c-navbar-2026__logo', 'style' => 'width:137px;height:32px;object-fit:contain;')); ?>
                    <?php else : ?>
                        <img class="c-navbar-2026__logo" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/logo/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>" width="137" height="32">
                    <?php endif; ?>
                </a>
                <div class="c-navbar-2026__actions">
                    <a href="<?php echo esc_url($cta_url); ?>" class="c-navbar-2026__btn">
                        <span><?php echo esc_html($cta_text); ?></span>
                    </a>
                    <button class="c-navbar-2026__toggle d-xxl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar" aria-label="Menu">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
}

add_action('Theme2026_Navbar', 'Theme2026_Navbar', 10, 1);
