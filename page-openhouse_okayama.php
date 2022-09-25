<?php get_header(); ?>

<div class="page-mv">
	<?php if (has_post_thumbnail()) : ?>
		<div class="img-wrap">
			<?php the_post_thumbnail('full'); ?>
		</div>
		<!--/.img-wrap-->
	<?php endif; ?>

	<div class="text-wrap">
		<img class="bg-illust" src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-flower.svg" alt="背景イラスト">

		<h1 class="ttl">
			<?php $mvsub = get_field('mv_sub');
			if ($mvsub) : ?>
				<span class="sub">
					<?php echo $mvsub; ?>
				</span>
			<?php endif; ?>

			<?php $mvttl = get_field('mv_ttl');
			if ($mvttl) : ?>
				<?php echo $mvttl; ?>
			<?php else : ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h1>
	</div>
	<!--/.text-wrap-->
</div>
<!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<section class="article-section01 bg_wh bg_wh04 cf" itemprop="articleBody">

		<div class="container600">
			<h2 class="heading_line01 fadein btt">
				<span>岡山県の<br class="sp">オープンハウス情報</span>
			</h2>

			<div class="search-section01 search-section_area fadein btt">
				<p class="ttl">
					<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_search_red.svg" alt="アイコン">
					エリアで絞り込む
				</p>

				<ul class="area-list">
					<li>
						<a href="<?php echo home_url(); ?>/openhouse/openhouse_hiroshima/">
							<span>広島県</span>
						</a>
					</li>
					<li>
						<a href="<?php echo home_url(); ?>/openhouse/openhouse_fukuyama/">
							<span>福山市</span>
						</a>
					</li>
					<li>
						<a href="<?php echo home_url(); ?>/openhouse/openhouse_okayama/">
							<span>岡山県</span>
						</a>
					</li>
					<li>
						<a href="<?php echo home_url(); ?>/openhouse/openhouse_yamaguchi/">
							<span>山口県</span>
						</a>
					</li>
				</ul>

			</div>
			<!--/.search-section01-->
		</div>
		<!--/.container600-->

		<div class="container600">
			<div class="search-section01 search-section_date fadein btt">
				<p class="ttl">
					<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_search_red.svg" alt="アイコン">
					開催日
				</p>

				<?php if (have_rows('datelist', 26313)) : ?>

					<ul class="list_date">

						<?php while (have_rows('datelist', 26313)) : the_row(); ?>

							<li>

								<a href="#<?php the_sub_field('date', 26313); ?>">
									<?php
									$date = get_sub_field('date', 26313);
									$term_id = $date;
									$term = get_term($term_id);
									echo $term->name;
									?>
								</a>

							</li>

						<?php endwhile; ?>

					</ul>

				<?php endif; ?>

			</div>
			<!--/.search-section01-->
		</div>
		<!--/.container600-->

		<div class="container1040">

			<?php if (have_rows('datelist', 26313)) : ?>

				<?php while (have_rows('datelist', 26313)) : the_row(); ?>

					<h2 id="<?php the_sub_field('date', 26313); ?>" class="heading_brd-b01 fadein btt">
						<?php
						$date = get_sub_field('date', 26313);
						$term_id = $date;
						$term = get_term($term_id);
						echo $term->name;
						?>
					</h2>

					<ul class="list_col3_flex list_property">

						<?php
						$date = get_sub_field('date', 26313);
						$term_id = $date;
						$term = get_term($term_id);
						$slug = $term->slug;

						$args = array(
							'posts_per_page'   => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'post_type' => 'property',
							'post_status' => 'publish',
							'tax_query' => array(
								array(
									'taxonomy' => 'property_opdate',
									'field' => 'slug',
									'terms' => $slug,
								),
								array(
									'taxonomy' => 'property_bukken',
									'field' => 'slug',
									'terms' => 'okayama-openhouse'
								)
							),
						);
						$the_query = new WP_Query($args);
						if ($the_query->have_posts()) :
							while ($the_query->have_posts()) : $the_query->the_post();
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

											<?php if (is_object_in_term($post->ID, 'property_bukken', 'jissekitax')) : ?>
											<?php elseif (is_object_in_term($post->ID, 'property_bukken', 'contracted')) : ?>
											<?php else : ?>

												<p class="text_price01">
													価格
													<span class="price">
														<?php if (get_post_meta($post->ID, 'price', true) == '10000') : ?>
															--
														<?php else : ?>
															<?php the_field('price'); ?>
														<?php endif; ?>
													</span>
													万円
												</p>

											<?php endif; ?>

											<table class="table_tr">
												<tbody>
													<?php $opdatetime = get_field('opdatetime');
													if ($opdatetime) : ?>
														<tr>
															<th>開催日</th>
															<td>
																<span class="c-red">
																	<?php echo $opdatetime; ?>
																</span>
															</td>
														</tr>
													<?php endif; ?>

													<tr>
														<th>間取り</th>
														<td>
															<?php the_field('madori'); ?>
														</td>
													</tr>

													<?php $tochimen = get_field('tochimen');
													if ($tochimen) : ?>
														<tr>
															<th>土地面積</th>
															<td>
																<?php echo $tochimen; ?>m<sup>2</sup>
															</td>
														</tr>
													<?php endif; ?>

												</tbody>
											</table>

										</div>
										<!--/.text-wrap-->

									</a>

								</li>

							<?php endwhile; ?>
						<?php endif; ?>

					</ul>

					<?php wp_reset_postdata(); ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
		<!--/.container1040-->

	</section>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
