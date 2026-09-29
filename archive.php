<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();

$getBlogAcf = get_field('blog', 'option');
?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">

    <div class="archive--padding blog-bg">
      <div class="container">
        <div class="row">
          <div class="<?= apply_filters('bootscore/class/main/col', 'col') ?>">

            <main id="main" class="site-main">

              <!-- Header -->
              <div class="CustomBlogHeader__container">
                <h1 class="CustomBlogHeader__container--title"><?= $getBlogAcf['header']['title'] ?></h1>
                <p class="CustomBlogHeader__container--description"><?= $getBlogAcf['header']['description'] ?></p>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="CategoriesPills__header">
                    <div class="CategoriesPills__dropdown">
                      <select class="CategoriesPills__dropdown-select"
                        onchange="if (this.value) window.location.href=this.value;">
                        <option value="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">All
                          Categories
                        </option>
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) {
                          $is_current = is_category($category->term_id) ? 'selected' : '';
                          echo '<option value="' . esc_url(get_category_link($category->term_id)) . '" ' . $is_current . '>' . esc_html($category->name) . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <!-- Category Pills -->
                    <div class="CategoriesPills__container">
                      <div class="CategoriesPills__categories">
                        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                          class="CategoriesPills__categories-pill CategoriesPills__categories-pill--active">
                          <?php echo pll__('Wszystko'); ?>
                        </a>
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) {
                          echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="CategoriesPills__categories-pill">' . esc_html($category->name) . '</a>';
                        }
                        ?>
                      </div>
                    </div>

                    <?php if (pll_current_language() == "en") {
                      $getSearchLang = esc_url(get_site_url() . '/en/');
                    } else {
                      $getSearchLang = esc_url(get_site_url());
                    } ?>

                    <form role="search" method="get" class="CategoriesPills__search-form"
                      action="<?= $getSearchLang; ?>">

                      <input type="search" class="CategoriesPills__search-form-input"
                        placeholder="<?php echo pll__("Szukaj") ?>" value="<?php echo get_search_query(); ?>" name="s">

                      <!-- Add this hidden input to send the language parameter -->
                      <input type="hidden" name="lang" value="<?php echo pll_current_language(); ?>">
                      <button type="submit" class="CategoriesPills__search-form-submit"><svg width="18" height="17"
                          viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M11.4563 1.945C8.86284 -0.648332 4.64172 -0.648332 2.04822 1.945C-0.544719 4.53889 -0.544719 8.75916 2.04822 11.3531C4.3578 13.6619 7.95486 13.9093 10.5467 12.1064C10.6012 12.3644 10.726 12.6107 10.9267 12.8113L14.7037 16.5881C15.2541 17.1373 16.1435 17.1373 16.6911 16.5881C17.241 16.0383 17.241 15.1489 16.6911 14.6008L12.9142 10.8229C12.7146 10.6239 12.4678 10.4985 12.2097 10.444C14.0139 7.85181 13.7665 4.25555 11.4563 1.945ZM10.2639 10.1607C8.32761 12.0968 5.17639 12.0968 3.24068 10.1607C1.30553 8.22453 1.30553 5.07408 3.24068 3.13794C5.17639 1.20236 8.32761 1.20236 10.2639 3.13794C12.2002 5.07408 12.2002 8.22453 10.2639 10.1607Z"
                            fill="#2A327F" />
                        </svg></button>
                    </form>
                  </div>
                </div>

                <?php if (have_posts()): ?>
                  <?php while (have_posts()):
                    the_post(); ?>

                    <div class="<?= apply_filters('bootscore/class/main/col', 'col-12 col-md-6 col-xl-4'); ?>">
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
                              <?= $getBlogAcf['button_name']; ?>
                            </a>
                          </p>
                        </div>

                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>

              <div class="entry-footer">
                <?php bootscore_pagination(); ?>
              </div>
            </main>
          </div>
        </div>
      </div>
    </div>

    <?php do_action('FreeConsultationModule'); ?>
    <?php do_action('ContactFormModule'); ?>

  </div>
</div>

<?php
get_footer();
