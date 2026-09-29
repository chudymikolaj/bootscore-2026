<?php

function ModulesElement($getModule)
{

  if ($getModule === "statistics_numbers_module") {
    do_action('StatisticsNumbersModule');
  }

  if ($getModule === "free_consultation_module") {
    do_action('FreeConsultationModule');
  }

  if ($getModule === "opinion_carousel_module") {
    do_action('OpinionCarouselModule');
  }

  if ($getModule === "our_competences_logotype_wall") {
    do_action('OurCompetencesLogotypeWall');
  }

  if ($getModule === "contact_form_module") {
    do_action('ContactFormModule');
  }
}

add_action('ModulesElement', 'ModulesElement', 10, 1);