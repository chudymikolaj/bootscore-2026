<?php
/**
 * Template Post Type: post
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();

// Get the categories of the current post
$getPostId = get_the_ID();
$getHeader = get_field('header', $getPostId);

?>

<div id="content" class="site-content">
  <div id="primary" class="content-area CustomBlogPost__container">

    <div class="CustomBlogPost__container__header-background">
      <div class="container">
        <div class="CustomBlogPost__container__header">
          <div class="CustomBlogPost__container__header--box">
            <div class="CustomBlogPost__container__header--wrapper">
              <?php the_post(); ?>

              <div class="CustomBlogPost__container__header--meta">
                <?php bootscore_date(); ?>
                <?php bootscore_category_badge(); ?>
              </div>

              <h5 class="CustomBlogPost__container__header--subtitle">Blog space</h5>
              <h1 class="CustomBlogPost__container__header--title"><?php the_title(); ?></h1>

              <div class="CustomBlogPost__container__header__list">
                <h4 class="CustomBlogPost__container__header__list--title"><?= $getHeader['text_to_list']; ?></h4>
                <ul class="CustomBlogPost__container__header__list__informations">
                  <?php foreach ($getHeader['in_this_article_you_will__find'] as $item): ?>
                    <li class="CustomBlogPost__container__header__list__informations--item">
                      <?= $item['add_information']; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>

          <?php bootscore_post_thumbnail(); ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="<?= apply_filters('bootscore/class/main/col', 'col col-xl-8'); ?>">
          <main id="main" class="site-main">
            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </main>
        </div>

        <div class="col-12 col-xl-4">
          <?php if (is_single()) {
            $categories = get_the_category($getPostId);

            if ($categories) {
              $category_ids = wp_list_pluck($categories, 'term_id');

              // WP_Query arguments
              $args = array(
                'category__in' => $category_ids, // Get posts in the same categories
                'post__not_in' => array($getPostId), // Exclude the current post
                'posts_per_page' => 4, // Number of posts to display
                'orderby' => 'date',
                'order' => 'DESC',
              );

              // The Query
              $query = new WP_Query($args);

              if ($query->have_posts()) {
                echo '<aside class="SimilarPosts__container">';
                echo '<div class="SimilarPosts__container__posts">';

                while ($query->have_posts()) {
                  $query->the_post();
                  ?>
                  <div class="SimilarPosts__container__post">
                    <div class="SimilarPosts__container__post--meta">
                      <span class="SimilarPosts__container__post--date"><?php echo get_the_date(); ?></span>
                      <span class="SimilarPosts__container__post--category">
                        <?php
                        $child_categories = get_the_category();
                        foreach ($child_categories as $child_category) {
                          if ($child_category->term_id !== 45 || $child_category->term_id !== 13) { // Only display child categories
                            echo $child_category->name;
                            break; // Display only the first child category
                          }
                        }
                        ?>
                      </span>
                    </div>
                    <h4 class="SimilarPosts__container__post--title">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <a class="read-more" href="<?php the_permalink(); ?>">
                      <?php echo pll__('Czytaj dalej →'); ?>
                    </a>
                  </div>
                  <?php
                }

                echo '</div>';
                echo '</aside>';
              }

              // Restore original post data
              wp_reset_postdata();
            }
          }
          ?>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="entry-footer clear-both">
        <!-- Related posts using bS Swiper plugin -->
        <?php if (function_exists('bootscore_related_posts'))
          bootscore_related_posts(); ?>
        <nav aria-label="bs page navigation">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <?php previous_post_link('%link', '<span class="arrow"><svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.2002 9.67308C4.94238 9.78868 4.64355 9.73392 4.43848 9.53314L0.219727 5.39579C0.0791016 5.25889 0 5.06723 0 4.86645C0 4.66567 0.0791016 4.47401 0.219727 4.33711L4.43848 0.19976C4.64355 -0.00102317 4.94238 -0.0557822 5.2002 0.0598203C5.45801 0.175423 5.625 0.440092 5.625 0.729098V2.91946H14.0625C14.5811 2.91946 15 3.35449 15 3.89296V5.83995C15 6.37841 14.5811 6.81344 14.0625 6.81344H5.625V9.0038C5.625 9.29585 5.45801 9.55748 5.2002 9.67308Z" fill="#F6F6F6"/></svg></span> ' . pll__("Poprzedni")); ?>
            </li>

            <li class="page-item">
              <a class="page-link" href="<?= get_permalink(get_option('page_for_posts')); ?>">
                <?php echo pll__("Wróć do wszystkich wpisów") ?>
              </a>
            </li>

            <li class="page-item">
              <?php next_post_link('%link', pll__("Następny") . ' <span class="arrow"><svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.7998 9.67308C10.0576 9.78868 10.3564 9.73392 10.5615 9.53314L14.7803 5.39579C14.9209 5.25889 15 5.06723 15 4.86645C15 4.66567 14.9209 4.47401 14.7803 4.33711L10.5615 0.19976C10.3564 -0.00102317 10.0576 -0.0557822 9.7998 0.0598203C9.54199 0.175423 9.375 0.440092 9.375 0.729098V2.91946H0.9375C0.418945 2.91946 0 3.35449 0 3.89296V5.83995C0 6.37841 0.418945 6.81344 0.9375 6.81344H9.375V9.0038C9.375 9.29585 9.54199 9.55748 9.7998 9.67308Z" fill="#F6F6F6"/></svg></span>'); ?>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="RelatedPosts__container">
      <div class="container">
        <?php // Get the categories of the current post
        $categories = get_the_category($getPostId);

        if ($categories) {
          $category_ids = wp_list_pluck($categories, 'term_id'); // Get category IDs
        
          // WP_Query arguments
          $args = array(
            'post__not_in' => array($post->ID), // Exclude the current post
            'posts_per_page' => 3, // Number of posts to display
            'orderby' => 'rand', // Order posts randomly
          );

          // The Query
          $query = new WP_Query($args);

          if ($query->have_posts()) {
            echo '<div class="RelatedPosts__posts">';
            echo '<div class="RelatedPosts__posts-grid">';

            while ($query->have_posts()) {
              $query->the_post();
              ?>
              <div class="RelatedPosts__post-item">
                <?php if (has_post_thumbnail()): ?>
                  <a href="<?php the_permalink(); ?>" class="RelatedPosts__post-link">
                    <div class="RelatedPosts__post-thumbnail">
                      <?php the_post_thumbnail('medium'); ?>
                    </div>
                  </a>
                <?php endif; ?>
                <div class="RelatedPosts__post-content">
                  <a href="<?php the_permalink(); ?>" class="RelatedPosts__post-link">
                    <div class="SimilarPosts__container__post--meta">
                      <span class="SimilarPosts__container__post--date"><?php echo get_the_date(); ?></span>
                      <span class="SimilarPosts__container__post--category">
                        <?php
                        $child_categories = get_the_category();
                        foreach ($child_categories as $child_category) {
                          if ($child_category->term_id !== 45 || $child_category->term_id !== 13) { // Only display child categories
                            echo $child_category->name;
                            break; // Display only the first child category
                          }
                        }
                        ?>
                      </span>
                    </div>
                    <h4 class="RelatedPosts__post-title"><?php the_title(); ?></h4>
                  </a>
                  <a class="read-more" href="<?php the_permalink(); ?>">
                    <?php echo pll__('Czytaj dalej →'); ?>
                  </a>
                </div>

              </div>
              <?php
            }

            echo '</div>';
            echo '</div>';
          }

          // Restore original post data
          wp_reset_postdata();
        }
        ?>
      </div>
    </div>

    <?php do_action('FreeConsultationModule'); ?>
    <?php do_action('ContactFormModule'); ?>

  </div>
</div>

<?php
get_footer();
