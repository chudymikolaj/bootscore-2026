<?php

function HowCanWeHelpText($arrHowCanWeHelpText)
{
  $getTitle = $arrHowCanWeHelpText['title'];
  $getDescription = $arrHowCanWeHelpText['description'];
  $getButton = $arrHowCanWeHelpText['button'];
  ?>
  <div class="HowCanWeHelpText__container">
    <div class="container">
      <h2 class="HowCanWeHelpText__container--title"><?= $getTitle; ?></h2>
      <div class="HowCanWeHelpText__container--description"><?= $getDescription; ?></div>
      <div class="HowCanWeHelpText__container--cta">
        <a class="btn btn-green" href="<?= $getButton['link']; ?>"><?= $getButton['name']; ?></a>
      </div>
    </div>
  </div>
  <?php
}

add_action('HowCanWeHelpText', 'HowCanWeHelpText', 10, 1);