<?php

function StatisticsNumbersModule()
{
  $StatisticsNumbersModule = get_field('module_statistics_numbers', 'option');
  ?>
  <div class="StatisticsNumbersModule__container">
    <div class="container">
      <div class="StatisticsNumbersModule__container--wrapper">

        <?php foreach ($StatisticsNumbersModule['provide_realizations'] as $realization): ?>
          <div class="StatisticsNumbersModule__container__realization">
            <div class="StatisticsNumbersModule__container__realization--title">
              <?= $realization['number_of_implementations']; ?>
            </div>
            <div class="StatisticsNumbersModule__container__realization--description">
              <?= $realization['implementation_description']; ?>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
  <?php
}

add_action('StatisticsNumbersModule', 'StatisticsNumbersModule', 10);