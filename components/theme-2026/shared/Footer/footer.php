<?php
/**
 * Component: Footer 2026
 * 1:1 Figma (Node 313:3992) - 1440x570 #040612.
 * Columns: Brand with socials, 4 links columns, 1 Contact column.
 * Bottom bar: copyright left, 4 legal links right.
 *
 * @package Bootscore Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_Footer')) {
    function Theme2026_Footer($data = array())
    {
        $getLogotype = function_exists('get_field') ? get_field('template_settings', 'option') : null;
        $getFooter   = function_exists('get_field') ? get_field('footer', 'option') : null;

        $fallback_cols = array(
            array(
                'heading' => 'PCI COMPLIANCE',
                'links'   => array('PCI DSS', 'PCI P2PE', 'PCI 3DS', 'PCI PIN Security', 'PCI SSS', 'PCI SLC', 'Gap Analysis', 'ASV Scanning'),
            ),
            array(
                'heading' => 'IT COMPLIANCE',
                'links'   => array('ISO 27001', 'TISAX', 'DORA', 'NIS2', 'Cyber Essentials', 'Business Continuity Management'),
            ),
            array(
                'heading' => 'CYBERSECURITY',
                'links'   => array('vCISO', 'IT Compliance Officer', 'Penetration Testing', 'Vulnerability Scans', 'Security Training & Awareness'),
            ),
            array(
                'heading' => 'RESOURCES',
                'links'   => array('Knowledge Base', 'Case Studies', 'Newsletter Sign-up', 'Team Patronusec'),
            ),
        );
        ?>
        <footer class="c-footer-2026" role="contentinfo">
            <div class="c-footer-2026__inner">
                <div class="c-footer-2026__columns">
                    <!-- Brand Column 1:1 Figma 313:3994 -->
                    <div class="c-footer-2026__brand">
                        <?php if (!empty($getLogotype['logotype'])) : ?>
                            <?php echo wp_get_attachment_image($getLogotype['logotype'], 'full', false, array('class' => 'c-footer-2026__logo')); ?>
                        <?php else : ?>
                            <a href="<?= esc_url(home_url('/')); ?>" class="c-footer-2026__logo-link">
                                <span class="c-footer-2026__logo-text">PATRONUSEC</span>
                            </a>
                        <?php endif; ?>
                        <p class="c-footer-2026__tagline">One of a few firms worldwide accredited across all six PCI SSC standards. Full compliance, pentesting and security leadership - delivered by one accredited team. No subcontractors. No rotation. No mid-project handoffs.</p>
                        
                        <!-- Social Icons 1:1 Figma 313:3997 -->
                        <div class="c-footer-2026__socials">
                            <a href="https://linkedin.com" class="c-footer-2026__social-link" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                    <rect x="2" y="9" width="4" height="12"/>
                                    <circle cx="4" cy="4" r="2"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com" class="c-footer-2026__social-link" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- 4 Links Columns 1:1 Figma -->
                    <?php foreach ($fallback_cols as $col) : ?>
                        <nav class="c-footer-2026__col" aria-label="<?php echo esc_attr($col['heading']); ?>">
                            <h3 class="c-footer-2026__heading"><?php echo esc_html($col['heading']); ?></h3>
                            <ul class="c-footer-2026__list">
                                <?php foreach ($col['links'] as $l) : ?>
                                    <li><a href="#"><?php echo esc_html($l); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    <?php endforeach; ?>

                    <!-- Contact Column 1:1 Figma 313:4039 -->
                    <div class="c-footer-2026__col c-footer-2026__col--contact">
                        <h3 class="c-footer-2026__heading">CONTACT</h3>
                        <div class="c-footer-2026__contact-list">
                            <div class="c-footer-2026__contact-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9FC7F0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                                <a class="c-footer-2026__mail" href="mailto:Hello@patronusec.com">Hello@patronusec.com</a>
                            </div>

                            <div class="c-footer-2026__contact-group">
                                <div class="c-footer-2026__contact-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9FC7F0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                    <span>Warsaw +48 662 395 468</span>
                                </div>
                                <div class="c-footer-2026__contact-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9FC7F0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                    <span>London +44 203289 7100</span>
                                </div>
                            </div>

                            <div class="c-footer-2026__contact-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9FC7F0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span>Serving 60+ countries</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom Bar 1:1 Figma 313:4059 -->
                <div class="c-footer-2026__bottom">
                    <span class="c-footer-2026__copy">&copy; 2026 Patronusec. All rights reserved.</span>
                    <nav class="c-footer-2026__legal" aria-label="Legal navigation">
                        <a href="#">Privacy policy</a>
                        <a href="#">Cookies policy</a>
                        <a href="#">General terms and conditions</a>
                        <a href="#">Information obligation</a>
                    </nav>
                </div>
            </div>
        </footer>
        <?php
    }
}

add_action('Theme2026_Footer', 'Theme2026_Footer', 10, 1);
