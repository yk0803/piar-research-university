<?php
get_header();
?>
<section class="section">
  <div class="container">
    <h1><?php bloginfo('name'); ?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="card">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
      </article>
    <?php endwhile; else : ?>
      <p>No content found.</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
