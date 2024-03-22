
<?php get_header(); ?>


<div class="default">

<?php
echo get_the_content();
?>

<?php 
$query = new WP_Query([
   'post_type' => 'project',
   'posts_per_page' => -1,
   'orderby' => 'date',
   'order' => 'DESC'
]);

if ($query->have_posts()) :
   while($query->have_posts()) : $query->the_post();
echo '<h5>' . get_the_title() . '</h5>';
echo '<p>' . get_the_excerpt() . '</p>';

echo '<a href="' . get_permalink() . '">See more</a>';

echo '<br>';
endwhile;
wp_reset_postdata();
else:
   echo '<p> No content found </p>';

endif;

?> 

</div>
<?php get_footer(); ?>

</html>
