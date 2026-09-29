<?php
/**
 * @package Bootscore Child
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

/**
 * Define constants
 */
if (!defined('JS_DIR_URI')) {
  define('JS_DIR_URI', get_stylesheet_directory_uri() . '/assets/js/');
}

/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{
  // Enqueue compiled main.css with file modification time for cache busting
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // Enqueue swiper.css
  wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/assets/css/swiper.css', array(), '11.2.0', 'all');

  // Enqueue parent theme style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Enqueue custom.js with file modification time for cache busting
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), $modificated_CustomJS, true);

  // Enqueue swiper.js
  wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/assets/js/swiper.js', array(), '11.2.0', true);

  // Enqueue frontend-ajax.js only if file exists (avoid 404)
  if (file_exists(get_stylesheet_directory() . '/assets/js/frontend-ajax.js')) {
    wp_enqueue_script('frontend-ajax', JS_DIR_URI . 'frontend-ajax.js', array('jquery'), null, true);
    wp_localize_script('frontend-ajax', 'localData', array(
      'ajaxURL' => admin_url('admin-ajax.php'),
    ));
  }

  // Theme 2026 Assets (conditional for 2026 page templates)
  if (is_page_template(array('templates/template-home-2026.php', 'templates/template-l1-2026.php', 'templates/template-l2-2026.php'))) {
    // Instrument Sans 1:1 Figma Foundations 66:415 (400/500/600/700 + italics)
    wp_enqueue_style(
      'instrument-sans',
      'https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap',
      array(),
      null
    );

    $theme_2026_css_file = get_stylesheet_directory() . '/assets/css/theme-2026.css';
    $theme_2026_css_ver  = file_exists($theme_2026_css_file) ? (string) filemtime($theme_2026_css_file) : '1.0.0';
    wp_enqueue_style('theme-2026', get_stylesheet_directory_uri() . '/assets/css/theme-2026.css', array('main', 'instrument-sans'), $theme_2026_css_ver);

    $theme_2026_js_file = get_stylesheet_directory() . '/assets/js/theme-2026.esm.js';
    $theme_2026_js_ver  = file_exists($theme_2026_js_file) ? date('YmdHi', filemtime($theme_2026_js_file)) : '1.0.0';
    wp_enqueue_script('theme-2026-esm', get_stylesheet_directory_uri() . '/assets/js/theme-2026.esm.js', array(), $theme_2026_js_ver, true);
  }
}

/**
 * Add type="module" to theme-2026-esm script tag
 */
add_filter('script_loader_tag', 'bootscore_child_theme_2026_module_tag', 10, 3);
function bootscore_child_theme_2026_module_tag($tag, $handle, $src)
{
  if ('theme-2026-esm' === $handle) {
    return '<script type="module" src="' . esc_url($src) . '" id="' . esc_attr($handle) . '-js"></script>' . "\n";
  }
  return $tag;
}


/** ---------------------------------------------------------------------------------------------
 * Register custom Gutenberg blocks
 * --------------------------------------------------------------------------------------------- */
add_action('init', 'register_custom_blocks');
function register_custom_blocks()
{
  register_block_type(__DIR__ . '/blocks/wysiwyg');
}

/** ---------------------------------------------------------------------------------------------
 * Register custom Gutenberg blocks' styles
 * --------------------------------------------------------------------------------------------- */
add_action('enqueue_block_editor_assets', 'register_custom_blocks_styles');
add_action('wp_enqueue_scripts', 'register_custom_blocks_styles');
function register_custom_blocks_styles()
{
  wp_register_style('block-wysiwyg', get_stylesheet_directory_uri() . '/blocks/wysiwyg/css/wysiwyg.min.css', [], '1.0.0');
}

add_action('admin_init', function () {
  // Redirect any user trying to access comments page
  global $pagenow;

  if ($pagenow === 'edit-comments.php') {
    wp_safe_redirect(admin_url());
    exit;
  }

  // Remove comments metabox from dashboard
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

  // Disable support for comments and trackbacks in post types
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
  if (is_admin_bar_showing()) {
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
});

/**
 * Date
 */
if (!function_exists('bootscore_date')):

  /**
   * Prints HTML with meta information for the current post-date/time.
   */
  function bootscore_date()
  {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    // Check if modified time is different from the published time
    if (get_the_time('U') !== get_the_modified_time('U')) {
      $show_updated_time = apply_filters('bootscore/meta/time/updated', true);

      // If filter returns false, don't display modified time
      if (!$show_updated_time) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
      } else {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time></time>';
      }
    }

    $time_string = sprintf(
      $time_string,
      esc_attr(get_the_date(DATE_W3C)),
      esc_html(get_the_date("d.m.Y"))
    );

    $posted_on = sprintf(
      /* translators: %s: post date. */
      '%s',
      '<span rel="bookmark">' . $time_string . '</span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

  }
endif;

/**
 * Category Badge
 */
if (!function_exists('bootscore_category_badge')):
  function bootscore_category_badge()
  {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
      echo '<p class="category-badge">';
      $thelist = '';
      $i = 0;
      foreach (get_the_category() as $category) {
        if (0 < $i)
          $thelist .= ' ';
        // Apply a filter to modify the class name
        $class = apply_filters('bootscore/class/badge/category', 'badge');
        $thelist .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="' . esc_attr($class) . '">' . $category->name . '</a>';
        $i++;
      }
      echo $thelist;
      echo '</p>';
    }
  }
endif;
function filter_search_by_language_without_pl($query)
{
  // Ensure we're modifying the search query on the front-end and it's the main query
  if (!is_admin() && $query->is_search() && $query->is_main_query()) {
    // Get the current language from the URL (assuming the language prefix is at the start of the URL)
    $uri = $_SERVER['REQUEST_URI']; // Get the current URL
    $language_code = '';

    // Extract language from the URL (assuming the language is at the start of the URL, like /en/ or /fr/)
    if (preg_match('#^/([a-zA-Z]{2})/#', $uri, $matches)) {
      $language_code = $matches[43]; // Extracted language code, e.g., 'en', 'fr'
    }

    // If a language is found in the URL, set the language filter (you can adjust this based on your needs)
    if (!empty($language_code)) {
      $query->set('lang', $language_code); // Apply the language filter to the search
    }

    // Restrict the search results to only posts
    $query->set('post_type', 'post');
  }
}
add_action('pre_get_posts', 'filter_search_by_language_without_pl');

add_action('init', 'register_string_to_translate', 25);
function register_string_to_translate()
{
  pll_register_string('next', 'Następny');
  pll_register_string('previous', 'Poprzedni');
  pll_register_string('all_posts', 'Wróć do wszystkich wpisów');
  pll_register_string('your_message_has_been_sent', 'Twoja wiadomość została wysłana');
  pll_register_string('read_more', 'Czytaj dalej →');
  pll_register_string('all_category', 'Wszystko');
  pll_register_string('search_category', 'Szukaj');
  pll_register_string('field_required', 'To pole jest wymagane');
  pll_register_string('form_approval', 'Prosimy uzupełnić brakujące zgody');
}

if (!function_exists('redirect_404_to_homepage')) {

  add_action('template_redirect', 'redirect_404_to_homepage');

  function redirect_404_to_homepage()
  {
    if (is_404()):
      wp_safe_redirect(home_url('/'));
      exit;
    endif;
  }
}

/**
 * Import utility files
 */
@include_once 'utils/acf_option_pages.php';
@include_once 'utils/acf-team.php';
@include_once 'utils/icons.php';
@include_once 'utils/functions_for_forms.php';
@include_once 'utils/password-form.php';
@include_once 'utils/theme-2026-adapter.php';

/**
 * Import components
 */
@include_once 'components/ShowcaseIntroSection/showcaseIntroSection.php';
@include_once 'components/ShowcaseNewsletterSection/showcaseNewsletterSection.php';
@include_once 'components/BenefitsElementInWhiteSquare/benefitsElementInWhiteSquare.php';
@include_once 'components/HowCanWeHelpTilesButton/howCanWeHelpTilesButton.php';
@include_once 'components/WhyUsSection/whyUsSection.php';
@include_once 'components/OurOfferTiles/ourOfferTiles.php';
@include_once 'components/HowCanWeHelpText/howCanWeHelpText.php';
@include_once 'components/HowWillWeWorkWithYou/howWillWeWorkWithYou.php';
@include_once 'components/OurValues/ourValues.php';
@include_once 'components/GlobalExperience/globalExperience.php';
@include_once 'components/CertificationAudit/certificationAudit.php';
@include_once 'components/SectionNewsletterBanner/sectionNewsletterBanner.php';
@include_once 'components/SectionNewsletterOurCompetencesLogotypeWall/sectionNewsletterOurCompetencesLogotypeWall.php';
@include_once 'components/SectionFaq/sectionFaq.php';
@include_once 'components/ModulesElement/modulesElement.php';


// Team Page Components
@include_once 'components/TeamHero/teamHero.php';
@include_once 'components/TeamGrid/teamGrid.php';
@include_once 'components/TeamStats/teamStats.php';
@include_once 'components/TeamAccreditations/teamAccreditations.php';
@include_once 'components/TeamRecognition/teamRecognition.php';
@include_once 'components/TeamValues/teamValues.php';
@include_once 'components/TeamCTA/teamCTA.php';


/**
 * Import modules
 */
@include_once 'components/modules/StatisticsNumbersModule/statisticsNumbersModule.php';
@include_once 'components/modules/OpinionCarouselModule/opinionCarouselModule.php';
@include_once 'components/modules/FreeConsultationModule/freeConsultationModule.php';
@include_once 'components/modules/OurCompetencesLogotypeWall/ourCompetencesLogotypeWall.php';
@include_once 'components/modules/ContactFormModule/contactFormModule.php';
@include_once 'components/modules/ContactFormShowcaseModule/contactFormShowcaseModule.php';

/**
 * Import Theme 2026 ACF & Components Loader
 */
@include_once 'utils/acf-home-2026.php';
@include_once 'utils/acf-l1-2026.php';
@include_once 'utils/acf-l2-2026.php';
@include_once 'components/theme-2026/theme-2026-init.php';


