<?php
/**
 * ACF Configuration for Template: Nowy Szablon Usług L1 (2026)
 * File: utils/acf-l1-2026.php
 * Template: templates/template-l1-2026.php
 *
 * Provides a flexible content builder with drag & drop sections
 * and 1:1 default values matching the Figma design (Poprawki L1).
 */

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array(
    'key' => 'group_l1_2026',
    'title' => 'Usługi Poziom L1 (2026) - Sekcje Elastyczne',
    'fields' => array(
      array(
        'key' => 'field_l1_sections',
        'label' => 'Sekcje Szablonu L1 (2026)',
        'name' => 'sections',
        'type' => 'flexible_content',
        'instructions' => 'Układaj, dodawaj lub usuwaj sekcje strony metodą drag & drop.',
        'required' => 0,
        'button_label' => 'Dodaj sekcję',
        'layouts' => array(

          // -----------------------------------------------------------------
          // LAYOUT: HERO
          // -----------------------------------------------------------------
          'layout_l1_hero' => array(
            'key' => 'layout_l1_hero',
            'name' => 'hero',
            'label' => 'Hero (Sekcja Główna L1)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_hero_badge',
                'label' => 'Badge / Kategoria',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'SERVICE TEMPLATE',
              ),
              array(
                'key' => 'field_l1_hero_title',
                'label' => 'Tytuł Główny (H1)',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Service title]',
              ),
              array(
                'key' => 'field_l1_hero_subtitle_italic',
                'label' => 'Podtytuł (Kursywa)',
                'name' => 'subtitle_italic',
                'type' => 'text',
                'default_value' => '[Subtitle goes here]',
              ),
              array(
                'key' => 'field_l1_hero_description',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => '[Placeholder intro paragraph. Describe the service in one or two sentences. Replace this text with the real value proposition before publishing.]',
              ),
              array(
                'key' => 'field_l1_hero_cta_primary_text',
                'label' => 'CTA Główny - Tekst',
                'name' => 'cta_primary_text',
                'type' => 'text',
                'default_value' => '[Primary CTA]',
              ),
              array(
                'key' => 'field_l1_hero_cta_primary_url',
                'label' => 'CTA Główny - URL',
                'name' => 'cta_primary_url',
                'type' => 'text',
                'default_value' => '#cta-section',
              ),
              array(
                'key' => 'field_l1_hero_cta_secondary_text',
                'label' => 'CTA Drugorzędny - Tekst',
                'name' => 'cta_secondary_text',
                'type' => 'text',
                'default_value' => '[Secondary CTA]',
              ),
              array(
                'key' => 'field_l1_hero_cta_secondary_url',
                'label' => 'CTA Drugorzędny - URL',
                'name' => 'cta_secondary_url',
                'type' => 'text',
                'default_value' => '#services-list',
              ),
              array(
                'key' => 'field_l1_hero_background_type',
                'label' => 'Typ Tła',
                'name' => 'background_type',
                'type' => 'select',
                'choices' => array(
                  'photo-overlay' => 'Photo Overlay (Zdjęcie biurowe / audytorów)',
                  'cyber-raven' => 'Cyber Raven (Grafika Kruka + Neon Grid)',
                ),
                'default_value' => 'photo-overlay',
              ),
              array(
                'key' => 'field_l1_hero_bg_image',
                'label' => 'Własne Zdjęcie Tła (opcjonalne)',
                'name' => 'background_image',
                'type' => 'image',
                'return_format' => 'id',
              ),
              array(
                'key' => 'field_l1_hero_stat_1_val',
                'label' => 'Metryka 1 - Wartość',
                'name' => 'stat_1_value',
                'type' => 'text',
                'default_value' => '0+',
              ),
              array(
                'key' => 'field_l1_hero_stat_1_lbl',
                'label' => 'Metryka 1 - Etykieta',
                'name' => 'stat_1_label',
                'type' => 'text',
                'default_value' => '[Stat one]',
              ),
              array(
                'key' => 'field_l1_hero_stat_2_val',
                'label' => 'Metryka 2 - Wartość',
                'name' => 'stat_2_value',
                'type' => 'text',
                'default_value' => '0%',
              ),
              array(
                'key' => 'field_l1_hero_stat_2_lbl',
                'label' => 'Metryka 2 - Etykieta',
                'name' => 'stat_2_label',
                'type' => 'text',
                'default_value' => '[Stat two]',
              ),
              array(
                'key' => 'field_l1_hero_stat_3_val',
                'label' => 'Metryka 3 - Wartość',
                'name' => 'stat_3_value',
                'type' => 'text',
                'default_value' => '0+',
              ),
              array(
                'key' => 'field_l1_hero_stat_3_lbl',
                'label' => 'Metryka 3 - Etykieta',
                'name' => 'stat_3_label',
                'type' => 'text',
                'default_value' => '[Stat three]',
              ),
              array(
                'key' => 'field_l1_hero_stat_4_val',
                'label' => 'Metryka 4 - Wartość',
                'name' => 'stat_4_value',
                'type' => 'text',
                'default_value' => '0/6',
              ),
              array(
                'key' => 'field_l1_hero_stat_4_lbl',
                'label' => 'Metryka 4 - Etykieta',
                'name' => 'stat_4_label',
                'type' => 'text',
                'default_value' => '[Stat four]',
              ),
              array(
                'key' => 'field_l1_hero_stats_repeater',
                'label' => 'Dodatkowe / Niestandardowe Metryki (opcjonalny repeater)',
                'name' => 'stats',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Dodaj metrykę',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l1_hero_sub_stat_val',
                    'label' => 'Wartość',
                    'name' => 'value',
                    'type' => 'text',
                  ),
                  array(
                    'key' => 'field_l1_hero_sub_stat_lbl',
                    'label' => 'Etykieta',
                    'name' => 'label',
                    'type' => 'text',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: WHO_ITS_FOR (Crystal Graphic + 4 Audience Segments)
          // -----------------------------------------------------------------
          'layout_l1_who_its_for' => array(
            'key' => 'layout_l1_who_its_for',
            'name' => 'who_its_for',
            'label' => 'Who It\'s For (Dla Kogo Jest Ta Praktyka - Kryształ 3D)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_wif_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => "WHO IT'S FOR",
              ),
              array(
                'key' => 'field_l1_wif_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Who this is for heading]',
              ),
              array(
                'key' => 'field_l1_wif_desc',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '[Placeholder intro. Describe the types of organisations or buyers this page targets.]',
              ),
              array(
                'key' => 'field_l1_wif_crystal_img',
                'label' => 'Własna Grafika Kryształu (opcjonalny upload)',
                'name' => 'crystal_image',
                'type' => 'image',
                'return_format' => 'id',
              ),
              array(
                'key' => 'field_l1_wif_cards',
                'label' => 'Segmenty Odbiorców (Repeater)',
                'name' => 'cards',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj segment odbiorców',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l1_wif_card_icon',
                    'label' => 'Ikona (np. activity, wallet, terminal, fingerprint)',
                    'name' => 'icon',
                    'type' => 'text',
                    'default_value' => 'activity',
                  ),
                  array(
                    'key' => 'field_l1_wif_card_title',
                    'label' => 'Nazwa Segmentu',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => '[Audience one]',
                  ),
                  array(
                    'key' => 'field_l1_wif_card_desc',
                    'label' => 'Opis Segmentu',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => '[Placeholder copy describing who this is for.]',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: SERVICES_LIST (6 Cards Grid)
          // -----------------------------------------------------------------
          'layout_l1_services_list' => array(
            'key' => 'layout_l1_services_list',
            'name' => 'services_list',
            'label' => 'Services List (Lista Usług Praktyki L1 - Siatka 6 Kart)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_sl_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'SERVICES IN THIS PRACTICE',
              ),
              array(
                'key' => 'field_l1_sl_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Services section heading',
              ),
              array(
                'key' => 'field_l1_sl_desc',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Comprehensive compliance assessments delivered directly by accredited lead auditors.',
              ),
              array(
                'key' => 'field_l1_sl_services',
                'label' => 'Karty Usług (Repeater)',
                'name' => 'services',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj usługę',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l1_sl_service_icon',
                    'label' => 'Ikona',
                    'name' => 'icon',
                    'type' => 'text',
                    'default_value' => 'shield',
                  ),
                  array(
                    'key' => 'field_l1_sl_service_title',
                    'label' => 'Tytuł Usługi',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => '[Heading 1]',
                  ),
                  array(
                    'key' => 'field_l1_sl_service_desc',
                    'label' => 'Opis Usługi',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => '[Placeholder copy. Describe a common pain point, compliance blocker, or operational scenario that this service directly addresses.]',
                  ),
                  array(
                    'key' => 'field_l1_sl_service_url',
                    'label' => 'URL Usługi',
                    'name' => 'url',
                    'type' => 'text',
                    'default_value' => '#',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: SPECIALISTS (Theme=light)
          // -----------------------------------------------------------------
          'layout_l1_specialists' => array(
            'key' => 'layout_l1_specialists',
            'name' => 'specialists',
            'label' => 'Specialists (Dedykowani Eksperci - Wariant Jasny)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_spec_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'NAMED SPECIALISTS',
              ),
              array(
                'key' => 'field_l1_spec_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'The person you call is the person who does the work',
              ),
              array(
                'key' => 'field_l1_spec_subtitle',
                'label' => 'Podtytuł Sekcji',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Each standard has a named senior specialist. No rotation, no handoffs, no anonymous assessors — and the specialist you need depends on your environment.',
              ),
              array(
                'key' => 'field_l1_spec_theme',
                'label' => 'Wariant Stylistyczny (Motyw)',
                'name' => 'theme',
                'type' => 'select',
                'choices' => array(
                  'light' => 'Jasny motyw (Light Background)',
                  'dark' => 'Ciemny motyw (Dark Background)',
                ),
                'default_value' => 'light',
              ),
              array(
                'key' => 'field_l1_spec_cta_btn_text',
                'label' => 'Przycisk Dodatkowy - Tekst',
                'name' => 'cta_button_text',
                'type' => 'text',
                'default_value' => 'Meet the team',
              ),
              array(
                'key' => 'field_l1_spec_cta_btn_url',
                'label' => 'Przycisk Dodatkowy - URL',
                'name' => 'cta_button_url',
                'type' => 'text',
                'default_value' => '/team',
              ),
              array(
                'key' => 'field_l1_spec_members',
                'label' => 'Eksperci (Repeater)',
                'name' => 'members',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj eksperta',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l1_spec_member_name',
                    'label' => 'Imię i Nazwisko / Inicjał',
                    'name' => 'name',
                    'type' => 'text',
                    'default_value' => 'Anna K.',
                  ),
                  array(
                    'key' => 'field_l1_spec_member_role',
                    'label' => 'Rola i Akredytacje',
                    'name' => 'role_credentials',
                    'type' => 'text',
                    'default_value' => 'LEAD QSA • P2PE',
                  ),
                  array(
                    'key' => 'field_l1_spec_member_spec',
                    'label' => 'Specjalizacja Główna',
                    'name' => 'specialization',
                    'type' => 'text',
                    'default_value' => 'Point-to-point encryption solutions',
                  ),
                  array(
                    'key' => 'field_l1_spec_member_bio',
                    'label' => 'Krótki Biogram',
                    'name' => 'bio',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'P2PE is the fastest way to reduce your PCI scope — but only if the solution is assessed end-to-end. I lead every P2PE engagement from solution review to validation.',
                  ),
                  array(
                    'key' => 'field_l1_spec_member_photo',
                    'label' => 'Zdjęcie Eksperta',
                    'name' => 'photo',
                    'type' => 'image',
                    'return_format' => 'id',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: TESTIMONIALS (Theme=light)
          // -----------------------------------------------------------------
          'layout_l1_testimonials' => array(
            'key' => 'layout_l1_testimonials',
            'name' => 'testimonials',
            'label' => 'Testimonials (Opinie Klientów - Wariant Jasny)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_test_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'WHAT OUR CLIENTS SAY',
              ),
              array(
                'key' => 'field_l1_test_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'What our clients say',
              ),
              array(
                'key' => 'field_l1_test_theme',
                'label' => 'Wariant Stylistyczny',
                'name' => 'theme',
                'type' => 'select',
                'choices' => array(
                  'light' => 'Jasne tło (Light)',
                  'dark' => 'Ciemne tło (Dark)',
                ),
                'default_value' => 'light',
              ),
              array(
                'key' => 'field_l1_test_quote',
                'label' => 'Cytat Klienta',
                'name' => 'quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => '"Patronusec streamlined our entire PCI DSS audit. Their senior assessors provided exceptionally clear guidance and cut down our certification timeline by weeks."',
              ),
              array(
                'key' => 'field_l1_test_author',
                'label' => 'Autor / Stanowisko',
                'name' => 'author',
                'type' => 'text',
                'default_value' => 'Chief Information Security Officer',
              ),
              array(
                'key' => 'field_l1_test_role',
                'label' => 'Rola / Dział',
                'name' => 'role',
                'type' => 'text',
                'default_value' => 'Head of Information Security',
              ),
              array(
                'key' => 'field_l1_test_company',
                'label' => 'Firma / Branża Klienta',
                'name' => 'company',
                'type' => 'text',
                'default_value' => 'Enterprise FinTech Client',
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: CASE_STUDIES
          // -----------------------------------------------------------------
          'layout_l1_case_studies' => array(
            'key' => 'layout_l1_case_studies',
            'name' => 'case_studies',
            'label' => 'Case Studies (Studia Przypadków)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_cs_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'CASE STUDIES',
              ),
              array(
                'key' => 'field_l1_cs_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Case studies heading]',
              ),
              array(
                'key' => 'field_l1_cs_desc',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '[Placeholder intro. Introduce the case studies and note any confidentiality constraints. Replace before publishing.]',
              ),
              array(
                'key' => 'field_l1_cs_items',
                'label' => 'Karty Case Studies (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj case study',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l1_cs_item_persona',
                    'label' => 'Persona / Sektor (Badge)',
                    'name' => 'persona_badge',
                    'type' => 'text',
                    'default_value' => '[Client persona one]',
                  ),
                  array(
                    'key' => 'field_l1_cs_item_situation',
                    'label' => 'Sytuacja Wyjściowa (Situation)',
                    'name' => 'situation',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => '[Placeholder situation. Describe the challenge this client faced.]',
                  ),
                  array(
                    'key' => 'field_l1_cs_item_outcome',
                    'label' => 'Osiągnięty Wynik (Outcome)',
                    'name' => 'outcome',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => '[Placeholder outcome. Describe the result delivered.]',
                  ),
                  array(
                    'key' => 'field_l1_cs_item_metric',
                    'label' => 'Wyróżnik Metryki (Metric Badge)',
                    'name' => 'metric_badge',
                    'type' => 'text',
                    'default_value' => '[Metric]',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: FAQ
          // -----------------------------------------------------------------
          'layout_l1_faq' => array(
            'key' => 'layout_l1_faq',
            'name' => 'faq',
            'label' => 'FAQ (Często Zadawane Pytania)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_faq_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'QUESTIONS',
              ),
              array(
                'key' => 'field_l1_faq_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Frequently asked questions]',
              ),
              array(
                'key' => 'field_l1_faq_items',
                'label' => 'Pytania i Odpowiedzi (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj pytanie',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l1_faq_q',
                    'label' => 'Pytanie',
                    'name' => 'question',
                    'type' => 'text',
                    'default_value' => '[Question one?]',
                  ),
                  array(
                    'key' => 'field_l1_faq_a',
                    'label' => 'Odpowiedź',
                    'name' => 'answer',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Placeholder answer providing concise, actionable guidance regarding this compliance practice.',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: CTA_SECTION
          // -----------------------------------------------------------------
          'layout_l1_cta_section' => array(
            'key' => 'layout_l1_cta_section',
            'name' => 'cta_section',
            'label' => 'CTA & Formularz (Prezentacyjny)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_cta_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'START THE CONVERSATION',
              ),
              array(
                'key' => 'field_l1_cta_title',
                'label' => 'Tytuł Sekcji (H2)',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[CTA heading]',
              ),
              array(
                'key' => 'field_l1_cta_subtitle',
                'label' => 'Podtytuł / Zachęta',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '[Placeholder CTA subtitle. Replace with the real call-to-action copy before publishing.]',
              ),
              array(
                'key' => 'field_l1_cta_shortcode',
                'label' => 'Shortcode Formularza (Opcjonalny)',
                'name' => 'form_shortcode',
                'type' => 'text',
                'instructions' => 'Wklej np. [contact-form-7 id="123"] lub pozostaw puste, aby renderować natywny semantyczny markup UI.',
                'default_value' => '',
              ),
              array(
                'key' => 'field_l1_cta_button_text',
                'label' => 'Napis na Przycisku',
                'name' => 'button_text',
                'type' => 'text',
                'default_value' => 'Talk to an assessor',
              ),
              array(
                'key' => 'field_l1_cta_tb1',
                'label' => 'Plakietka Zaufania 1',
                'name' => 'trust_badge_1',
                'type' => 'text',
                'default_value' => 'Free 30-min scoping call',
              ),
              array(
                'key' => 'field_l1_cta_tb2',
                'label' => 'Plakietka Zaufania 2',
                'name' => 'trust_badge_2',
                'type' => 'text',
                'default_value' => 'No obligation',
              ),
              array(
                'key' => 'field_l1_cta_tb3',
                'label' => 'Plakietka Zaufania 3',
                'name' => 'trust_badge_3',
                'type' => 'text',
                'default_value' => 'Senior assessor not sales',
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: RELATED_SERVICES (Theme=light)
          // -----------------------------------------------------------------
          'layout_l1_related_services' => array(
            'key' => 'layout_l1_related_services',
            'name' => 'related_services',
            'label' => 'Related Services (Powiązane Usługi L1 - 3 Karty)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l1_rs_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'RELATED SERVICES',
              ),
              array(
                'key' => 'field_l1_rs_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Other services you might be interested in',
              ),
              array(
                'key' => 'field_l1_rs_theme',
                'label' => 'Wariant Stylistyczny',
                'name' => 'theme',
                'type' => 'select',
                'choices' => array(
                  'light' => 'Jasne tło (Light)',
                  'dark' => 'Ciemne tło (Dark)',
                ),
                'default_value' => 'light',
              ),
              array(
                'key' => 'field_l1_rs_items',
                'label' => 'Karty Powiązanych Usług (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj usługę',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l1_rs_item_cat',
                    'label' => 'Kategoria w nawiasie (np. [CATEGORY])',
                    'name' => 'category',
                    'type' => 'text',
                    'default_value' => '[CATEGORY]',
                  ),
                  array(
                    'key' => 'field_l1_rs_item_title',
                    'label' => 'Tytuł Usługi',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => '[Related service one]',
                  ),
                  array(
                    'key' => 'field_l1_rs_item_desc',
                    'label' => 'Opis Powiązania',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => '[Placeholder blurb. Describe this related service and how it complements the current offering.]',
                  ),
                  array(
                    'key' => 'field_l1_rs_item_url',
                    'label' => 'URL Szczegółów',
                    'name' => 'link_url',
                    'type' => 'text',
                    'default_value' => '#',
                  ),
                ),
              ),
            ),
          ),

        ), // end layouts
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'templates/template-l1-2026.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
    ),
    'active' => true,
    'description' => 'Konfiguracja sekcji szablonu usług L1 w architekturze 2026',
  ));
});
