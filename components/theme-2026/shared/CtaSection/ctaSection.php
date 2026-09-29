<?php
/**
 * Component: CtaSection (Theme 2026)
 *
 * Hook: Theme2026_CtaSection
 * Description: 1:1 Figma (Node 237:1619) cta-form-section.
 * Centered column layout: Header -> 680px Form Card -> Horizontal Trust Badges.
 *
 * @package Bootscore_Child
 */

defined('ABSPATH') || exit;

if (!function_exists('Theme2026_CtaSection')) {
    /**
     * Render the unified CtaSection component.
     *
     * @param array $data Component configuration.
     * @return void
     */
    function Theme2026_CtaSection($data = [])
    {
        $data = is_array($data) ? $data : [];

        $badge    = !empty($data['badge']) ? $data['badge'] : 'START THE CONVERSATION';
        $title    = !empty($data['title']) ? $data['title'] : '[CTA heading]';
        $subtitle = !empty($data['subtitle']) ? $data['subtitle'] : '[Placeholder CTA subtitle. Replace with the real call-to-action copy before publishing.]';
        $section_id = !empty($data['id']) ? $data['id'] : 'cta-form-section';

        $trust_badges = [
            'Free 30-min scoping call',
            'No obligation',
            'Senior assessor not sales',
        ];
        ?>
        <section class="c-cta-section" id="<?= esc_attr($section_id); ?>" aria-label="<?= esc_attr($badge); ?>">
            <div class="c-container c-cta-section__container">
                <!-- Header 1:1 Figma 237:1620 -->
                <div class="c-cta-section__header">
                    <span class="c-cta-section__badge">
                        <span class="c-cta-section__badge-dot" aria-hidden="true"></span>
                        <?= esc_html($badge); ?>
                    </span>
                    <h2 class="c-cta-section__title"><?= esc_html($title); ?></h2>
                    <?php if (!empty($subtitle)) : ?>
                        <p class="c-cta-section__subtitle"><?= esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Form Card 1:1 Figma 237:1624 (680px width) -->
                <div class="c-cta-section__form-card">
                    <form class="c-cta-form" action="#" method="post" novalidate>
                        <!-- Form Row 1: Full name + Work email -->
                        <div class="c-cta-form__row">
                            <div class="c-cta-form__group">
                                <input type="text" id="cta-fullname" name="fullname" class="c-cta-form__input" placeholder="Full name" required autocomplete="name">
                            </div>
                            <div class="c-cta-form__group">
                                <input type="email" id="cta-email" name="email" class="c-cta-form__input" placeholder="Work email" required autocomplete="email">
                            </div>
                        </div>

                        <!-- Form Row 2: Phone number + Company -->
                        <div class="c-cta-form__row">
                            <div class="c-cta-form__group">
                                <input type="tel" id="cta-phone" name="phone" class="c-cta-form__input" placeholder="Phone number" autocomplete="tel">
                            </div>
                            <div class="c-cta-form__group">
                                <input type="text" id="cta-company" name="company" class="c-cta-form__input" placeholder="Company" autocomplete="organization">
                            </div>
                        </div>

                        <!-- Topic you'd like to cover 1:1 Figma 237:1637 (height: 100px textarea) -->
                        <div class="c-cta-form__group">
                            <textarea id="cta-topic" name="topic" class="c-cta-form__textarea" rows="3" placeholder="Topic you'd like to cover"></textarea>
                        </div>

                        <!-- Anything we should know before the call? 1:1 Figma 237:1639 (height: 100px textarea) -->
                        <div class="c-cta-form__group">
                            <textarea id="cta-message" name="message" class="c-cta-form__textarea" rows="3" placeholder="Anything we should know before the call? (optional)"></textarea>
                        </div>

                        <!-- Consent Checkbox 1:1 Figma 237:1641 -->
                        <div class="c-cta-form__consent">
                            <label class="c-cta-form__checkbox-label" for="cta-consent">
                                <input type="checkbox" id="cta-consent" name="consent" class="c-cta-form__checkbox" required>
                                <span class="c-cta-form__checkbox-box" aria-hidden="true">
                                    <svg width="10" height="8" viewBox="0 0 10 8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="1.5 4 4 6.5 8.5 1.5"/>
                                    </svg>
                                </span>
                                <span class="c-cta-form__consent-text">
                                    I consent to the processing of my personal data by Patronusec Sp, z.o.o., as provided in the form, for the purpose of receiving a commercial offer via the email address or telephone number I have provided in the contact form above.
                                </span>
                            </label>
                        </div>

                        <!-- Submit Button 1:1 Figma 237:1644 -->
                        <button type="submit" class="c-cta-form__submit">
                            <span>Talk to an assessor</span>
                            <svg class="c-cta-form__submit-arrow" width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="#020B2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M2.91602 6.99982H11.0836M6.99982 11.0836L11.0836 6.99982L6.99982 2.91602"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Trust Badges Row 1:1 Figma 237:1648 -->
                <div class="c-cta-section__trust-badges" aria-label="Guarantees">
                    <?php foreach ($trust_badges as $tb) : ?>
                        <div class="c-cta-section__trust-item">
                            <svg class="c-cta-section__trust-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <span class="c-cta-section__trust-text"><?= esc_html($tb); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

add_action('Theme2026_CtaSection', 'Theme2026_CtaSection', 10, 1);
