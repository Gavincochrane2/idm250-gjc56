
<?php get_header(); ?>


 <div class="content">
 <?php
echo get_the_content();
?>
</div>
<?php 
$projects = new WP_Query([
    'post_type' => 'projects',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
]);

// if (have_posts()) :
//     while(have_posts()) : the_post();
// echo '<h2>' . get_the_title() . '</h2>';
// echo '<hr>';
// endwhile;
// else:
//     echo '<p> No content found </p>';
// endif;


// have to add in the custom post type "projects" for this to work

// copy and paste in the if loop and while loop from pauls code on front-page.php
?>
<?php get_footer(); ?>

</html>