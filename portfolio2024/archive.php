<?php get_header(); ?>


 <div class="content">
<?php

$query = new WP_Query([
    'post_type' => 'project',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
]);
if (have_posts()) :
    while(have_posts()) : the_post();

echo '<h3>' . get_the_title() . '</h3>';
echo '<img class="thumb" src="' . get_the_post_thumbnail() . '';
echo '<div class="archive"';

echo '<p>' . get_the_excerpt() . '</p>';

echo '<a href="' . get_permalink() . '">See more</a>';


echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '</div>';
endwhile;
else:
    echo '<p> No content found </p>';
endif;

?>
</div>
<?php get_footer(); ?>

</html>