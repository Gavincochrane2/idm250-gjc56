<?php
/*
  * Hero Split
  *
  * This component is used as a hero section on the home page.
*/

// Define the variables for this component and set their default values
$title = get_the_title() ?? 'Page Title Missing';
$description = get_the_excerpt() ?? 'Page description missing';
$ctaButton = [
    'text' => 'Get Started',
    'url' => '#'
];

$post_id = get_the_ID();
// Utilize the custom functions we created in functions.php to get the featured image data
$image = get_featured_image_data($post_id);
$terms = get_the_terms($post_id, 'category');

?>
<div class="relative bg-white" data-component="hero-split">
  <div class="mx-auto max-w-7xl lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8">
    <div class="px-6 pb-24 pt-10 sm:pb-32 lg:col-span-7 lg:px-4 lg:pb-56 lg:pt-48 xl:col-span-6">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h1 class="mt-24 text-4xl font-bold tracking-tight text-gray-900 sm:mt-10 sm:text-6xl">
          <?php echo $title; ?>
        </h1>
        <p class="mt-4">
          <span class="text-gray-600">Date:
            <?php echo get_the_date(); ?></span> | <span class="text-gray-600">Author:
            <?php echo get_the_author(); ?></span> |
          <span class="text-gray-600">Category:
            <?php
            foreach ($terms as $term) {
                echo '<a class="mr-4" href="' . get_term_link($term) . '">' . $term->name . '</a>';
                // <a href="http://localhost:3000/category/uncategorized/">Uncategorized</a>
            }
?>
          </span>
        </p>
        <p class="mt-6 text-lg leading-8 text-gray-600">
          <?php echo $description; ?>
        </p>
      </div>
    </div>
    <div class="relative lg:col-span-5 lg:-mr-8 xl:absolute xl:inset-0 xl:left-1/2 xl:mr-0">
      <?php if ($image) : ?>
      <img class="aspect-[3/2] w-full bg-gray-50 object-cover lg:absolute lg:inset-0 lg:aspect-auto lg:h-full"
        src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
      <?php endif; ?>
    </div>
  </div>
</div>