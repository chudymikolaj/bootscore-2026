<?php
/**
 * ACF Configuration for Template: Nowy Szablon Usług L2 (2026)
 * File: utils/acf-l2-2026.php
 * Template: templates/template-l2-2026.php
 *
 * Provides a flexible content builder with drag & drop sections
 * and 1:1 default values matching the Figma design (Poprawki L2).
 */

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array(
    'key' => 'group_l2_2026',
    'title' => 'Usługa Szczegółowa L2 (2026) - Sekcje Elastyczne',
    'fields' => array(
      array(
        'key' => 'field_l2_sections',
        'label' => 'Sekcje Szablonu L2 (2026)',
        'name' => 'sections',
        'type' => 'flexible_content',
        'instructions' => 'Układaj, dodawaj lub usuwaj sekcje strony metodą drag & drop.',
        'required' => 0,
        'button_label' => 'Dodaj sekcję',
        'layouts' => array(

          // -----------------------------------------------------------------
          // LAYOUT: HERO
          // -----------------------------------------------------------------
          'layout_l2_hero' => array(
            'key' => 'layout_l2_hero',
            'name' => 'hero',
            'label' => 'Hero (Sekcja Główna L2)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_hero_badge',
                'label' => 'Badge / Kategoria',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'SERVICE TEMPLATE',
              ),
              array(
                'key' => 'field_l2_hero_title',
                'label' => 'Tytuł Główny (H1)',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Service title]',
              ),
              array(
                'key' => 'field_l2_hero_subtitle_italic',
                'label' => 'Podtytuł (Kursywa)',
                'name' => 'subtitle_italic',
                'type' => 'text',
                'default_value' => '[Subtitle goes here]',
              ),
              array(
                'key' => 'field_l2_hero_description',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => '[Placeholder intro paragraph. Describe the service in one or two sentences. Replace this text with the real value proposition before publishing.]',
              ),
              array(
                'key' => 'field_l2_hero_cta_primary_text',
                'label' => 'CTA Główny - Tekst',
                'name' => 'cta_primary_text',
                'type' => 'text',
                'default_value' => '[Primary CTA]',
              ),
              array(
                'key' => 'field_l2_hero_cta_primary_url',
                'label' => 'CTA Główny - URL',
                'name' => 'cta_primary_url',
                'type' => 'text',
                'default_value' => '#cta-section',
              ),
              array(
                'key' => 'field_l2_hero_cta_secondary_text',
                'label' => 'CTA Drugorzędny - Tekst',
                'name' => 'cta_secondary_text',
                'type' => 'text',
                'default_value' => '[Secondary CTA]',
              ),
              array(
                'key' => 'field_l2_hero_cta_secondary_url',
                'label' => 'CTA Drugorzędny - URL',
                'name' => 'cta_secondary_url',
                'type' => 'text',
                'default_value' => '#overview',
              ),
              array(
                'key' => 'field_l2_hero_background_type',
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
                'key' => 'field_l2_hero_bg_image',
                'label' => 'Własne Zdjęcie Tła (opcjonalne)',
                'name' => 'background_image',
                'type' => 'image',
                'return_format' => 'id',
              ),
              array(
                'key' => 'field_l2_hero_stat_1_val',
                'label' => 'Metryka 1 - Wartość',
                'name' => 'stat_1_value',
                'type' => 'text',
                'default_value' => '0+',
              ),
              array(
                'key' => 'field_l2_hero_stat_1_lbl',
                'label' => 'Metryka 1 - Etykieta',
                'name' => 'stat_1_label',
                'type' => 'text',
                'default_value' => '[Stat one]',
              ),
              array(
                'key' => 'field_l2_hero_stat_2_val',
                'label' => 'Metryka 2 - Wartość',
                'name' => 'stat_2_value',
                'type' => 'text',
                'default_value' => '0%',
              ),
              array(
                'key' => 'field_l2_hero_stat_2_lbl',
                'label' => 'Metryka 2 - Etykieta',
                'name' => 'stat_2_label',
                'type' => 'text',
                'default_value' => '[Stat two]',
              ),
              array(
                'key' => 'field_l2_hero_stat_3_val',
                'label' => 'Metryka 3 - Wartość',
                'name' => 'stat_3_value',
                'type' => 'text',
                'default_value' => '0+',
              ),
              array(
                'key' => 'field_l2_hero_stat_3_lbl',
                'label' => 'Metryka 3 - Etykieta',
                'name' => 'stat_3_label',
                'type' => 'text',
                'default_value' => '[Stat three]',
              ),
              array(
                'key' => 'field_l2_hero_stat_4_val',
                'label' => 'Metryka 4 - Wartość',
                'name' => 'stat_4_value',
                'type' => 'text',
                'default_value' => '0/6',
              ),
              array(
                'key' => 'field_l2_hero_stat_4_lbl',
                'label' => 'Metryka 4 - Etykieta',
                'name' => 'stat_4_label',
                'type' => 'text',
                'default_value' => '[Stat four]',
              ),
              array(
                'key' => 'field_l2_hero_stats_repeater',
                'label' => 'Dodatkowe / Niestandardowe Metryki (opcjonalny repeater)',
                'name' => 'stats',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Dodaj metrykę',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_hero_sub_stat_val',
                    'label' => 'Wartość',
                    'name' => 'value',
                    'type' => 'text',
                  ),
                  array(
                    'key' => 'field_l2_hero_sub_stat_lbl',
                    'label' => 'Etykieta',
                    'name' => 'label',
                    'type' => 'text',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: WHO_SERVICE_IS_FOR (3 Criteria Cards with Green Bullets)
          // -----------------------------------------------------------------
          'layout_l2_who_service_is_for' => array(
            'key' => 'layout_l2_who_service_is_for',
            'name' => 'who_service_is_for',
            'label' => 'Who Service Is For (Dla Kogo - 3 Karty Kryteriów)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_wsif_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'WHO [SAMPLE SERVICE] IS FOR',
              ),
              array(
                'key' => 'field_l2_wsif_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'See if this is your situation.',
              ),
              array(
                'key' => 'field_l2_wsif_cards',
                'label' => 'Karty Kwalifikacyjne (Repeater)',
                'name' => 'cards',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj kartę kwalifikacyjną',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_wsif_card_icon',
                    'label' => 'Ikona (np. credit-card, server, shield)',
                    'name' => 'icon',
                    'type' => 'text',
                    'default_value' => 'credit-card',
                  ),
                  array(
                    'key' => 'field_l2_wsif_card_title',
                    'label' => 'Nagłówek Karty',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => '[Heading 1]',
                  ),
                  array(
                    'key' => 'field_l2_wsif_card_desc',
                    'label' => 'Opis Sytuacji',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => '[Placeholder copy. Describe a common pain point, compliance blocker, or operational scenario that this service directly addresses.]',
                  ),
                  array(
                    'key' => 'field_l2_wsif_card_crit_1',
                    'label' => 'Punkt Kryterium 1',
                    'name' => 'criteria_1',
                    'type' => 'text',
                    'default_value' => '[Bullet point 1]',
                  ),
                  array(
                    'key' => 'field_l2_wsif_card_crit_2',
                    'label' => 'Punkt Kryterium 2',
                    'name' => 'criteria_2',
                    'type' => 'text',
                    'default_value' => '[Bullet point 2]',
                  ),
                  array(
                    'key' => 'field_l2_wsif_card_crit_3',
                    'label' => 'Punkt Kryterium 3',
                    'name' => 'criteria_3',
                    'type' => 'text',
                    'default_value' => '[Bullet point 3]',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: OVERVIEW (Split Diagram + Narrative)
          // -----------------------------------------------------------------
          'layout_l2_overview' => array(
            'key' => 'layout_l2_overview',
            'name' => 'overview',
            'label' => 'Overview (Przegląd Usługi - Split Diagram + Treść)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_ov_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'OVERVIEW',
              ),
              array(
                'key' => 'field_l2_ov_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Section heading]',
              ),
              array(
                'key' => 'field_l2_ov_desc',
                'label' => 'Treść Merytoryczna / Opis',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 4,
                'default_value' => '[Placeholder intro paragraph. Explain what this service covers and who it is for. Replace this with detailed compliance scope details, standard expectations, or methodology summaries before publishing.]',
              ),
              array(
                'key' => 'field_l2_ov_diagram_img',
                'label' => 'Grafika Schematu / Diagramu (opcjonalny upload)',
                'name' => 'diagram_image',
                'type' => 'image',
                'return_format' => 'id',
              ),
              array(
                'key' => 'field_l2_ov_bullets',
                'label' => 'Dodatkowe Punkty Zakresu (Repeater)',
                'name' => 'bullet_points',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Dodaj punkt',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_ov_bullet_text',
                    'label' => 'Punkt / Wyróżnik',
                    'name' => 'text',
                    'type' => 'text',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: PROCESS (4 Steps)
          // -----------------------------------------------------------------
          'layout_l2_process' => array(
            'key' => 'layout_l2_process',
            'name' => 'process',
            'label' => 'Process (4-Etapowa Metodyka Audytu)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_proc_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'PROCESS',
              ),
              array(
                'key' => 'field_l2_proc_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[How it works]',
              ),
              array(
                'key' => 'field_l2_proc_subtitle',
                'label' => 'Podtytuł / Opis',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '[Placeholder intro. Walk the reader through the engagement from start to finish.]',
              ),
              array(
                'key' => 'field_l2_proc_steps',
                'label' => 'Kroki Metodyki (Repeater)',
                'name' => 'steps',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj krok',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_proc_step_num',
                    'label' => 'Numer Kroku (np. 1, 2, 3, 4)',
                    'name' => 'step_number',
                    'type' => 'text',
                    'default_value' => '1',
                  ),
                  array(
                    'key' => 'field_l2_proc_step_title',
                    'label' => 'Nazwa Kroku',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => '[Step one]',
                  ),
                  array(
                    'key' => 'field_l2_proc_step_desc',
                    'label' => 'Opis Czynności',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => '[Placeholder copy. Describe the first step of the engagement process in practical milestones.]',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: CASE_OUTCOMES (6 Metadata Fields + Client Quote)
          // -----------------------------------------------------------------
          'layout_l2_case_outcomes' => array(
            'key' => 'layout_l2_case_outcomes',
            'name' => 'case_outcomes',
            'label' => 'Case Outcomes (Szczegółowy Boks Wyników i Metadanych)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_co_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'CASE OUTCOMES',
              ),
              array(
                'key' => 'field_l2_co_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Case outcomes heading]',
              ),
              array(
                'key' => 'field_l2_co_desc',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '[Placeholder intro. Introduce the case study and note any confidentiality constraints. Replace before publishing.]',
              ),
              array(
                'key' => 'field_l2_co_industry',
                'label' => 'Parametr: Branża (Industry)',
                'name' => 'industry',
                'type' => 'text',
                'default_value' => 'Sample industry',
              ),
              array(
                'key' => 'field_l2_co_region',
                'label' => 'Parametr: Region',
                'name' => 'region',
                'type' => 'text',
                'default_value' => 'Sample region',
              ),
              array(
                'key' => 'field_l2_co_scale',
                'label' => 'Parametr: Skala (Scale)',
                'name' => 'scale',
                'type' => 'text',
                'default_value' => 'Sample scale',
              ),
              array(
                'key' => 'field_l2_co_scope',
                'label' => 'Parametr: Zakres (Scope)',
                'name' => 'scope',
                'type' => 'text',
                'default_value' => 'Sample scope',
              ),
              array(
                'key' => 'field_l2_co_duration',
                'label' => 'Parametr: Czas Trwania (Duration)',
                'name' => 'duration',
                'type' => 'text',
                'default_value' => 'Sample duration',
              ),
              array(
                'key' => 'field_l2_co_outcome',
                'label' => 'Parametr: Osiągnięty Wynik (Outcome)',
                'name' => 'outcome',
                'type' => 'text',
                'default_value' => 'Sample outcome',
              ),
              array(
                'key' => 'field_l2_co_quote',
                'label' => 'Cytat Klienta',
                'name' => 'quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => '"[Sample quote. Replace with a real, attributed client quote before publishing.]"',
              ),
              array(
                'key' => 'field_l2_co_quote_author',
                'label' => 'Podpis Cytatu (Attribution)',
                'name' => 'quote_author',
                'type' => 'text',
                'default_value' => '[ATTRIBUTION]',
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: SPECIALISTS (Theme=dark)
          // -----------------------------------------------------------------
          'layout_l2_specialists' => array(
            'key' => 'layout_l2_specialists',
            'name' => 'specialists',
            'label' => 'Specialists (Dedykowani Eksperci - Wariant Ciemny)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_spec_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'NAMED SPECIALISTS',
              ),
              array(
                'key' => 'field_l2_spec_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'The person you call is the person who does the work',
              ),
              array(
                'key' => 'field_l2_spec_subtitle',
                'label' => 'Podtytuł Sekcji',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Each standard has a named senior specialist. No rotation, no handoffs, no anonymous assessors — and the specialist you need depends on your environment.',
              ),
              array(
                'key' => 'field_l2_spec_theme',
                'label' => 'Wariant Stylistyczny (Motyw)',
                'name' => 'theme',
                'type' => 'select',
                'choices' => array(
                  'dark' => 'Ciemny motyw (Dark Background)',
                  'light' => 'Jasny motyw (Light Background)',
                ),
                'default_value' => 'dark',
              ),
              array(
                'key' => 'field_l2_spec_members',
                'label' => 'Eksperci (Repeater)',
                'name' => 'members',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj eksperta',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_spec_member_name',
                    'label' => 'Imię i Nazwisko / Inicjał',
                    'name' => 'name',
                    'type' => 'text',
                    'default_value' => 'Anna K.',
                  ),
                  array(
                    'key' => 'field_l2_spec_member_role',
                    'label' => 'Rola i Akredytacje',
                    'name' => 'role_credentials',
                    'type' => 'text',
                    'default_value' => 'LEAD QSA • P2PE',
                  ),
                  array(
                    'key' => 'field_l2_spec_member_spec',
                    'label' => 'Specjalizacja Główna',
                    'name' => 'specialization',
                    'type' => 'text',
                    'default_value' => 'Point-to-point encryption solutions',
                  ),
                  array(
                    'key' => 'field_l2_spec_member_bio',
                    'label' => 'Krótki Biogram',
                    'name' => 'bio',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'P2PE is the fastest way to reduce your PCI scope — but only if the solution is assessed end-to-end. I lead every P2PE engagement from solution review to validation.',
                  ),
                  array(
                    'key' => 'field_l2_spec_member_photo',
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
          // LAYOUT: CASE_STUDIES
          // -----------------------------------------------------------------
          'layout_l2_case_studies' => array(
            'key' => 'layout_l2_case_studies',
            'name' => 'case_studies',
            'label' => 'Case Studies (Studia Przypadków)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_cs_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'CASE STUDIES',
              ),
              array(
                'key' => 'field_l2_cs_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Case studies heading]',
              ),
              array(
                'key' => 'field_l2_cs_desc',
                'label' => 'Opis Wprowadzający',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '[Placeholder intro. Introduce the case studies and note any confidentiality constraints. Replace before publishing.]',
              ),
              array(
                'key' => 'field_l2_cs_items',
                'label' => 'Karty Case Studies (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj case study',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_cs_item_persona',
                    'label' => 'Persona / Sektor (Badge)',
                    'name' => 'persona_badge',
                    'type' => 'text',
                    'default_value' => '[Client persona one]',
                  ),
                  array(
                    'key' => 'field_l2_cs_item_situation',
                    'label' => 'Sytuacja Wyjściowa (Situation)',
                    'name' => 'situation',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => '[Placeholder situation. Describe the challenge this client faced.]',
                  ),
                  array(
                    'key' => 'field_l2_cs_item_outcome',
                    'label' => 'Osiągnięty Wynik (Outcome)',
                    'name' => 'outcome',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => '[Placeholder outcome. Describe the result delivered.]',
                  ),
                  array(
                    'key' => 'field_l2_cs_item_metric',
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
          'layout_l2_faq' => array(
            'key' => 'layout_l2_faq',
            'name' => 'faq',
            'label' => 'FAQ (Często Zadawane Pytania)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_faq_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'QUESTIONS',
              ),
              array(
                'key' => 'field_l2_faq_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[Frequently asked questions]',
              ),
              array(
                'key' => 'field_l2_faq_items',
                'label' => 'Pytania i Odpowiedzi (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj pytanie',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_faq_q',
                    'label' => 'Pytanie',
                    'name' => 'question',
                    'type' => 'text',
                    'default_value' => '[Question one?]',
                  ),
                  array(
                    'key' => 'field_l2_faq_a',
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
          'layout_l2_cta_section' => array(
            'key' => 'layout_l2_cta_section',
            'name' => 'cta_section',
            'label' => 'CTA & Formularz (Prezentacyjny)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_cta_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'START THE CONVERSATION',
              ),
              array(
                'key' => 'field_l2_cta_title',
                'label' => 'Tytuł Sekcji (H2)',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '[CTA heading]',
              ),
              array(
                'key' => 'field_l2_cta_subtitle',
                'label' => 'Podtytuł / Zachęta',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '[Placeholder CTA subtitle. Replace with the real call-to-action copy before publishing.]',
              ),
              array(
                'key' => 'field_l2_cta_shortcode',
                'label' => 'Shortcode Formularza (Opcjonalny)',
                'name' => 'form_shortcode',
                'type' => 'text',
                'instructions' => 'Wklej np. [contact-form-7 id="123"] lub pozostaw puste, aby renderować natywny semantyczny markup UI.',
                'default_value' => '',
              ),
              array(
                'key' => 'field_l2_cta_button_text',
                'label' => 'Napis na Przycisku',
                'name' => 'button_text',
                'type' => 'text',
                'default_value' => 'Talk to an assessor',
              ),
              array(
                'key' => 'field_l2_cta_tb1',
                'label' => 'Plakietka Zaufania 1',
                'name' => 'trust_badge_1',
                'type' => 'text',
                'default_value' => 'Free 30-min scoping call',
              ),
              array(
                'key' => 'field_l2_cta_tb2',
                'label' => 'Plakietka Zaufania 2',
                'name' => 'trust_badge_2',
                'type' => 'text',
                'default_value' => 'No obligation',
              ),
              array(
                'key' => 'field_l2_cta_tb3',
                'label' => 'Plakietka Zaufania 3',
                'name' => 'trust_badge_3',
                'type' => 'text',
                'default_value' => 'Senior assessor not sales',
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: RESOURCES (3 PDF Checklist Cards)
          // -----------------------------------------------------------------
          'layout_l2_resources' => array(
            'key' => 'layout_l2_resources',
            'name' => 'resources',
            'label' => 'Resources (Materiały Merytoryczne i Checklisty PDF)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_res_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'RESOURCES & GUIDES',
              ),
              array(
                'key' => 'field_l2_res_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Practical tools to accelerate your compliance',
              ),
              array(
                'key' => 'field_l2_res_subtitle',
                'label' => 'Podtytuł / Opis',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Download our battle-tested assessment templates and scoping guides.',
              ),
              array(
                'key' => 'field_l2_res_items',
                'label' => 'Karty Materiałów (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj materiał do pobrania',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_res_item_title',
                    'label' => 'Tytuł Dokumentu',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => 'PCI DSS v4.0.1 Transition Checklist',
                  ),
                  array(
                    'key' => 'field_l2_res_item_desc',
                    'label' => 'Opis Zawartości',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Complete step-by-step checklist of new requirements, transition deadlines, and evidence needed for RoC certification.',
                  ),
                  array(
                    'key' => 'field_l2_res_item_file',
                    'label' => 'Link do Pliku / URL pobrania',
                    'name' => 'file_url',
                    'type' => 'text',
                    'default_value' => '#',
                  ),
                  array(
                    'key' => 'field_l2_res_item_btn',
                    'label' => 'Tekst Przycisku',
                    'name' => 'button_text',
                    'type' => 'text',
                    'default_value' => 'Download PDF',
                  ),
                ),
              ),
            ),
          ),

          // -----------------------------------------------------------------
          // LAYOUT: RELATED_SERVICES (Theme=dark)
          // -----------------------------------------------------------------
          'layout_l2_related_services' => array(
            'key' => 'layout_l2_related_services',
            'name' => 'related_services',
            'label' => 'Related Services (Powiązane Usługi L2 - Wariant Ciemny)',
            'display' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_l2_rs_badge',
                'label' => 'Badge',
                'name' => 'badge',
                'type' => 'text',
                'default_value' => 'RELATED SERVICES',
              ),
              array(
                'key' => 'field_l2_rs_title',
                'label' => 'Tytuł Sekcji',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Other services you might be interested in',
              ),
              array(
                'key' => 'field_l2_rs_theme',
                'label' => 'Wariant Stylistyczny',
                'name' => 'theme',
                'type' => 'select',
                'choices' => array(
                  'dark' => 'Ciemne tło (Dark)',
                  'light' => 'Jasne tło (Light)',
                ),
                'default_value' => 'dark',
              ),
              array(
                'key' => 'field_l2_rs_items',
                'label' => 'Karty Powiązanych Usług (Repeater)',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Dodaj usługę',
                'sub_fields' => array(
                  array(
                    'key' => 'field_l2_rs_item_cat',
                    'label' => 'Kategoria w nawiasie (np. [CATEGORY])',
                    'name' => 'category',
                    'type' => 'text',
                    'default_value' => '[CATEGORY]',
                  ),
                  array(
                    'key' => 'field_l2_rs_item_title',
                    'label' => 'Tytuł Usługi',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => '[Related service one]',
                  ),
                  array(
                    'key' => 'field_l2_rs_item_desc',
                    'label' => 'Opis Powiązania',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => '[Placeholder blurb. Describe this related service and how it complements the current offering.]',
                  ),
                  array(
                    'key' => 'field_l2_rs_item_url',
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
          'value' => 'templates/template-l2-2026.php',
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
    'description' => 'Konfiguracja sekcji szablonu usługi L2 w architekturze 2026',
  ));
});
