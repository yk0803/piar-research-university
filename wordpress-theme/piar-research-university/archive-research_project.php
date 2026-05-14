<?php get_header(); ?>
<section class="section alt">
  <div class="container">
    <div class="section-head">
      <h1>Research Projects</h1>
      <p>Custom post type archive for showcasing research projects, publications, labs, grants, and impact stories.</p>
    </div>
    <div class="cards">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="card">
          <div class="icon">R</div>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php the_excerpt(); ?>
        </article>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
