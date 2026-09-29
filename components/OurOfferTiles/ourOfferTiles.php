<?php


function OurOfferTiles($arrOurOfferTiles)
{
  $header = $arrOurOfferTiles['header'];
  $tiles = $arrOurOfferTiles['tiles'];

  ?>
  <div class="OurOfferTiles__container">
    <div class="container">
      <h2 class="OurOfferTiles__container__title"><?= $header; ?></h2>
      <div class="OurOfferTiles__container__tiles">
        <?php foreach ($tiles as $tile): ?>
          <div class="OurOfferTiles__container__tile">
            <div class='OurOfferTiles__container__tile--bar' style="--bar-color: <?= $tile['select_bar_color']; ?>;"></div>
            <?= wp_get_attachment_image($tile['offer_image'], 'full', false, array("class" => "OurOfferTiles__container__tile--image")); ?>
            <div class="OurOfferTiles__container__tile--content">
              <div>
                <h3 class="OurOfferTiles__container__tile--title"><?= $tile['title']; ?></h3>
                <div class="OurOfferTiles__container__tile--description"><?= $tile['description']; ?></div>
              </div>
              <a class="OurOfferTiles__container__tile--button"
                href="<?= $tile['button']['link']; ?>"><?= $tile['button']['name']; ?><img
                  src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/img/icons/arrow-right.svg'); ?>"
                  alt="arrow-right"></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php }

add_action('OurOfferTiles', 'OurOfferTiles', 10, 1);