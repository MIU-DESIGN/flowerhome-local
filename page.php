<?php get_header(); ?>

<div class="page-mv">
	<?php if ( has_post_thumbnail()): ?>
		<div class="img-wrap">
			<?php the_post_thumbnail('full'); ?>
		</div><!--/.img-wrap-->
	<?php endif; ?>

	<div class="text-wrap">
		<img class="bg-illust" src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-flower.svg" alt="背景イラスト">

		<h1 class="ttl">
			<?php $mvsub = get_field('mv_sub'); if( $mvsub ): ?>
				<span class="sub">
					<?php echo $mvsub; ?>
				</span>
			<?php endif; ?>

			<?php $mvttl = get_field('mv_ttl'); if( $mvttl ): ?>
				<?php echo $mvttl; ?>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h1>
	</div><!--/.text-wrap-->
</div><!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="entry-content cf" itemprop="articleBody">
			<?php
				the_content();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'flowerhometheme' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</section>

	<?php endwhile; endif; ?>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
