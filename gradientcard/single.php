<?php get_header(); ?>

<div class="post_container">

  <?php if ( have_posts() ): ?>
    <?php while ( have_posts() ): the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    <?php endwhile; ?>
  <?php else: ?>
    <p>The post not contents, please edit post page.</p>
  <?php endif; ?>

</div>

<?php get_footer(); ?>
