<?php
$image = get_featured_image_data(get_the_ID());
// Query terms for current post and return an array of term IDs
$categoryIds = wp_get_post_terms(get_the_ID(), 'category', ['fields' => 'ids']); // [3, 10]

// custom wp query to get related posts for current category
$related_posts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post__not_in' => [get_the_ID()],
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $categoryIds // [3, 10]
        ]
    ]
]);

?>

<?php if ($related_posts->have_posts()) : ?>
<section>
  <div>
    <h2>Related Posts</h2>
    <div>
      <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
      <div>
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>" class="mb-4">
          <h3>
            <?php echo get_the_title(); ?></h3>
          <p><?php echo get_the_excerpt(); ?>
          </p>
        </a>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>