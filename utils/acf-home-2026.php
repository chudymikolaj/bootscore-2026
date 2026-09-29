<?php
/**
 * ACF Configuration for Template: Nowa Strona Główna (2026)
 * File: utils/acf-home-2026.php
 * Template: templates/template-home-2026.php
 *
 * Provides a flexible content builder with drag & drop sections
 * and 1:1 default values matching the Figma design (Poprawki HOME).
 */

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array(
    'key' => 'group_home_2026',
    'title' => 'Strona Główna (2026) - Sekcje Elastyczne',
    'fields' => array(
      array(
        'key' => 'field_home_sections',
        'label' => 'Sekcje Strony Głównej (2026)',
        'name' => 'sections',
        'type' => 'flexible_content',
        'instructions' => 'Układaj, dodawaj lub usuwaj sekcje strony metodą drag & drop.',
        'required' => 0,
        'button_label' => 'Dodaj sekcję',
        'layouts' => array(

          // -----------------------------------------------------------------
          // LAYOUT: HERO
          // -----------------------------------------------------------------
          'layout_home_hero' => array(
            'key' => 'layout_home_hero',
            'name' => 'hero',
            'label' => 'Hero (Sekcja Główna)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_hero_badge',
                'label' => 'Badge / Kategoria',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'PCI • ISO 27001 • DORA • NIS2 • TISAX • VCISO • PENTESTING',
              ),
              array(
                'key' => 'field_home_hero_title',
                'label' => 'Tytuł Główny (H1)',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'You expand your business.',
              ),
              array(
                'key' => 'field_home_hero_subtitle_italic',
                'label' => 'Podtytuł (Kursywa)',
                'name' => 'subtitle_italic',
                'type' => 'text',
                'default_value' => 'We keep it secure.',
              ),
              array(
                'key' => 'field_home_hero_description',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 4,
                'default_value' => "Rising cyber threats, data loss risks, and new IT regulations can strike at any moment, jeopardising your company's reputation. Don't leave it to chance. We deliver comprehensive protection: PCI DSS and payment security certification, IT compliance and standards work (ISO 27001, DORA, NIS2, TISAX), and cybersecurity services from vCISO leadership to penetration testing — all under one roof.\n\nPatronusec protects your systems so you can focus entirely on growing your business.",
              ),
              array(
                'key' => 'field_home_hero_cta_primary_text',
                'label' => 'CTA Główny - Tekst',
                'name' => 'cta_primary_text',
                'type' => 'text',
                'default_value' => 'Talk to an assessor',
              ),
              array(
                'key' => 'field_home_hero_cta_primary_url',
                'label' => 'CTA Główny - URL',
                'name' => 'cta_primary_url',
                'type' => 'text',
                'default_value' => '#cta-section',
              ),
              array(
                'key' => 'field_home_hero_cta_secondary_text',
                'label' => 'CTA Drugorzędny - Tekst',
                'name' => 'cta_secondary_text',
                'type' => 'text',
                'default_value' => 'Explore certifications',
              ),
              array(
                'key' => 'field_home_hero_cta_secondary_url',
                'label' => 'CTA Drugorzędny - URL',
                'name' => 'cta_secondary_url',
                'type' => 'text',
                'default_value' => '#services-grid',
              ),
              array(
                'key' => 'field_home_hero_variant',
                'label' => 'Wariant Szablonu Hero',
                'name' => 'hero_variant',
                'type' => 'select',
                'choices' => array(
                  'variant_1' => 'HOME 1 (Figma 132:1005 - Kruk + Odrębny Pasek Statystyk)',
                  'variant_2' => 'HOME 2 (Figma 241:2048 - Quick Stats Banner wewnątrz Hero)',
                ),
                'default_value' => 'variant_1',
              ),
              array(
                'key' => 'field_home_hero_background_type',
                'label' => 'Typ Tła',
                'name' => 'background_type',
                'type' => 'select',
                'choices' => array(
                  'cyber-raven' => 'Cyber Raven (Grafika Kruka + Neon Grid)',
                  'photo-overlay' => 'Photo Overlay (Zdjęcie audytorów)',
                ),
                'default_value' => 'cyber-raven',
              ),
              array(
                'key' => 'field_home_hero_stat_1_val',
                'label' => 'Metryka 1 - Wartość',
                'name' => 'stat_1_value',
                'type' => 'text',
                'default_value' => '1,000+',
              ),
              array(
                'key' => 'field_home_hero_stat_1_lbl',
                'label' => 'Metryka 1 - Etykieta',
                'name' => 'stat_1_label',
                'type' => 'text',
                'default_value' => 'Projects delivered',
              ),
              array(
                'key' => 'field_home_hero_stat_2_val',
                'label' => 'Metryka 2 - Wartość',
                'name' => 'stat_2_value',
                'type' => 'text',
                'default_value' => '94%',
              ),
              array(
                'key' => 'field_home_hero_stat_2_lbl',
                'label' => 'Metryka 2 - Etykieta',
                'name' => 'stat_2_label',
                'type' => 'text',
                'default_value' => 'Client retention',
              ),
              array(
                'key' => 'field_home_hero_stat_3_val',
                'label' => 'Metryka 3 - Wartość',
                'name' => 'stat_3_value',
                'type' => 'text',
                'default_value' => '60+',
              ),
              array(
                'key' => 'field_home_hero_stat_3_lbl',
                'label' => 'Metryka 3 - Etykieta',
                'name' => 'stat_3_label',
                'type' => 'text',
                'default_value' => 'Countries served',
              ),
              array(
                'key' => 'field_home_hero_stat_4_val',
                'label' => 'Metryka 4 - Wartość',
                'name' => 'stat_4_value',
                'type' => 'text',
                'default_value' => '6/6',
              ),
              array(
                'key' => 'field_home_hero_stat_4_lbl',
                'label' => 'Metryka 4 - Etykieta',
                'name' => 'stat_4_label',
                'type' => 'text',
                'default_value' => 'PCI accreditations',
              ),
              array(
                'key' => 'field_home_hero_stats_repeater',
                'label' => 'Dodatkowe / Niestandardowe Metryki (opcjonalny repeater)',
                'name' => 'stats',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Dodaj metrykę',
                'sub_fields' => array(
                  array(
                    'key' => 'field_home_hero_sub_stat_val',
                    'label' => 'Wartość',
                    'name' => 'value',
                    'type' => 'text',
                  ),
                  array(
                    'key' => 'field_home_hero_sub_stat_lbl',
                    'label' => 'Etykieta',
                    'name' => 'label',
                    'type' => 'text',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: STARTING_POINT
          // -----------------------------------------------------------------
          'layout_home_starting_point' => array(
            'key' => 'layout_home_starting_point',
            'name' => 'starting_point',
            'label' => 'Starting Point (Kafelki Wyboru Ścieżki)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_sp_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'WHERE ARE YOU STARTING FROM?',
              ),
              array(
                'key' => 'field_home_sp_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => "Not sure where to start? Tell us what's bringing you here.",
              ),
              array(
                'key' => 'field_home_sp_subtitle',
                'label' => 'Podtytuł / Opis',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => "Pick the situation closest to yours - we'll take you straight to the right service.",
              ),
              array(
                'key' => 'field_home_sp_cards',
                'label' => 'Karty Ścieżek (Repeater)',
                'name' => 'cards',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj kartę ścieżki',
                'sub_fields' => array(
                  array(
                    'key' => 'field_home_sp_card_title',
                    'label' => 'Tytuł / Wyzwanie',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => 'We need PCI DSS or payment security certification',
                  ),
                  array(
                    'key' => 'field_home_sp_card_desc',
                    'label' => 'Opis szczegółowy',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Audits, gap analysis, RoC/AoC certification and end-to-end guidance.',
                  ),
                  array(
                    'key' => 'field_home_sp_card_url',
                    'label' => 'Link Docelowy (URL lub kotwica)',
                    'name' => 'link_url',
                    'type' => 'text',
                    'default_value' => '#services-grid',
                  ),
                  array(
                    'key' => 'field_home_sp_card_target',
                    'label' => 'Atrybut Data-Target (do skryptu JS)',
                    'name' => 'target_id',
                    'type' => 'text',
                    'default_value' => 'pci-compliance',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: SERVICES_GRID
          // -----------------------------------------------------------------
          'layout_home_services_grid' => array(
            'key' => 'layout_home_services_grid',
            'name' => 'services_grid',
            'label' => 'Services Grid (Siatka Usług Głównych)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_sg_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'WHAT WE DO',
              ),
              array(
                'key' => 'field_home_sg_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Find the service that fits your situation',
              ),
              array(
                'key' => 'field_home_sg_subtitle',
                'label' => 'Opis Pod Nagłówkiem',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'From a mandatory PCI assessment to a DORA deadline or an enterprise security review, one senior team can take you from the first question to a defensible result.',
              ),
              array(
                'key' => 'field_home_sg_adv_title',
                'label' => 'Boks Doradczy - Tytuł',
                'name' => 'advisory_title',
                'type' => 'text',
                'default_value' => 'Not sure where you stand?',
              ),
              array(
                'key' => 'field_home_sg_adv_blurb',
                'label' => 'Boks Doradczy - Opis',
                'name' => 'advisory_blurb',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => "Tell us what you do - we'll point you to the right standard.",
              ),
              array(
                'key' => 'field_home_sg_adv_btn_text',
                'label' => 'Boks Doradczy - Przycisk Tekst',
                'name' => 'advisory_btn_text',
                'type' => 'text',
                'default_value' => 'Request a scoping call',
              ),
              array(
                'key' => 'field_home_sg_adv_btn_url',
                'label' => 'Boks Doradczy - Przycisk URL',
                'name' => 'advisory_btn_url',
                'type' => 'text',
                'default_value' => '#cta-section',
              ),
              array(
                'key' => 'field_home_sg_services',
                'label' => 'Karty Usług (Repeater)',
                'name' => 'services',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj usługę',
                'sub_fields' => array(
                  array(
                    'key' => 'field_home_sg_service_icon',
                    'label' => 'Ikona (np. shield, compliance, lock, continuity, pentest, training)',
                    'name' => 'icon',
                    'type' => 'text',
                    'default_value' => 'shield',
                  ),
                  array(
                    'key' => 'field_home_sg_service_title',
                    'label' => 'Tytuł Usługi',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => 'PCI Certifications',
                  ),
                  array(
                    'key' => 'field_home_sg_service_desc',
                    'label' => 'Opis Usługi',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Do you handle or process card data? We guide you through the full range of PCI SSC standards, showing you that certification can be straightforward - not the drawn-out process it has a reputation for.',
                  ),
                  array(
                    'key' => 'field_home_sg_service_url',
                    'label' => 'URL Szczegółów',
                    'name' => 'url',
                    'type' => 'text',
                    'default_value' => '#',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: PROOF_POINTS
          // -----------------------------------------------------------------
          'layout_home_proof_points' => array(
            'key' => 'layout_home_proof_points',
            'name' => 'proof_points',
            'label' => 'Proof Points (Dowody Kompetencji)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_pp_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'WHY PATRONUSEC',
              ),
              array(
                'key' => 'field_home_pp_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Proof that holds up when the stakes are high.',
              ),
              array(
                'key' => 'field_home_pp_subtitle',
                'label' => 'Podtytuł / Wprowadzenie',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Security buyers do not need louder promises. They need an experienced team, proven accreditations, and zero surprises.',
              ),
              array(
                'key' => 'field_home_pp_items',
                'label' => 'Karty Przewag (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj kartę przewagi',
                'sub_fields' => array(
                  array(
                    'key' => 'field_home_pp_item_number',
                    'label' => 'Wyróżnik / Liczba (Number/Title)',
                    'name' => 'number',
                    'type' => 'text',
                    'default_value' => '1,000+',
                  ),
                  array(
                    'key' => 'field_home_pp_item_label',
                    'label' => 'Etykieta Nagłówka',
                    'name' => 'label',
                    'type' => 'text',
                    'default_value' => 'Engagements delivered',
                  ),
                  array(
                    'key' => 'field_home_pp_item_desc',
                    'label' => 'Opis merytoryczny',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Lead assessors with 15+ years average experience across 60+ countries.',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: CREDENTIALS_WALL
          // -----------------------------------------------------------------
          'layout_home_credentials_wall' => array(
            'key' => 'layout_home_credentials_wall',
            'name' => 'credentials_wall',
            'label' => 'Credentials Wall (Ściana Akredytacji i Wyróżnienie)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_cw_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'ACCREDITATIONS & RECOGNITION',
              ),
              array(
                'key' => 'field_home_cw_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Recognized by payment brands and global standards bodies',
              ),
              array(
                'key' => 'field_home_cw_subtitle',
                'label' => 'Podtytuł / Członkostwo',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Proud members of the Business Centre Club, an exclusive network of trustworthy and reputable business organisations.',
              ),
              array(
                'key' => 'field_home_cw_hl_badge',
                'label' => 'Podświetlony Baner - Badge',
                'name' => 'highlight_badge',
                'type' => 'text',
                'default_value' => 'In PCI since v1.2.',
              ),
              array(
                'key' => 'field_home_cw_hl_title',
                'label' => 'Podświetlony Baner - Tytuł',
                'name' => 'highlight_title',
                'type' => 'text',
                'default_value' => 'PCI DSS v4.0.1 Ready',
              ),
              array(
                'key' => 'field_home_cw_hl_text',
                'label' => 'Podświetlony Baner - Treść',
                'name' => 'highlight_text',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'QSA-accredited since 2015. 200+ PCI DSS audits delivered across 60+ countries — with a 94% client retention rate and a 100% on-schedule record.',
              ),
              array(
                'key' => 'field_home_cw_logos',
                'label' => 'Logotypy Akredytacji (Repeater)',
                'name' => 'logos',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Dodaj logo',
                'sub_fields' => array(
                  array(
                    'key' => 'field_home_cw_logo_name',
                    'label' => 'Nazwa Certyfikatu (np. QSA, CISM, ASV)',
                    'name' => 'name',
                    'type' => 'text',
                    'default_value' => 'QSA',
                  ),
                  array(
                    'key' => 'field_home_cw_logo_image',
                    'label' => 'Grafika / Logo (opcjonalny upload)',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'id',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: TESTIMONIALS
          // -----------------------------------------------------------------
          'layout_home_testimonials' => array(
            'key' => 'layout_home_testimonials',
            'name' => 'testimonials',
            'label' => 'Testimonials (Opinie Klientów)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_test_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'WHAT OUR CLIENTS SAY',
              ),
              array(
                'key' => 'field_home_test_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'What our clients say',
              ),
              array(
                'key' => 'field_home_test_quote',
                'label' => 'Cytat Klienta',
                'name' => 'quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => '"Patronusec streamlined our entire PCI DSS audit. Their senior assessors provided exceptionally clear guidance and cut down our certification timeline by weeks."',
              ),
              array(
                'key' => 'field_home_test_author',
                'label' => 'Autor / Stanowisko',
                'name' => 'author',
                'type' => 'text',
                'default_value' => 'Chief Information Security Officer',
              ),
              array(
                'key' => 'field_home_test_role',
                'label' => 'Rola / Dział',
                'name' => 'role',
                'type' => 'text',
                'default_value' => 'Head of Information Security',
              ),
              array(
                'key' => 'field_home_test_company',
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
          'layout_home_case_studies' => array(
            'key' => 'layout_home_case_studies',
            'name' => 'case_studies',
            'label' => 'Case Studies (Studia Przypadków)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_cs_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'CASE STUDIES',
              ),
              array(
                'key' => 'field_home_cs_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Proven outcomes in high-stakes compliance',
              ),
              array(
                'key' => 'field_home_cs_desc',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Real client engagements demonstrating fast-track certification, major scope reduction, and defensible audit results.',
              ),
              array(
                'key' => 'field_home_cs_items',
                'label' => 'Karty Case Studies (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj case study',
                'sub_fields' => array(
                  array(
                    'key' => 'field_home_cs_item_persona',
                    'label' => 'Persona / Sektor (Badge)',
                    'name' => 'persona_badge',
                    'type' => 'text',
                    'default_value' => 'FINTECH / GLOBAL PSP',
                  ),
                  array(
                    'key' => 'field_home_cs_item_situation',
                    'label' => 'Sytuacja Wyjściowa (Situation)',
                    'name' => 'situation',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Complex multi-cloud payment gateway needing PCI DSS v4.0.1 compliance in 8 weeks.',
                  ),
                  array(
                    'key' => 'field_home_cs_item_outcome',
                    'label' => 'Osiągnięty Wynik (Outcome)',
                    'name' => 'outcome',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Zero non-conformities on first assessment, RoC delivered ahead of deadline.',
                  ),
                  array(
                    'key' => 'field_home_cs_item_metric',
                    'label' => 'Wyróżnik Metryki (Metric Badge)',
                    'name' => 'metric_badge',
                    'type' => 'text',
                    'default_value' => '8 WEEKS FAST-TRACK',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: FAQ
          // -----------------------------------------------------------------
          'layout_home_faq' => array(
            'key' => 'layout_home_faq',
            'name' => 'faq',
            'label' => 'FAQ (Często Zadawane Pytania)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_faq_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'QUESTIONS',
              ),
              array(
                'key' => 'field_home_faq_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Frequently asked questions',
              ),
              array(
                'key' => 'field_home_faq_items',
                'label' => 'Pytania i Odpowiedzi (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj pytanie',
                'sub_fields' => array(
                  array(
                    'key' => 'field_home_faq_q',
                    'label' => 'Pytanie',
                    'name' => 'question',
                    'type' => 'text',
                    'default_value' => 'How long does a typical PCI DSS v4.0.1 assessment take?',
                  ),
                  array(
                    'key' => 'field_home_faq_a',
                    'label' => 'Odpowiedź',
                    'name' => 'answer',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Depending on the scope, architecture, and readiness of the client, assessments typically range from 4 to 12 weeks. We conduct a thorough pre-assessment scoping call to provide an accurate schedule.',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: CTA_SECTION
          // -----------------------------------------------------------------
          'layout_home_cta_section' => array(
            'key' => 'layout_home_cta_section',
            'name' => 'cta_section',
            'label' => 'CTA & Formularz (Prezentacyjny)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_home_cta_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'START THE CONVERSATION',
              ),
              array(
                'key' => 'field_home_cta_title',
                'label' => 'Tytuł Sekcji (H2)',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Direct access to a senior assessor. No sales reps.',
              ),
              array(
                'key' => 'field_home_cta_subtitle',
                'label' => 'Podtytuł / Zachęta',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Connect directly with accredited QSA and security leaders to scope your project with precision.',
              ),
              array(
                'key' => 'field_home_cta_shortcode',
                'label' => 'Shortcode Formularza (Opcjonalny)',
                'name' => 'form_shortcode',
                'type' => 'text',
                'instructions' => 'Wklej np. [contact-form-7 id="123"] lub pozostaw puste, aby renderować natywny semantyczny markup UI.',
                'default_value' => '',
              ),
              array(
                'key' => 'field_home_cta_button_text',
                'label' => 'Napis na Przycisku',
                'name' => 'button_text',
                'type' => 'text',
                'default_value' => 'Talk to an assessor',
              ),
              array(
                'key' => 'field_home_cta_tb1',
                'label' => 'Plakietka Zaufania 1',
                'name' => 'trust_badge_1',
                'type' => 'text',
                'default_value' => 'Free 30-min scoping call',
              ),
              array(
                'key' => 'field_home_cta_tb2',
                'label' => 'Plakietka Zaufania 2',
                'name' => 'trust_badge_2',
                'type' => 'text',
                'default_value' => 'No obligation',
              ),
              array(
                'key' => 'field_home_cta_tb3',
                'label' => 'Plakietka Zaufania 3',
                'name' => 'trust_badge_3',
                'type' => 'text',
                'default_value' => 'Senior assessor not sales',
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
          'value' => 'templates/template-home-2026.php',
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
    'description' => 'Konfiguracja sekcji strony głównej w architekturze 2026',
  ));
});
