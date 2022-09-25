<?php get_header(); ?>

<div class="page-mv page-mv_detail-page">
	<div class="img-wrap">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/single/mv-bg_single.png" alt="ブログ">
	</div><!--/.img-wrap-->
</div><!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php
			get_template_part( 'post-formats/format', get_post_format() );
		?>

	<?php endwhile; ?>

	<?php else : ?>
		<article id="post-not-found" class="hentry cf">
				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'flowerhometheme' ); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'flowerhometheme' ); ?></p>
				</section>
				<footer class="article-footer">
						<p><?php _e( 'This is the error message in the single.php template.', 'flowerhometheme' ); ?></p>
				</footer>
		</article>
	<?php endif; ?>
</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
