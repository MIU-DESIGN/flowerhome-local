<?php get_header(); ?>

<div class="page-mv">

	<div class="img-wrap">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-bg_works.png" alt="販売実績/施工事例">
	</div>
	<!--/.img-wrap-->

	<div class="text-wrap">
		<img class="bg-illust" src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-flower.svg" alt="背景イラスト">

		<h1 class="ttl">
			<span class="sub">Works</span>
			販売実績/施工事例
		</h1>
	</div>
	<!--/.text-wrap-->
</div>
<!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<section class="article-section01 bg_wh bg_wh04 cf" itemprop="articleBody">

		<div class="container1040">
			<h2 class="heading_line01 fadein btt">
				<span><?php single_term_title(); ?></span>
			</h2>

			<ul class="list_col3_flex list_property">

				<?php $args = array(
					'posts_per_page'   => 9,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_type' => 'property',
					'post_status' => 'publish',
				);
				if (have_posts()) : while (have_posts()) : the_post();
				?>

						<li class="fadein btt">

							<a class="box" href="<?php the_permalink() ?>">

								<div class="img-wrap">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('full'); ?>
									<?php else : ?>
										<img src="<?php the_field('thumbsp'); ?>" alt="<?php the_title(); ?>">
									<?php endif; ?>
								</div>
								<!--/.img-wrap-->

								<div class="text-wrap">

									<p class="cat-name">

										<?php
										$terms = get_the_terms($post->ID, 'property_cat');
										if ($terms) {
											echo $terms[0]->name;
										}
										?>

									</p>

									<strong class="ttl">
										<?php
										if (mb_strlen($post->post_title, 'UTF-8') > 28) {
											$title = mb_substr($post->post_title, 0, 28, 'UTF-8');
											echo $title . '…';
										} else {
											echo $post->post_title;
										}
										?>
									</strong>

									<?php $madori = get_field('madori');
									if ($madori) : ?>
										<p class="floor">
											<?php echo wp_trim_words($madori, 4, ''); ?>
										</p>
									<?php endif; ?>

								</div>
								<!--/.text-wrap-->

							</a>

						</li>

				<?php endwhile;
				endif; ?>

			</ul>

			<?php wp_reset_query(); ?>

			<?php flowerhome_page_navi(); ?>

		</div>
		<!--/.container1040-->

	</section>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
