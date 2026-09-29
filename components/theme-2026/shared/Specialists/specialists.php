<?php
/**
 * Theme 2026 - Specialists Component
 *
 * Senior assessors presentation with dual theme support ('light' for L1, 'dark' for L2),
 * 3-column responsive grid, photo avatar with fallback initials, role, accreditation badges,
 * specialization tags, and bio.
 *
 * @package    Bootscore_Child
 * @subpackage Theme_2026\Shared
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_Specialists')) {
    /**
     * Render the Specialists component.
     *
     * @param array $data {
     *     Optional. Component configuration and custom content.
     *
     *     @type string $theme       Visual theme: 'light' (L1) or 'dark' (L2). Default 'light'.
     *     @type string $badge       Section badge text. Default 'YOUR AUDIT LEADERS'.
     *     @type string $title       Section heading (H2). Default 'Directly led by senior assessors'.
     *     @type string $subtitle    Section subheading. Default 'No junior delegation...'.
     *     @type array  $members     Array of assessor profiles. Each item:
     *                               [
     *                                   'name'           => string (e.g. 'Marcin Szymanek, QSA, CISSP'),
     *                                   'role'           => string (e.g. 'Lead QSA & Principal Consultant'),
     *                                   'photo'          => int|string (attachment ID or image URL),
     *                                   'initials'       => string (e.g. 'MS'),
     *                                   'specializations'=> array|string (tags array or comma-separated),
     *                                   'bio'            => string,
     *                               ]
     *     @type string $id          Element ID for the section.
     *     @type string $class_name  Additional CSS class names.
     * }
     * @return void
     */
    function Theme2026_Specialists($data = [])
    {
        $data = is_array($data) ? $data : [];

        $theme       = (!empty($data['theme']) && in_array($data['theme'], ['light', 'dark'], true)) ? $data['theme'] : 'light';
        $badge       = !empty($data['badge']) ? $data['badge'] : 'NAMED SPECIALISTS';
        $title       = !empty($data['title']) ? $data['title'] : 'The person you call is the person who does the work';
        $subtitle    = isset($data['subtitle']) ? $data['subtitle'] : 'Each standard has a named senior specialist. No rotation, no handoffs, no anonymous assessors — and the specialist you need depends on your environment.';
        $section_id  = !empty($data['id']) ? $data['id'] : 'specialists-section';
        $class_name  = !empty($data['class_name']) ? ' ' . esc_attr($data['class_name']) : '';

        // Default assessor profiles matching Figma (313:3434)
        $default_bio = 'P2PE is the fastest way to reduce your PCI scope — but only if the solution is assessed end-to-end. I lead every P2PE engagement from solution review to validation.';
        $img_base = get_stylesheet_directory_uri() . '/assets/img/theme-2026/';
        $img_card1 = ($theme === 'dark') ? $img_base . 'specialist-l2-card1.png' : $img_base . 'specialist-l1-card1.png';
        $img_card2 = ($theme === 'dark') ? $img_base . 'specialist-l2-card2.png' : $img_base . 'specialist-l1-card2.png';
        $img_card3 = ($theme === 'dark') ? $img_base . 'specialist-l2-card3.png' : $img_base . 'specialist-l1-card3.png';

        $default_members = [
            [
                'name'            => 'Anna K.',
                'role'            => 'LEAD QSA • P2PE',
                'title'           => 'Point-to-point encryption solutions',
                'initials'        => 'AK',
                'photo'           => $img_card1,
                'specializations' => [],
                'bio'             => $default_bio,
            ],
            [
                'name'            => 'John D',
                'role'            => 'LEAD QSA • P2PE',
                'title'           => 'Point-to-point encryption solutions',
                'initials'        => 'JD',
                'photo'           => $img_card2,
                'specializations' => [],
                'bio'             => $default_bio,
            ],
            [
                'name'            => 'John D',
                'role'            => 'LEAD QSA • P2PE',
                'title'           => 'Point-to-point encryption solutions',
                'initials'        => 'JD',
                'photo'           => $img_card3,
                'specializations' => [],
                'bio'             => $default_bio,
            ],
        ];

        // Resolve members
        if (!empty($data['members']) && is_array($data['members'])) {
            $members = $data['members'];
        } elseif (!empty($data['items']) && is_array($data['items'])) {
            $members = $data['items'];
        } else {
            $members = $default_members;
        }

        // Quote data (supports multiple quotes for Swiper rotator carousel)
        $default_quotes = [
            [
                'text'   => !empty($data['quote']) ? $data['quote'] : '"Patronusec streamlined our entire PCI DSS audit. Their senior assessors provided exceptionally clear guidance and cut down our certification timeline by weeks."',
                'author' => !empty($data['quote_author']) ? $data['quote_author'] : 'Chief Information Security Officer',
                'org'    => !empty($data['quote_org']) ? $data['quote_org'] : 'Enterprise FinTech Client',
            ],
            [
                'text'   => '"Their senior QSAs identified scope reduction opportunities that saved us months of remediation work. Outstanding depth of expertise."',
                'author' => 'Head of Information Security',
                'org'    => 'Tier-1 Payment Processor',
            ],
            [
                'text'   => '"Direct access to named assessors without junior handoffs made all the difference in achieving our tight compliance deadline."',
                'author' => 'VP of Engineering',
                'org'    => 'Global Cloud Services Client',
            ],
        ];

        $quotes = (!empty($data['quotes']) && is_array($data['quotes'])) ? $data['quotes'] : $default_quotes;

        if (empty($members)) {
            return;
        }
        ?>
        <section class="c-section c-specialists c-specialists--<?= esc_attr($theme); ?><?= $class_name; ?>" id="<?= esc_attr($section_id); ?>">
            <div class="c-container c-specialists__container">
                <div class="c-specialists__main">
                    <header class="c-specialists__header">
                        <span class="c-badge <?= $theme === 'light' ? 'c-badge--light' : 'c-badge--dark'; ?> c-specialists__badge"><span class="c-badge__dot" aria-hidden="true"></span><?= esc_html($badge); ?></span>
                        <div class="c-specialists__heading-group">
                            <h2 class="c-specialists__title"><?= esc_html($title); ?></h2>
                            <?php if (!empty($subtitle)) : ?>
                                <p class="c-specialists__subtitle"><?= esc_html($subtitle); ?></p>
                            <?php endif; ?>
                        </div>
                    </header>

                    <div class="c-specialists__grid">
                        <?php foreach ($members as $index => $member) :
                            $name         = !empty($member['name']) ? $member['name'] : '';
                            $role         = !empty($member['role']) ? $member['role'] : '';
                            $member_title = !empty($member['title']) ? $member['title'] : '';
                            $bio          = !empty($member['bio']) ? $member['bio'] : (!empty($member['description']) ? $member['description'] : '');
                            $photo        = !empty($member['photo']) ? $member['photo'] : '';
                            $initials     = !empty($member['initials']) ? $member['initials'] : '';

                            if (empty($initials) && !empty($name)) {
                                $parts    = explode(' ', trim($name));
                                $first    = isset($parts[0]) ? mb_substr($parts[0], 0, 1) : '';
                                $second   = isset($parts[1]) ? mb_substr($parts[1], 0, 1) : '';
                                $initials = strtoupper($first . $second);
                            }
                        ?>
                            <article class="c-specialists__card" data-index="<?= esc_attr($index); ?>">
                                <?php if (!empty($photo)) : ?>
                                    <div class="c-specialists__photo-banner">
                                        <?php if (is_numeric($photo)) : ?>
                                            <?= wp_get_attachment_image($photo, 'large', false, [
                                                'class' => 'c-specialists__photo-img',
                                                'alt'   => esc_attr($name),
                                                'loading' => 'lazy',
                                            ]); ?>
                                        <?php else : ?>
                                            <img
                                                src="<?= esc_url($photo); ?>"
                                                alt="<?= esc_attr($name); ?>"
                                                class="c-specialists__photo-img"
                                                loading="lazy"
                                                decoding="async"
                                                width="392"
                                                height="211"
                                            />
                                        <?php endif; ?>
                                    </div>
                                <?php elseif (!empty($initials)) : ?>
                                    <div class="c-specialists__photo-banner c-specialists__photo-banner--fallback">
                                        <span class="c-specialists__avatar-initials"><?= esc_html($initials); ?></span>
                                    </div>
                                <?php endif; ?>

                                <div class="c-specialists__card-content">
                                    <div class="c-specialists__card-meta">
                                        <h3 class="c-specialists__name"><?= esc_html($name); ?></h3>
                                        <?php if (!empty($role)) : ?>
                                            <div class="c-specialists__role"><?= esc_html($role); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="c-specialists__card-body">
                                        <?php if (!empty($member_title)) : ?>
                                            <div class="c-specialists__headline"><?= esc_html($member_title); ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty($bio)) : ?>
                                            <p class="c-specialists__bio"><?= esc_html($bio); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="c-specialists__bottom-frame">
                    <!-- Client Quote (1:1 Figma 313:3472 for L1, 313:3422 for L2) -->
                    <?php if (!empty($quotes)) : ?>
                        <div class="c-specialists__quote-container">
                            <div class="c-specialists__quote-icon" aria-hidden="true">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.4477 4.78105C19.9478 4.28095 20.6261 4 21.3333 4H25.3333C26.0406 4 26.7189 4.28095 27.219 4.78105C27.719 5.28115 28 5.95942 28 6.66667V20C28 22.1217 27.1571 24.1566 25.6569 25.6569C24.1566 27.1571 22.1217 28 20 28C19.6464 28 19.3072 27.8595 19.0572 27.6095C18.8071 27.3594 18.6667 27.0203 18.6667 26.6667V24C18.6667 23.6464 18.8071 23.3072 19.0572 23.0572C19.3072 22.8071 19.6464 22.6667 20 22.6667C20.7072 22.6667 21.3855 22.3857 21.8856 21.8856C22.3857 21.3855 22.6667 20.7072 22.6667 20V18.6667C22.6667 18.313 22.5262 17.9739 22.2761 17.7239C22.0261 17.4738 21.687 17.3333 21.3333 17.3333C20.6261 17.3333 19.9478 17.0524 19.4477 16.5523C18.9476 16.0522 18.6667 15.3739 18.6667 14.6667V6.66667C18.6667 5.95942 18.9476 5.28115 19.4477 4.78105Z" stroke="#CBF400" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M4.78105 4.78105C5.28115 4.28095 5.95942 4 6.66667 4H10.6667C11.3739 4 12.0522 4.28095 12.5523 4.78105C13.0524 5.28115 13.3333 5.95942 13.3333 6.66667V20C13.3333 22.1217 12.4905 24.1566 10.9902 25.6569C9.4899 27.1571 7.45507 28 5.33333 28C4.97971 28 4.64057 27.8595 4.39052 27.6095C4.14048 27.3594 4 27.0203 4 26.6667V24C4 23.6464 4.14048 23.3072 4.39052 23.0572C4.64057 22.8071 4.97971 22.6667 5.33333 22.6667C6.04058 22.6667 6.71885 22.3857 7.21895 21.8856C7.71905 21.3855 8 20.7072 8 20V18.6667C8 18.313 7.85952 17.9739 7.60948 17.7239C7.35943 17.4738 7.02029 17.3333 6.66667 17.3333C5.95942 17.3333 5.28115 17.0524 4.78105 16.5523C4.28095 16.0522 4 15.3739 4 14.6667V6.66667C4 5.95942 4.28095 5.28115 4.78105 4.78105Z" stroke="#CBF400" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class="swiper c-specialists__quote-slider" role="region" aria-roledescription="carousel" aria-label="Referencje klientów">
                                <div class="swiper-wrapper">
                                    <?php foreach ($quotes as $q) : ?>
                                        <div class="swiper-slide c-specialists__quote-slide">
                                            <blockquote class="c-specialists__quote-text"><?= esc_html($q['text']); ?></blockquote>
                                            <div class="c-specialists__quote-author-wrap">
                                                <span class="c-specialists__quote-author"><?= esc_html($q['author']); ?></span>
                                                <span class="c-specialists__quote-org"><?= esc_html($q['org']); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="c-specialists__rotator swiper-pagination" role="tablist" aria-label="Wybór cytatu"></div>
                        </div>
                    <?php endif; ?>

                    <!-- Meet The Team (1:1 Figma 313:3483 for L1, 132:1127 for L2) -->
                    <div class="c-specialists__cta-wrap">
                        <a href="#contact-cta" class="c-specialists__meet-team">
                            <div class="c-specialists__meet-team-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0008 15.75V14.25C12.0008 13.4544 11.6847 12.6913 11.1221 12.1287C10.5594 11.5661 9.79631 11.25 9.0006 11.25H4.50024C3.70453 11.25 2.9414 11.5661 2.37875 12.1287C1.8161 12.6913 1.5 13.4544 1.5 14.25V15.75M12.0008 2.34595C12.6442 2.51272 13.214 2.8884 13.6207 3.41399C14.0275 3.93959 14.2482 4.58536 14.2482 5.24995C14.2482 5.91453 14.0275 6.5603 13.6207 7.0859C13.214 7.6115 12.6442 7.98717 12.0008 8.15395M16.5012 15.7499V14.2499C16.5007 13.5852 16.2794 12.9395 15.8722 12.4141C15.4649 11.8888 14.8947 11.5136 14.251 11.3474M9.75066 5.25C9.75066 6.90685 8.40741 8.25 6.75042 8.25C5.09343 8.25 3.75018 6.90685 3.75018 5.25C3.75018 3.59315 5.09343 2.25 6.75042 2.25C8.40741 2.25 9.75066 3.59315 9.75066 5.25Z" stroke="#CBF400" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class="c-specialists__meet-team-text">
                                <span class="c-specialists__meet-team-title">Meet the team</span>
                                <span class="c-specialists__meet-team-subtitle">See all our specialists</span>
                            </div>
                            <svg class="c-specialists__meet-team-arrow" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2.91602 6.99982H11.0836M6.99982 11.0836L11.0836 6.99982L6.99982 2.91602" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_Specialists', 'Theme2026_Specialists', 10, 1);
