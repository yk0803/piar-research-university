<?php
if (!defined('ABSPATH')) { exit; }
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="PIAR is a fictional research university WordPress theme demonstrating SEO, UI/UX, accessibility, and research-oriented content architecture.">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
  <div class="container navbar">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?> home">
      <span class="logo-mark">P</span>
      <span><?php bloginfo('name'); ?></span>
    </a>
    <nav class="nav-links" aria-label="Primary navigation">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'fallback_cb' => false,
        'items_wrap' => '%3$s',
      ));
      ?>
      <a href="#research">Research</a>
      <a href="#programs">Programs</a>
      <a href="#ux">UI/UX</a>
      <a href="#seo">SEO</a>
      <a href="#admissions" class="btn">Apply Now</a>
    </nav>
    <a class="btn secondary mobile-toggle" href="#admissions">Apply</a>
  </div>
</header>
<main id="main">
