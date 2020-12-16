<?php get_header(); ?>

<div class="main_container">
  <?php
    if ( have_posts() ): while ( have_posts() ): the_post();
    $counter++;
  ?>
  <?php
    $cat = get_the_category();
    $cat_name = $cat[0]->cat_name;
    $cat_slug = $cat[0]->category_nicename;
    $cat_id = get_cat_ID( $cat_name );
    $cat_link = get_category_link( $cat_id );
  ?>
  <?php if ($counter==1) {
    echo '<div class="card box1">';
  } else {
    echo '<div class="card">';
  }
  ?>
  <div class="card_img cat_<?php echo $cat_slug; ?>">
    <?php
    if (has_post_thumbnail()):
      the_post_thumbnail();
    ?>
    <?php else: ?>
      <img src="<?php echo get_template_directory_uri(); ?>/img/pc_woman.jpg" alt="contents img" />
    <?php endif; ?>
  </div>
  <h2><a href="<?php the_permalink( $post->post_id ); ?>"><?php the_title(); ?></a></h2>
  <div class="sub_content">
    <a class="card_category" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
    <?php
    $tags = get_the_tags();

    if ( $tags ):
      foreach ( $tags as $tag ):
    ?>
    <a class="card_tag" href='<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>'><?php echo $tag->name ?></a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
<?php endwhile; endif; ?>
</div>

<nav class="pagination">
  <?php pagination_bar(); ?>
</nav>

<?php get_footer(); ?>
