<?php
/**
 * Component: ServicesGrid (Theme 2026)
 *
 * Hook: Home2026_ServicesGrid
 * Description: 1:1 Figma (Node 241:1818) services-section-redraw.
 * Header row with left title and right callout card, followed by 3x2 grid of 6 service cards.
 *
 * @package Bootscore_Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Home2026_ServicesGrid')) {
    /**
     * Renders the ServicesGrid section.
     *
     * @param array $data Component options, services, and callout details.
     * @return void
     */
    function Home2026_ServicesGrid($data = [])
    {
        $badge    = !empty($data['badge']) ? $data['badge'] : 'WHAT WE DO';
        $title    = !empty($data['title']) ? $data['title'] : 'Find the service that fits your situation';
        $subtitle = !empty($data['subtitle']) ? $data['subtitle'] : 'From a mandatory PCI assessment to a DORA deadline or an enterprise security review, one senior team can take you from the first question to a defensible result.';

        $callout = !empty($data['callout']) ? $data['callout'] : [
            'title'       => 'Not sure where you stand?',
            'description' => "Tell us what you do - we'll point you to the right standard.",
            'cta_link'    => '#contact',
        ];

        $default_services = [
            [
                'title'       => 'PCI Certifications',
                'description' => 'Do you handle or process card data? We guide you through the full range of PCI SSC standards, showing you that certification can be straightforward - not the drawn-out process it has a reputation for.',
                'link'        => '#',
                'icon'        => 'shield-check',
            ],
            [
                'title'       => 'IT Compliance',
                'description' => 'Are you in a regulated sector, or want to be ready before the next regulation lands? We help clients get and stay compliant with ISO 27001, DORA, NIS2, TISAX and other IT and information security standards, from a first gap assessment through to certification.',
                'link'        => '#',
                'icon'        => 'building',
            ],
            [
                'title'       => 'vCISO',
                'description' => 'Want someone to own your security posture, without hiring in-house? We take on your cyber security holistically - strategy, oversight and accountability - so you can stay focused on growing the business.',
                'link'        => '#',
                'icon'        => 'user-check',
            ],
            [
                'title'       => 'Business Continuity Management',
                'description' => "Could a breakdown in operations cost you customers or revenue? We design a business continuity plan tailored to your requirements and budget, so disruption doesn't become churn.",
                'link'        => '#',
                'icon'        => 'refresh-cw',
            ],
            [
                'title'       => 'Vulnerability scans and penetration tests',
                'description' => "Want to see your organisation through a hacker's eyes? Our vulnerability scans and penetration tests simulate real attacks, so you know exactly where you stand before someone else finds out for you.",
                'link'        => '#',
                'icon'        => 'terminal',
            ],
            [
                'title'       => 'Awareness sessions and phishing tests',
                'description' => 'Want your team to be your strongest defence, not your weakest link? We train staff on cyber security and compliance, then test how they respond under real phishing conditions.',
                'link'        => '#',
                'icon'        => 'lock',
            ],
        ];

        $services = !empty($data['services']) && is_array($data['services']) ? $data['services'] : $default_services;
        ?>
        <section class="home-services-grid" id="services-grid" aria-labelledby="services-grid-heading">
            <div class="c-container home-services-grid__container">
                <!-- Header row: Left text group + Right callout card -->
                <div class="home-services-grid__header-row">
                    <div class="home-services-grid__header-text">
                        <span class="home-services-grid__badge">
                            <span class="home-services-grid__badge-dot" aria-hidden="true"></span>
                            <?= esc_html($badge); ?>
                        </span>
                        <div class="home-services-grid__heading-group">
                            <h2 id="services-grid-heading" class="home-services-grid__title"><?= esc_html($title); ?></h2>
                            <?php if (!empty($subtitle)) : ?>
                                <p class="home-services-grid__subtitle"><?= esc_html($subtitle); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Callout Card 1:1 Figma 241:1825 -->
                    <div class="home-services-grid__callout-card">
                        <div class="home-services-grid__callout-icon-wrapper" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.916 6.24935L14.8327 8.16602C14.9885 8.3187 15.1979 8.40423 15.416 8.40423C15.6341 8.40423 15.8436 8.3187 15.9994 8.16602L17.7493 6.41602C17.902 6.26024 17.9876 6.05081 17.9876 5.83268C17.9876 5.61455 17.902 5.40512 17.7493 5.24935L15.8327 3.33268M17.4993 1.66602L9.49927 9.66602M10.8327 12.916C10.8327 15.4473 8.78065 17.4993 6.24935 17.4993C3.71804 17.4993 1.66602 15.4473 1.66602 12.916C1.66602 10.3847 3.71804 8.33268 6.24935 8.33268C8.78065 8.33268 10.8327 10.3847 10.8327 12.916Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="home-services-grid__callout-text">
                            <h3 class="home-services-grid__callout-title"><?= esc_html($callout['title']); ?></h3>
                            <p class="home-services-grid__callout-body"><?= esc_html($callout['description']); ?></p>
                        </div>
                    </div>
                </div>

                <!-- 6 Cards Grid (3 columns x 2 rows) -->
                <div class="home-services-grid__grid" role="list">
                    <?php foreach ($services as $service) : ?>
                        <div class="home-services-grid__item" role="listitem">
                            <article class="home-services-grid__card">
                                <div class="home-services-grid__card-top">
                                    <div class="home-services-grid__card-icon" aria-hidden="true">
                                        <?php if ($service['icon'] === 'building') : ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99998 8.33322H10.0083M9.99998 11.6668H10.0083M9.99998 4.99962H10.0083M13.333 8.33322H13.3413M13.333 11.6668H13.3413M13.333 4.99962H13.3413M6.66698 8.33322H6.67532M6.66698 11.6668H6.67532M6.66698 4.99962H6.67532M7.50023 18.334V15.8338C7.50023 15.6128 7.58802 15.4008 7.74429 15.2445C7.90055 15.0882 8.11249 15.0004 8.33348 15.0004H11.6665C11.8875 15.0004 12.0994 15.0882 12.2557 15.2445C12.4119 15.4008 12.4997 15.6128 12.4997 15.8338V18.334M5.00048 1.66602H14.9995C15.9199 1.66602 16.666 2.41227 16.666 3.33282V16.6672C16.666 17.5878 15.9199 18.334 14.9995 18.334H5.00048C4.0801 18.334 3.33398 17.5878 3.33398 16.6672V3.33282C3.33398 2.41227 4.0801 1.66602 5.00048 1.66602Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php elseif ($service['icon'] === 'user-check') : ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.3336 9.16667L15.0004 10.8333L18.334 7.5M13.3336 17.5V15.8333C13.3336 14.9493 12.9824 14.1014 12.3572 13.4763C11.7321 12.8512 10.8841 12.5 10 12.5H4.99962C4.11549 12.5 3.26758 12.8512 2.6424 13.4763C2.01723 14.1014 1.66602 14.9493 1.66602 15.8333V17.5M10.8334 5.83333C10.8334 7.67428 9.34091 9.16667 7.49982 9.16667C5.65872 9.16667 4.16622 7.67428 4.16622 5.83333C4.16622 3.99238 5.65872 2.5 7.49982 2.5C9.34091 2.5 10.8334 3.99238 10.8334 5.83333Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php elseif ($service['icon'] === 'refresh-cw') : ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.5 10C2.5 8.01088 3.29018 6.10322 4.6967 4.6967C6.10322 3.29018 8.01088 2.5 10 2.5C12.0967 2.50789 14.1092 3.32602 15.6167 4.78333L17.5 6.66667M13.3333 6.66667H17.5V2.5M17.5 10C17.5 11.9891 16.7098 13.8968 15.3033 15.3033C13.8968 16.7098 11.9891 17.5 10 17.5C7.90329 17.4921 5.89081 16.674 4.38333 15.2167L2.5 13.3333M2.5 17.5V13.3333H6.66667" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php elseif ($service['icon'] === 'terminal') : ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99998 15.834H16.666M3.33398 14.1672L8.33348 9.16659L3.33398 4.16602" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php elseif ($service['icon'] === 'lock') : ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.83333 9.16662V5.83302C5.83333 4.72786 6.27232 3.66797 7.05372 2.8865C7.83512 2.10504 8.89493 1.66602 10 1.66602C11.1051 1.66602 12.1649 2.10504 12.9463 2.8865C13.7277 3.66797 14.1667 4.72786 14.1667 5.83302V9.16662M4.16667 9.16662H15.8333C16.7538 9.16662 17.5 9.91287 17.5 10.8334V16.6672C17.5 17.5878 16.7538 18.334 15.8333 18.334H4.16667C3.24619 18.334 2.5 17.5878 2.5 16.6672V10.8334C2.5 9.91287 3.24619 9.16662 4.16667 9.16662Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php else : ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.50023 9.99962L9.16673 11.6663L12.4997 8.3329M16.666 10.8334C16.666 15.0002 13.7496 17.0836 10.2833 18.2919C10.1018 18.3534 9.90461 18.3505 9.72501 18.2836C6.25036 17.0836 3.33398 15.0002 3.33398 10.8334V4.99983C3.33398 4.77881 3.42177 4.56684 3.57804 4.41056C3.7343 4.25427 3.94624 4.16647 4.16723 4.16647C5.83373 4.16647 7.91686 3.16644 9.36671 1.89973C9.54324 1.74889 9.7678 1.66602 9.99998 1.66602C10.2322 1.66602 10.4567 1.74889 10.6333 1.89973C12.0914 3.17477 14.1662 4.16647 15.8327 4.16647C16.0537 4.16647 16.2657 4.25427 16.4219 4.41056C16.5782 4.56684 16.666 4.77881 16.666 4.99983V10.8334Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="home-services-grid__card-content">
                                    <h3 class="home-services-grid__card-title"><?= esc_html($service['title']); ?></h3>
                                    <p class="home-services-grid__card-desc"><?= esc_html($service['description']); ?></p>
                                </div>

                                <div class="home-services-grid__card-bottom">
                                    <a href="<?= esc_url($service['link']); ?>" class="home-services-grid__card-link">
                                        <span>Read more</span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M2.91602 6.99982H11.0836M6.99982 11.0836L11.0836 6.99982L6.99982 2.91602" stroke="#CBF400" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Home2026_ServicesGrid', 'Home2026_ServicesGrid', 10, 1);
