<?php
function ContactFormModule()
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

  $arrContact = array(
    'qrCode' => $getContactFormModule['contact_details']['add_qr_code'],
    'instruction' => $getContactFormModule['contact_details']['instruction'],
    'addContact' => $getContactFormModule['contact_details']['contact_details']['add_contact'],
    'companyName' => $getContactFormModule['contact_details']['contact_details']['company_name'],
    'companyAdress' => $getContactFormModule['contact_details']['contact_details']['company_address'],
    'companyKrsRegonNip' => $getContactFormModule['contact_details']['contact_details']['krs_regon_nip'],
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

        <div class="ContactFormModule__container__contact">
          <?= wp_get_attachment_image($arrContact['qrCode'], 'full', false, array('class' => 'ContactFormModule__container__contact--qrCode')); ?>
          <p class="ContactFormModule__container__contact--instruction"><?= $arrContact['instruction']; ?></p>

          <ul class="ContactFormModule__container__contact--list">
            <?php foreach ($arrContact['addContact'] as $contact): ?>
              <li class="ContactFormModule__container__contact--list-item">
                <a href="<?= $contact['link_at_click_of_mouse']; ?>">
                  <div class="ContactFormModule__container__contact--list-item-icon">
                    <?= wp_get_attachment_image($contact['icon'], 'full'); ?>
                  </div>
                  <?= $contact['contact_content']; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>

          <div class="ContactFormModule__container__contact--company">
            <p class="ContactFormModule__container__contact--company-name"><?= $arrContact['companyName']; ?></p>
            <p class="ContactFormModule__container__contact--company-adress"><?= $arrContact['companyAdress']; ?></p>
            <p class="ContactFormModule__container__contact--company-other"><?= $arrContact['companyKrsRegonNip']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
}

add_action('ContactFormModule', 'ContactFormModule', 10);