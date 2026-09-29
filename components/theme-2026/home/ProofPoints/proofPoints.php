<?php
/**
 * Component: ProofPoints (Theme 2026)
 *
 * Hook: Home2026_ProofPoints
 * Description: 1:1 Figma (Node 241:1952) engagements-section-redraw / Why Patronusec.
 * Clean, light 3-column proof section.
 *
 * @package Bootscore_Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Home2026_ProofPoints')) {
    /**
     * Renders the ProofPoints section.
     *
     * @param array $data Component options and pillar items.
     * @return void
     */
    function Home2026_ProofPoints($data = [])
    {
        $badge    = !empty($data['badge']) ? $data['badge'] : 'WHY PATRONUSEC';
        $title    = !empty($data['title']) ? $data['title'] : "Proof that holds up when the stakes are \n high.";
        $subtitle = !empty($data['subtitle']) ? $data['subtitle'] : 'Security buyers do not need louder promises. They need an experienced team, recognised credentials and a clear owner for the work.';

        $default_pillars = [
            [
                'title'       => '1,000+ engagements',
                'description' => 'Certification audits and consultancy projects across 60+ countries, including complex programmes for some of the largest organisations.',
                'icon'        => 'users',
            ],
            [
                'title'       => 'All six PCI accreditations',
                'description' => 'One of a few firms worldwide accredited across every PCI SSC standard, plus authorisation for DORA-mandated penetration testing.',
                'icon'        => 'award',
            ],
            [
                'title'       => 'One team, no handoffs',
                'description' => 'A named senior assessor owns your engagement from scoping to sign-off. No subcontractors, rotation or mid-project surprises.',
                'icon'        => 'handshake',
            ],
        ];

        $pillars = !empty($data['pillars']) && is_array($data['pillars']) ? $data['pillars'] : $default_pillars;
        ?>
        <section class="home-proof-points" id="why-patronusec" aria-labelledby="proof-points-heading">
            <div class="c-container home-proof-points__container">
                <div class="home-proof-points__header">
                    <span class="home-proof-points__badge">
                        <span class="home-proof-points__badge-dot" aria-hidden="true"></span>
                        <?= esc_html($badge); ?>
                    </span>
                    <h2 id="proof-points-heading" class="home-proof-points__title"><?= nl2br(esc_html($title)); ?></h2>
                    <?php if (!empty($subtitle)) : ?>
                        <p class="home-proof-points__subtitle"><?= esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </div>

                <div class="home-proof-points__grid" role="list">
                    <?php foreach ($pillars as $pillar) : ?>
                        <div class="home-proof-points__col" role="listitem">
                            <article class="home-proof-points__card">
                                <div class="home-proof-points__card-icon" aria-hidden="true">
                                    <?php if ($pillar['icon'] === 'award') : ?>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.3182 8.59277L11.3282 14.2768C11.3395 14.3437 11.3301 14.4125 11.3012 14.4739C11.2724 14.5354 11.2255 14.5866 11.1668 14.6206C11.1081 14.6547 11.0404 14.67 10.9727 14.6646C10.905 14.6591 10.8407 14.6331 10.7882 14.5901L8.40149 12.7988C8.28628 12.7127 8.14631 12.6662 8.00249 12.6662C7.85867 12.6662 7.71871 12.7127 7.60349 12.7988L5.21283 14.5894C5.16037 14.6324 5.09607 14.6583 5.02849 14.6638C4.96091 14.6693 4.89327 14.654 4.8346 14.62C4.77593 14.586 4.72901 14.535 4.70011 14.4737C4.6712 14.4123 4.66168 14.3437 4.67283 14.2768L5.68216 8.59277M12 5.33301C12 7.54215 10.2091 9.33301 8 9.33301C5.79086 9.33301 4 7.54215 4 5.33301C4 3.12387 5.79086 1.33301 8 1.33301C10.2091 1.33301 12 3.12387 12 5.33301Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    <?php elseif ($pillar['icon'] === 'handshake') : ?>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.33251 11.334L8.66595 12.6674C8.79728 12.7987 8.9532 12.9029 9.12479 12.9739C9.29639 13.045 9.4803 13.0816 9.66603 13.0816C9.85176 13.0816 10.0357 13.045 10.2073 12.9739C10.3789 12.9029 10.5348 12.7987 10.6661 12.6674C10.7974 12.5361 10.9016 12.3802 10.9727 12.2086C11.0438 12.037 11.0804 11.8531 11.0804 11.6674C11.0804 11.4817 11.0438 11.2978 10.9727 11.1262C10.9016 10.9546 10.7974 10.7987 10.6661 10.6674M9.33282 9.33371L10.9996 11.0004C11.2649 11.2656 11.6246 11.4146 11.9997 11.4146C12.3748 11.4146 12.7345 11.2656 12.9998 11.0004C13.265 10.7352 13.414 10.3755 13.414 10.0004C13.414 9.62531 13.265 9.26559 12.9998 9.00038L10.4129 6.41369C10.0379 6.03916 9.52951 5.82878 8.99946 5.82878C8.46942 5.82878 7.96105 6.03916 7.58602 6.41369L6.9993 7.00036C6.73407 7.26558 6.37433 7.41458 5.99922 7.41458C5.62412 7.41458 5.26438 7.26558 4.99914 7.00036C4.7339 6.73515 4.5849 6.37543 4.5849 6.00036C4.5849 5.62528 4.7339 5.26557 4.99914 5.00035L6.87263 3.12701C7.48084 2.52043 8.274 2.13404 9.12657 2.02898C9.97913 1.92393 10.8424 2.10622 11.5797 2.54701L11.893 2.73367C12.1769 2.905 12.5144 2.96442 12.8398 2.90034L13.9999 2.66701M13.9997 2.00065L14.6664 9.33403H13.333M1.99875 2.00065L1.33203 9.33403L5.66571 13.6674C5.93095 13.9326 6.29069 14.0816 6.66579 14.0816C7.04089 14.0816 7.40063 13.9326 7.66587 13.6674C7.93111 13.4022 8.08012 13.0425 8.08012 12.6674C8.08012 12.2923 7.93111 11.9326 7.66587 11.6674M1.99875 2.66732H7.33251" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    <?php else : ?>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6661 14V12.6667C10.6661 11.9594 10.3851 11.2811 9.885 10.781C9.38486 10.281 8.70653 10 7.99923 10H3.99891C3.29161 10 2.61328 10.281 2.11314 10.781C1.61301 11.2811 1.33203 11.9594 1.33203 12.6667V14M10.6661 2.08529C11.238 2.23353 11.7445 2.56746 12.106 3.03466C12.4676 3.50186 12.6637 4.07588 12.6637 4.66662C12.6637 5.25736 12.4676 5.83138 12.106 6.29858C11.7445 6.76578 11.238 7.09971 10.6661 7.24795M14.6664 13.9999V12.6666C14.666 12.0757 14.4693 11.5018 14.1073 11.0348C13.7453 10.5678 13.2384 10.2343 12.6663 10.0866M8.66595 4.66667C8.66595 6.13943 7.47195 7.33333 5.99907 7.33333C4.52619 7.33333 3.33219 6.13943 3.33219 4.66667C3.33219 3.19391 4.52619 2 5.99907 2C7.47195 2 8.66595 3.19391 8.66595 4.66667Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>

                                <div class="home-proof-points__card-content">
                                    <h3 class="home-proof-points__card-title"><?= esc_html($pillar['title']); ?></h3>
                                    <p class="home-proof-points__card-desc"><?= esc_html($pillar['description']); ?></p>
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

add_action('Home2026_ProofPoints', 'Home2026_ProofPoints', 10, 1);
