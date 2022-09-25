<?php
/*
Template Name: ブランクページ
*/
?>

<?php get_header(); ?>

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="entry-content cf" itemprop="articleBody">

			<?php the_content();?>

		</section>

	<?php endwhile; endif; ?>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
