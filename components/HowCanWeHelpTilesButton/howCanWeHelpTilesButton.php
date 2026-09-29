<?php


function HowCanWeHelpTilesButton($arrHowCanWeHelpTilesButton)
{
  $header = $arrHowCanWeHelpTilesButton['header'];
  $tiles = $arrHowCanWeHelpTilesButton['tiles'];
  $button = $arrHowCanWeHelpTilesButton['button'];

  ?>
  <div class="HowCanWeHelpTilesButton__container">
    <div class="container">
      <h2 class="HowCanWeHelpTilesButton__container__title"><?= $header; ?></h2>
      <div class="HowCanWeHelpTilesButton__container__tiles">
        <?php foreach ($tiles as $tile): ?>
          <div class="HowCanWeHelpTilesButton__container__tile">
            <?= wp_get_attachment_image($tile['image'], 'full', false, array('class' => 'HowCanWeHelpTilesButton__container__tile--image')); ?>
            <div class="HowCanWeHelpTilesButton__container__tile--content">
              <h3 class="HowCanWeHelpTilesButton__container__tile--title"><?= $tile['title']; ?></h3>
              <p class="HowCanWeHelpTilesButton__container__tile--description"><?= $tile['description']; ?></p>
              <a class="HowCanWeHelpTilesButton__container__tile--button"
                href="<?= $tile['button']['link']; ?>"><?= $tile['button']['name']; ?><img
                  src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/icons/arrow-right.svg'); ?>"
                  alt="arrow-right"></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="HowCanWeHelpTilesButton__container__element_cta">
        <a class="HowCanWeHelpTilesButton__container__element_cta--button" href="<?= $button['link']; ?>">
          <div
            style="background-image: url('<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/icons/plus.svg'); ?>');"
            class="HowCanWeHelpTilesButton__container__element_cta--button--icon"></div>
          <?= $button['name']; ?>
        </a>
        <img class="HowCanWeHelpTilesButton__container__element_cta--decorative_arrows"
          src="<?= $button['decorative_arrows']; ?>" alt="decorative arrows">
      </div>
    </div>
  </div>
<?php }

add_action('HowCanWeHelpTilesButton', 'HowCanWeHelpTilesButton', 10, 1);