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
<section class="py-20 bg-gray-100">
  <div class="w-full mx-auto max-w-7xl">
    <h2 class="text-3xl font-bold mb-8">Related Posts</h2>
    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
      <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
      <div class="bg-white p-8 shadow-md">
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>" class="mb-4">
          <h3 class="text-xl font-bold">
            <?php echo get_the_title(); ?></h3>
          <p class="text-gray-600"><?php echo get_the_excerpt(); ?>
          </p>
        </a>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>