<?php
/**
 * Template Name: Nowy Szablon Usług L2 (2026)
 *
 * @package Bootscore Child
 * @version 1.0.0 (2026)
 */

defined('ABSPATH') || exit;

get_header(); ?>

<?php do_action('Theme2026_Navbar', array()); ?>

<div id="primary" class="content-area theme-2026-page theme-2026-l2">
  <main id="main" class="site-main" role="main">

    <?php
    $stats_bar_rendered = false;
    if (post_password_required()) {
      echo '<div class="container py-5">' . get_the_password_form() . '</div>';
    } else {
      if (have_rows('sections')) :
        while (have_rows('sections')) : the_row();
          $layout = get_row_layout();
          $data   = get_row(true);
          // 1:1 Figma adapter: ACF keys -> component keys (L2 132:1032)
          if (function_exists('t26_normalize_section_data')) {
            $data = t26_normalize_section_data($layout, $data);
          }

          switch ($layout) {
            case 'hero':
              do_action('Theme2026_Hero', $data);
              if (!$stats_bar_rendered) {
                do_action('Theme2026_StatsBar', $data);
                $stats_bar_rendered = true;
              }
              break;
            case 'stats_bar':
              if (!$stats_bar_rendered) {
                do_action('Theme2026_StatsBar', $data);
                $stats_bar_rendered = true;
              }
              break;
            case 'who_service_is_for':
              do_action('L2_2026_WhoServiceIsFor', $data);
              break;
            case 'overview':
              do_action('L2_2026_Overview', $data);
              break;
            case 'process':
              do_action('L2_2026_Process', $data);
              break;
            case 'case_outcomes':
              do_action('L2_2026_CaseOutcomes', $data);
              break;
            case 'specialists':
              $data = is_array($data) ? $data : array();
              if (empty($data['theme'])) {
                $data['theme'] = 'dark';
              }
              do_action('Theme2026_Specialists', $data);
              break;
            case 'case_studies':
              $data = is_array($data) ? $data : array();
              if (empty($data['theme'])) {
                $data['theme'] = 'dark';
              }
              if (empty($data['items'])) {
                $data['items'] = array(
                  array(
                    'badge'     => '[Client persona one]',
                    'title'     => 'PCI-DSS v4 Scope Reduction',
                    'situation' => '[Placeholder situation. Describe the challenge this client faced.]',
                    'outcome'   => '[Placeholder outcome. Describe the result delivered.]',
                    'metric'    => '[Metric]',
                    'icon'      => 'shield-check',
                  ),
                );
              }
              do_action('Theme2026_CaseStudies', $data);
              break;
            case 'faq':
              $data = is_array($data) ? $data : array();
              if (empty($data['theme'])) {
                $data['theme'] = 'light';
              }
              do_action('Theme2026_Faq', $data);
              break;
            case 'cta_section':
              do_action('Theme2026_CtaSection', $data);
              break;
            case 'resources':
              do_action('L2_2026_Resources', $data);
              break;
            case 'related_services':
              $data = is_array($data) ? $data : array();
              if (empty($data['theme'])) {
                $data['theme'] = 'dark';
              }
              do_action('Theme2026_RelatedServices', $data);
              break;
          }
        endwhile;
      else :
        // Zero-config fallback z Figmy L2 132:1032
        do_action('Theme2026_Hero', array('background_type' => 'photo-overlay'));
        do_action('Theme2026_StatsBar', array());
        do_action('L2_2026_WhoServiceIsFor', array());
        do_action('L2_2026_Overview', array());
        do_action('L2_2026_Process', array());
        do_action('L2_2026_CaseOutcomes', array());
        do_action('Theme2026_Specialists', array('theme' => 'dark'));
        do_action('Theme2026_CaseStudies', array(
          'theme' => 'dark',
          'items' => array(
            array(
              'badge'     => '[Client persona one]',
              'title'     => 'PCI-DSS v4 Scope Reduction',
              'situation' => '[Placeholder situation. Describe the challenge this client faced.]',
              'outcome'   => '[Placeholder outcome. Describe the result delivered.]',
              'metric'    => '[Metric]',
              'icon'      => 'shield-check',
            ),
          ),
        ));
        do_action('Theme2026_Faq', array('theme' => 'light'));
        do_action('Theme2026_CtaSection', array());
        do_action('L2_2026_Resources', array());
        do_action('Theme2026_RelatedServices', array('theme' => 'dark'));
      endif;
    }
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php do_action('Theme2026_Footer', array()); ?>

<?php get_footer(); ?>
