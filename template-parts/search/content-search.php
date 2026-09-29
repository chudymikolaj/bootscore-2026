<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;

?>

<article id="post-<?php the_ID(); ?>"
  class="<?= apply_filters('bootscore/class/main/col', 'col-12 col-md-6 col-xl-4'); ?>">
  <div class="CustomBlogPosts__container_post">

    <?php if (has_post_thumbnail()): ?>
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium', array('class' => 'CustomBlogPosts__container_post--image')); ?>
      </a>
    <?php endif; ?>

    <div class="CustomBlogPosts__container_post--wrapper">
      <?php if ('post' === get_post_type()): ?>
        <div class="CustomBlogPosts__container_post--meta">
          <?php bootscore_date(); ?>
          <?php bootscore_category_badge(); ?>
        </div>
      <?php endif; ?>

      <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
        <?php the_title('<h2 class="CustomBlogPosts__container_post--title">', '</h2>'); ?>
      </a>

      <p class="CustomBlogPosts__container_post--description screen-reader-text">
        <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
          <?= strip_tags(get_the_excerpt()); ?>
        </a>
      </p>

      <p class="CustomBlogPosts__container_post--more">
        <a class="read-more" href="<?php the_permalink(); ?>">
          <?= pll__('Czytaj dalej →'); ?>
        </a>
      </p>
    </div>

  </div>
</article>

<!-- #post-<?php the_ID(); ?> -->