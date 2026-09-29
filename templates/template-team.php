<?php
/**
 * Template Name: Team Page
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main team-page" role="main">

    <?php
    if ( post_password_required() ) {
      echo '<div class="container py-5">' . get_the_password_form() . '</div>';
    } else {
      // Team Hero Section
      $hero_data = array(
        'category' => get_field('team_hero_category'),
        'title' => get_field('team_hero_title'),
        'description' => get_field('team_hero_description'),
        'locations' => get_field('team_hero_locations'),
      );
      do_action('TeamHero', $hero_data);

      // Team Grid Section
      $team_data = array(
        'ceo' => get_field('team_ceo'),
        'members' => get_field('team_members'),
      );
      do_action('TeamGrid', $team_data);

      // Stats Section
      $stats_data = array(
        'tag' => get_field('team_stats_tag'),
        'title' => get_field('team_stats_title'),
        'subtitle' => get_field('team_stats_subtitle'),
        'stats' => get_field('team_stats'),
      );
      do_action('TeamStats', $stats_data);

      // Accreditations
      $accreditations_data = array(
        'tag' => get_field('team_accreditations_tag'),
        'title' => get_field('team_accreditations_title'),
        'subtitle' => get_field('team_accreditations_subtitle'),
        'groups' => get_field('team_accreditations_groups'),
      );
      do_action('TeamAccreditations', $accreditations_data);

      // Recognition
      $recognition_data = array(
        'tag' => get_field('team_recognition_tag'),
        'title' => get_field('team_recognition_title'),
        'items' => get_field('team_recognition_items'),
      );
      do_action('TeamRecognition', $recognition_data);

      // Values
      $values_data = array(
        'tag' => get_field('team_values_tag'),
        'title' => get_field('team_values_title'),
        'items' => get_field('team_values_items'),
      );
      do_action('TeamValues', $values_data);

      // Team CTA Section
      $cta_data = array(
        'left' => get_field('team_cta_left'),
        'right' => get_field('team_cta_right'),
      );
      do_action('TeamCTA', $cta_data);
    }

    ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>