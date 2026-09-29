<?php
/*
Template Name: Patronusec Template Newsletter
*/

get_header(); ?>
<?php
if ( ! post_password_required() ) {
  $getNewsletterScript = get_field('newsletter_script');

  if (!empty($getNewsletterScript)) {
    echo $getNewsletterScript;
  }
}
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php
    if ( post_password_required() ) {
      echo '<div class="container py-5">' . get_the_password_form() . '</div>';
    } else {
      if (have_rows('builder')): ?>
        <?php while (have_rows('builder')):
          the_row(); ?>

          <?php if (get_row_layout() == 'showcase_intro_section'):
            $arrShowcase = array(
              'header' => get_sub_field('header'),
              'background' => get_sub_field('background'),
              'descriptionBelow' => get_sub_field('description_continued_below'),
            );

            do_action("ShowcaseIntroSection", $arrShowcase); ?>

          <?php elseif (get_row_layout() == 'showcase_newsletter_section'):
            $arrShowcaseNewsletter = array(
              'header' => get_sub_field('header'),
              'background' => get_sub_field('background'),
              'descriptionBelow' => get_sub_field('description_continued_below'),
              'data-form' => get_field('newsletter_id_form'),
            );

            do_action("ShowcaseNewsletterSection", $arrShowcaseNewsletter); ?>

          <?php elseif (get_row_layout() == 'benefits_element_in_white_square'):
            $arrBenefitsElementInWhiteSquare = array(
              'header' => get_sub_field('header'),
              'description' => get_sub_field('description'),
            );

            do_action("BenefitsElementInWhiteSquare", $arrBenefitsElementInWhiteSquare); ?>

          <?php elseif (get_row_layout() == 'how_can_we_help_tiles_button'):
            $arrHowCanWeHelpTilesButton = array(
              'header' => get_sub_field('section_title'),
              'tiles' => get_sub_field('tiles'),
              'button' => get_sub_field('button_cta')
            );

            do_action("HowCanWeHelpTilesButton", $arrHowCanWeHelpTilesButton); ?>

          <?php elseif (get_row_layout() == 'our_offer_tiles'):
            $arrOurOfferTiles = array(
              'header' => get_sub_field('section_title'),
              'tiles' => get_sub_field('tiles')
            );

            do_action("OurOfferTiles", $arrOurOfferTiles); ?>

          <?php elseif (get_row_layout() == 'why_us_section'):
            $arrWhyUsAcf = array(
              'header' => get_sub_field('header'),
              'tiles' => get_sub_field('tiles'),
            );

            do_action("WhyUsSection", $arrWhyUsAcf); ?>

          <?php elseif (get_row_layout() == 'how_can_we_help_text'):
            $arrHowCanWeHelpText = array(
              'title' => get_sub_field('title'),
              'description' => get_sub_field('description'),
              'button' => get_sub_field('button'),
            );

            do_action("HowCanWeHelpText", $arrHowCanWeHelpText); ?>

          <?php elseif (get_row_layout() == 'how_will_we_work_with_you'):
            $arrHowWillWeWorkWithYou = array(
              'title' => get_sub_field('title'),
              'stageColor' => get_sub_field('stage_color'),
              'steps' => get_sub_field('steps'),
            );

            do_action("HowWillWeWorkWithYou", $arrHowWillWeWorkWithYou); ?>

          <?php elseif (get_row_layout() == 'certification_audit'):
            $arrCertificationAudit = array(
              'header' => get_sub_field('header'),
              'auditSteps' => get_sub_field('audit_steps'),
              'auditFinalDescription' => get_sub_field('audit_final_description'),
            );

            do_action("CertificationAudit", $arrCertificationAudit); ?>

          <?php elseif (get_row_layout() == 'our_values'):
            $arrOurValues = array(
              'title' => get_sub_field('title'),
              'values' => get_sub_field('values'),
              'button' => get_sub_field('button'),
            );

            do_action("OurValues", $arrOurValues); ?>

          <?php elseif (get_row_layout() == 'section_newsletter_banner'):
            $arrNewsletterBanner = array(
              'title' => get_sub_field('title'),
              'background' => get_sub_field('background'),
              'data-form' => get_field('newsletter_id_form'),
            );

            do_action("SectionNewsletterBanner", $arrNewsletterBanner); ?>

          <?php elseif (get_row_layout() == 'newsletter_our_competences_logotype_wall'):
            $arrNewsletterLogotypeWall = array(
              'group' => get_sub_field('group'),
            );

            do_action("SectionNewsletterOurCompetencesLogotypeWall", $arrNewsletterLogotypeWall); ?>

          <?php elseif (get_row_layout() == 'global_experience'):
            $arrGlobalExperience = array(
              'title' => get_sub_field('title'),
              'facts' => get_sub_field('facts'),
              'statistics' => get_sub_field('statistics'),
              'map' => get_sub_field('map'),
            );

            do_action("GlobalExperience", $arrGlobalExperience); ?>

          <?php elseif (get_row_layout() == 'select_from_ready_modules'):
            $getSelectModule = get_sub_field('select_module');

            do_action("ModulesElement", $getSelectModule); ?>
          <?php endif; ?>

        <?php endwhile; ?>
      <?php endif;
    }
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>