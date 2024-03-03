
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

?>
<?php get_footer(); ?>

</html>
