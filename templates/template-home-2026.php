<?php
/**
 * Template Name: Nowa Strona Główna (2026)
 *
 * @package Bootscore Child
 * @version 1.0.0 (2026)
 */

defined('ABSPATH') || exit;

get_header(); ?>

<?php do_action('Theme2026_Navbar', array()); ?>

<div id="primary" class="content-area theme-2026-page theme-2026-home">
  <main id="main" class="site-main" role="main">

    <?php
    if (post_password_required()) {
      echo '<div class="container py-5">' . get_the_password_form() . '</div>';
    } else {
      if (have_rows('sections')) :
        while (have_rows('sections')) : the_row();
          $layout = get_row_layout();
          $data   = get_row(true);
          // 1:1 Figma adapter: ACF keys -> component keys (HOME 132:1005)
          if (function_exists('t26_normalize_section_data')) {
            $data = t26_normalize_section_data($layout, $data);
          }

          switch ($layout) {
            case 'hero':
              $url_variant = '';
              if (isset($_GET['variant'])) {
                $url_variant = 'variant_' . sanitize_text_field($_GET['variant']);
              } elseif (isset($_GET['hero_variant'])) {
                $url_variant = sanitize_text_field($_GET['hero_variant']);
              }
              if (!empty($url_variant)) {
                $data['hero_variant'] = $url_variant;
              }
              do_action('Theme2026_Hero', $data);
              if (empty($data['hero_variant']) || $data['hero_variant'] !== 'variant_2') {
                do_action('Theme2026_StatsBar', $data);
              }
              break;
            case 'stats_bar':
              do_action('Theme2026_StatsBar', $data);
              break;
            case 'starting_point':
              do_action('Home2026_StartingPoint', $data);
              break;
            case 'services_grid':
              do_action('Home2026_ServicesGrid', $data);
              break;
            case 'proof_points':
              do_action('Home2026_ProofPoints', $data);
              break;
            case 'credentials_wall':
              do_action('Home2026_CredentialsWall', $data);
              break;
            case 'testimonials':
              do_action('Theme2026_Testimonials', $data);
              break;
            case 'case_studies':
              do_action('Theme2026_CaseStudies', $data);
              break;
            case 'faq':
              do_action('Theme2026_Faq', $data);
              break;
            case 'cta_section':
              do_action('Theme2026_CtaSection', $data);
              break;
          }
        endwhile;
      else :
        // Zero-config fallback z Figmy HOME
        $url_variant = '';
        if (isset($_GET['variant'])) {
          $url_variant = 'variant_' . sanitize_text_field($_GET['variant']);
        } elseif (isset($_GET['hero_variant'])) {
          $url_variant = sanitize_text_field($_GET['hero_variant']);
        }
        $hero_variant = !empty($url_variant) ? $url_variant : 'variant_1';

        do_action('Theme2026_Hero', array(
          'background_type' => 'photo-overlay',
          'hero_variant'    => $hero_variant,
        ));
        if ($hero_variant !== 'variant_2') {
          do_action('Theme2026_StatsBar', array());
        }
        do_action('Home2026_StartingPoint', array());
        do_action('Home2026_ServicesGrid', array());
        do_action('Home2026_ProofPoints', array());
        do_action('Home2026_CredentialsWall', array());
        do_action('Theme2026_Testimonials', array('theme' => 'dark'));
        do_action('Theme2026_CaseStudies', array());
        do_action('Theme2026_Faq', array('theme' => 'light'));
        do_action('Theme2026_CtaSection', array());
      endif;
    }
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php do_action('Theme2026_Footer', array()); ?>

<?php get_footer(); ?>
