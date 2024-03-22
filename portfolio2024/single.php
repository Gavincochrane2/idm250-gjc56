<?php get_header(); ?>


 <div class="content">
<?php
echo '<h1>' . get_the_title() . '</h1>';
echo get_the_content();
?>
<!-- <p>this is a single.php template</p> -->
</div>
<?php get_footer(); ?>

</html>