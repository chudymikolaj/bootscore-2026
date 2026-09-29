<?php
function ContactFormShowcaseModule()
{
  $getContactFormModule = get_field('contact_form_module', 'option');

  $arrContactForm = array(
    'name' => $getContactFormModule['contact_form']['form_name'],
    'email' => $getContactFormModule['contact_form']['email']['name'],
    'email_placeholder' => $getContactFormModule['contact_form']['email']['placeholder'],
    'phone' => $getContactFormModule['contact_form']['phone_number']['name'],
    'phone_placeholder' => $getContactFormModule['contact_form']['phone_number']['placeholder'],
    'message' => $getContactFormModule['contact_form']['message']['name'],
    'message_placeholder' => $getContactFormModule['contact_form']['message']['placeholder'],
    'consent' => $getContactFormModule['contact_form']['consent_and_button']['consent_description'],
    'consent_button_name' => $getContactFormModule['contact_form']['consent_and_button']['button_name'],
  );
  ?>
  <div id="contact_form_free_consultation" class="ContactFormModule__container">
    <div class="container">
      <div class="ContactFormModule__container--wrapper">
        <div id="contact" class="ContactFormModule__container__box">
          <h6 class="ContactFormModule__container__box--heading">
            <?= $arrContactForm['name']; ?>
          </h6>

          <form id="contact-form" class="ContactFormModule__container__box--form">
            <div class="form__field">
              <label for="contact-form-email" class="form__label"><?= $arrContactForm['email']; ?></label>
              <input id="contact-form-email" name="contact-form-email" class="form__input" type="email"
                placeholder="<?= $arrContactForm['email_placeholder']; ?>"
                data-error-message="<?= pll__('To pole jest wymagane'); ?>">
            </div>
            <div class="form__field">
              <label for="contact-form-phone" class="form__label"><?= $arrContactForm['phone']; ?></label>
              <input id="contact-form-phone" name="contact-form-phone" class="form__input" type="tel"
                placeholder="<?= $arrContactForm['phone_placeholder']; ?>"
                data-error-message="<?= pll__('To pole jest wymagane'); ?>">
            </div>
            <div class="form__field">
              <label for="contact-form-message" class="form__label"><?= $arrContactForm['message']; ?></label>
              <textarea id="contact-form-message" name="contact-form-message" class="form__textarea"
                placeholder="<?= $arrContactForm['message_placeholder']; ?>"
                data-error-message="<?= pll__('To pole jest wymagane'); ?>"></textarea>
            </div>
            <div class="form__field">
              <label class="form__checkbox">
                <!-- <input class="form__checkbox--input" name="all-approval" id="all-approval" type="checkbox"> -->
                <p><?= $arrContactForm['consent']; ?></p>
              </label>
              <!-- <span class="form_approval__error"><?= pll__('Prosimy uzupełnić brakujące zgody'); ?></span> -->
            </div>
            <button class="btn form__button" type="submit">
              <?= $arrContactForm['consent_button_name']; ?>
            </button>
          </form>

          <div class="form__thank-you" style="display: none;">
            <?= pll__('Twoja wiadomość została wysłana'); ?>.
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
}

add_action('ContactFormShowcaseModule', 'ContactFormShowcaseModule', 10);