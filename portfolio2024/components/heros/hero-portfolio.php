<?php
$terms = get_the_terms($post->ID, 'category');
$featured_image = get_featured_image_data($post->ID);
?>

<header class="py-14  ">
  <div class="w-full mx-auto max-w-7xl flex justify-between items-center">
    <h1 class="text-2xl font-bold"><?php echo get_the_title(); ?>
    </h1>
    <ul class="flex space-y-2 flex-col">
      <li><span>Category:</span>
        <?php
      if ($terms) {
          foreach ($terms as $term) {
              echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
          }
      } ?>
      </li>
      <li><span>Date:</span>
        <span><?php echo get_the_date(); ?></span>
      </li>
      <li><span>Client:</span>
        <span><?php echo esc_html(get_field('project_client')); ?></span>
      </li>

    </ul>
  </div>
</header>

<?php if ($featured_image): ?>
<div class="w-full">
  <img
    src="<?php echo $featured_image['url']; ?>"
    alt="<?php echo $featured_image['alt']; ?>">
</div>
<?php endif; ?>