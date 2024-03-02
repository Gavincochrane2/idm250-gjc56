<?php get_header(); ?>


 <div class="content">
<?php
if (have_posts()) :
    while(have_posts()) : the_post();
echo '<h2>' . get_the_title() . '</h2>';
echo '<hr>';
endwhile;
else:
    echo '<p> No content found </p>';
endif;
echo get_the_title();
?>
</div>
<?php get_footer(); ?>

</html>