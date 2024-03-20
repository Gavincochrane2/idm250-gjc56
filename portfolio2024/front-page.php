
<?php get_header(); ?>


 <div class="content">
 <?php
echo get_the_content();
?>
</div>
<?php 
$query = new WP_Query([
    'post_type' => 'projects',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC'
]);

if ($query->have_posts()) :
    while($query->have_posts()) : $query->the_post();
echo '<h3>' . get_the_title() . '</h3>';
echo '<p>' . get_the_excerpt() . '</p>';
echo '<a href="' . get_the_permalink() . '">See more</a>';
echo '<br>';
endwhile;
wp_reset_postdata();
else:
    echo '<p> No content found </p>';

endif;


// have to add in the custom post type "projects" for this to work

// copy and paste in the if loop and while loop from pauls code on front-page.php
?>
<?php get_footer(); ?>

</html>