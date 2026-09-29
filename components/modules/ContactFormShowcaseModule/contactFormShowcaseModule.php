<?php
function ContactFormShowcaseModule()
{
  $getContactFormModule = get_field('contact_form_module', 'option');

  $arrContactForm = array(
    'name_consultation' => $getContactFormModule['contact_form_free_consultation']['form_name'],
    'email_placeholder' => $getContactFormModule['contact_form_free_consultation']['email']['placeholder'],
    'phone_placeholder' => $getContactFormModule['contact_form_free_consultation']['phone_number']['placeholder'],
    'message_placeholder' => $getContactFormModule['contact_form_free_consultation']['message']['placeholder'],
    'consent' => $getContactFormModule['contact_form_free_consultation']['consent_and_button']['consent_description'],
    'button_name_consultation' => $getContactFormModule['contact_form_free_consultation']['consent_and_button']['button_name'],
  );
  ?>
  <div id="contact_form_free_consultation" class="ContactFormModule__container ContactFormShowcaseModule">
    <div id="contact" class="ContactFormModule__container__box">
      <h6 class="ContactFormModule__container__box--heading">
        <?= $arrContactForm['name_consultation']; ?>
      </h6>

      <form id="contact-form" class="ContactFormModule__container__box--form">
        <div class="form__field">
          <input id="contact-form-email" name="contact-form-email" class="form__input" type="email"
            placeholder="<?= $arrContactForm['email_placeholder']; ?>"
            data-error-message="<?= pll__('To pole jest wymagane'); ?>">
        </div>
        <div class="form__field">
          <input id="contact-form-phone" name="contact-form-phone" class="form__input" type="tel"
            placeholder="<?= $arrContactForm['phone_placeholder']; ?>"
            data-error-message="<?= pll__('To pole jest wymagane'); ?>">
        </div>
        <div class="form__field">
          <textarea id="contact-form-message" name="contact-form-message" class="form__textarea"
            placeholder="<?= $arrContactForm['message_placeholder']; ?>"
            data-error-message="<?= pll__('To pole jest wymagane'); ?>" rows="1"></textarea>
        </div>
        <div class="form__field">
          <label class="form__checkbox">
            <p><?= $arrContactForm['consent']; ?></p>
          </label>
        </div>
        <button class="btn form__button" type="submit">
          <?= $arrContactForm['button_name_consultation']; ?>
        </button>
      </form>

      <div class="form__thank-you" style="display: none;">
        <?= pll__('Twoja wiadomość została wysłana'); ?>.
      </div>
    </div>
  </div>

  <?php
}

add_action('ContactFormShowcaseModule', 'ContactFormShowcaseModule', 10);