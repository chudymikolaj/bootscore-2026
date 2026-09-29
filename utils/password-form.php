<?php
/**
 * Custom Password Protected Form styling.
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Customize the password protected form to use Bootstrap 5 styling matching the child theme.
 */
add_filter('the_password_form', 'custom_bootstrap_password_form', 20);
function custom_bootstrap_password_form() {
  global $post;
  $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
  
  $text_title     = function_exists('pll__') ? pll__('password_title') : 'Strona zabezpieczona';
  $text_protected = function_exists('pll__') ? pll__('password_protected_text') : 'Ta treść jest zabezpieczona hasłem. Aby ją zobaczyć, wprowadź hasło poniżej:';
  $text_password  = function_exists('pll__') ? pll__('password_label') : 'Hasło:';
  $text_submit    = function_exists('pll__') ? pll__('password_submit') : 'Wyślij';

  // Fallback to defaults if translation doesn't return value or key name is returned literally
  if ($text_title === 'password_title') $text_title = 'Strona zabezpieczona';
  if ($text_protected === 'password_protected_text') $text_protected = 'Ta treść jest zabezpieczona hasłem. Aby ją zobaczyć, wprowadź hasło poniżej:';
  if ($text_password === 'password_label') $text_password = 'Hasło:';
  if ($text_submit === 'password_submit') $text_submit = 'Wyślij';

  $o = '
  <style>
    .custom-pw-card {
      border-radius: 20px !important;
      border: 1px solid #D6DDED !important;
      box-shadow: 0 15px 45px rgba(42, 50, 127, 0.05) !important;
      background: #FFFFFF !important;
      padding: 3.5rem 2.5rem !important;
      text-align: center;
    }
    .custom-pw-icon-wrapper {
      width: 76px;
      height: 76px;
      background: rgba(42, 50, 127, 0.07);
      color: #2A327F;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.5rem;
    }
    .custom-pw-title {
      color: #2A327F !important;
      font-weight: 800 !important;
      font-size: 1.75rem !important;
      margin-bottom: 0.75rem !important;
    }
    .custom-pw-text {
      color: #232428 !important;
      font-weight: 400;
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 2rem !important;
      max-width: 380px;
      margin-left: auto;
      margin-right: auto;
    }
    .custom-pw-form-group {
      max-width: 360px;
      margin: 0 auto;
    }
    .custom-pw-input {
      border-radius: 8px 0 0 8px !important;
      border: 1px solid #D6DDED !important;
      border-right: none !important;
      padding: 0.75rem 1.25rem !important;
      font-size: 1rem !important;
      color: #232428 !important;
      background-color: #FAFBFD !important;
      transition: all 0.2s ease-in-out !important;
    }
    .custom-pw-input:focus {
      border-color: #2A327F !important;
      box-shadow: 0 0 0 3px rgba(42, 50, 127, 0.15) !important;
      outline: none !important;
    }
    .custom-pw-btn {
      background-color: #C0D349 !important;
      color: #2A327F !important;
      border: 1px solid #C0D349 !important;
      border-radius: 0 8px 8px 0 !important;
      padding: 0.75rem 1.75rem !important;
      font-weight: 700 !important;
      font-size: 1rem !important;
      transition: all 0.2s ease !important;
    }
    .custom-pw-btn:hover {
      background-color: #afc03f !important;
      border-color: #afc03f !important;
      color: #2A327F !important;
    }
  </style>

  <div class="row justify-content-center my-5 py-5">
    <div class="col-md-7 col-lg-6">
      <div class="card custom-pw-card">
        <div class="card-body p-0">
          <div class="custom-pw-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
            </svg>
          </div>
          <h3 class="custom-pw-title">' . esc_html($text_title) . '</h3>
          <p class="custom-pw-text">' . esc_html($text_protected) . '</p>
          <form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
            <div class="input-group custom-pw-form-group">
              <input name="post_password" id="' . $label . '" type="password" class="form-control custom-pw-input" placeholder="' . esc_attr($text_password) . '" aria-label="' . esc_attr($text_password) . '" required />
              <button class="btn custom-pw-btn" type="submit" name="Submit">' . esc_html($text_submit) . '</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>';
  return $o;
}
