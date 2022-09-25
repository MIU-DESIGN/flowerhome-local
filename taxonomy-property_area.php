<?php get_header(); ?>

<div class="page-mv">

	<div class="img-wrap">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-bg_new.png" alt="物件一覧">
	</div>
	<!--/.img-wrap-->

	<div class="text-wrap">
		<img class="bg-illust" src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-flower.svg" alt="背景イラスト">

		<h1 class="ttl">
			<span class="sub">Property List</span>
			物件一覧
		</h1>
	</div>
	<!--/.text-wrap-->
</div>
<!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<section class="article-section01 bg_wh bg_wh04 cf" itemprop="articleBody">

		<div class="container600">
			<h2 class="heading_line01 fadein btt">
				<span><?php single_term_title(); ?>の<br class="sp">物件一覧</span>
			</h2>

			<div class="search-section01 search-section_area fadein btt">
				<p class="ttl">
					<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_search_red.svg" alt="アイコン">
					エリアで絞り込む
				</p>

				<?php
				$taxonomy_terms = get_terms('property_area', ['parent' => 0]);
				if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms)) {
					echo '<ul>';
					foreach ($taxonomy_terms as $taxonomy_term) :
				?>
						<li><a href="<?php echo get_term_link($taxonomy_term); ?>" class="<?php if ($taxonomy_term->slug === $term) {
																																								echo 'current';
																																							} ?>"><?php echo $taxonomy_term->name; ?></a></li>
				<?php
					endforeach;
					echo '</ul>';
				}
				?>

			</div>
			<!--/.search-section01-->

			<div class="search-section01 search-section_area fadein btt">
				<p class="ttl">
					<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_search_red.svg" alt="アイコン">
					市区町村で絞り込む
				</p>

				<ul>
					<?php if (is_tax("property_area", "hiroshima")) : ?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 47;
						$term_children = get_terms($taxonomy_name, array('child_of' => $term_id, 'orderby' => 'none'));
						foreach ($term_children as $child) {
							$child_term = get_term_by('id', $child->term_id, $taxonomy_name);
							echo "<li><a href='" . get_term_link($child, $taxonomy_name) . "'><span>" . esc_html($current_term->name . ' ' . $child_term->name) . "</span></a></li>";
						} ?>
					<?php elseif (is_tax("property_area", "okayama")) : ?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 183;
						$term_children = get_terms($taxonomy_name, array('child_of' => $term_id, 'orderby' => 'none'));
						foreach ($term_children as $child) {
							$child_term = get_term_by('id', $child->term_id, $taxonomy_name);
							echo "<li><a href='" . get_term_link($child, $taxonomy_name) . "'><span>" . esc_html($current_term->name . ' ' . $child_term->name) . "</span></a></li>";
						} ?>
					<?php elseif (is_tax("property_area", "yamaguchi")) : ?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 44;
						$term_children = get_terms($taxonomy_name, array('child_of' => $term_id, 'orderby' => 'none'));
						foreach ($term_children as $child) {
							$child_term = get_term_by('id', $child->term_id, $taxonomy_name);
							echo "<li><a href='" . get_term_link($child, $taxonomy_name) . "'><span>" . esc_html($current_term->name . ' ' . $child_term->name) . "</span></a></li>";
						} ?>
					<?php elseif (is_tax("property_area", "fukuyama")) : ?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 185;
						$term_children = get_terms($taxonomy_name, array('child_of' => $term_id, 'orderby' => 'none'));
						foreach ($term_children as $child) {
							$child_term = get_term_by('id', $child->term_id, $taxonomy_name);
							echo "<li><a href='" . get_term_link($child, $taxonomy_name) . "'><span>" . esc_html($current_term->name . ' ' . $child_term->name) . "</span></a></li>";
						} ?>
					<?php endif; ?>

					<?php
					$parentterm_id =  (int) get_queried_object_id();
					if (term_is_ancestor_of(47, $parentterm_id, 'property_area')) :
					?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 47;
						$term_children = get_terms($taxonomy_name, array('child_of' => $term_id, 'orderby' => 'none'));
						foreach ($term_children as $child) {
							$child_term = get_term_by('id', $child->term_id, $taxonomy_name);
							echo "<li><a href='" . get_term_link($child, $taxonomy_name) . "'><span>" . esc_html($current_term->name . ' ' . $child_term->name) . "</span></a></li>";
						} ?>
					<?php endif; ?>

					<?php
					$parentterm_id =  (int) get_queried_object_id();
					if (term_is_ancestor_of(183, $parentterm_id, 'property_area')) :
					?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 183;
						$term_children = get_terms($taxonomy_name, array('child_of' => $term_id, 'orderby' => 'none'));
						foreach ($term_children as $child) {
							$child_term = get_term_by('id', $child->term_id, $taxonomy_name);
							echo "<li><a href='" . get_term_link($child, $taxonomy_name) . "'><span>" . esc_html($current_term->name . ' ' . $child_term->name) . "</span></a></li>";
						} ?>
					<?php endif; ?>

					<?php
					$parentterm_id =  (int) get_queried_object_id();
					if (term_is_ancestor_of(44, $parentterm_id, 'property_area')) :
					?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 44;
						$termchildren = get_term_children($term_id, $taxonomy_name);
						foreach ($termchildren as $child) : ?>
							<?php $term = get_term_by('id', $child, $taxonomy_name); ?>
							<li>
								<a href="<?php echo get_term_link($child, $taxonomy_name); ?>">
									<?php echo $term->name; ?>
								</a>
							</li>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php
					$parentterm_id =  (int) get_queried_object_id();
					if (term_is_ancestor_of(185, $parentterm_id, 'property_area')) :
					?>
						<?php
						$taxonomy_name = 'property_area';
						$term_id = 185;
						$term_children = get_terms($taxonomy_name, array('child_of' => $term_id, 'orderby' => 'none'));
						foreach ($term_children as $child) {
							$child_term = get_term_by('id', $child->term_id, $taxonomy_name);
							echo "<li><a href='" . get_term_link($child, $taxonomy_name) . "'><span>" . esc_html($current_term->name . ' ' . $child_term->name) . "</span></a></li>";
						} ?>
					<?php endif; ?>

				</ul>

			</div>
			<!--/.search-section01-->

		</div>
		<!--/.container600-->

		<div class="container1040">

			<ul class="list_col3_flex list_property">

				<?php query_posts($query_string . '&orderby=menu_order' . '&order=asc'); ?>
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

									<?php if (get_field('op_on') or get_field('visit_on')) : ?>

										<ul class="label-list">

											<?php if (get_field('op_on')) : ?>
												<li><span>オープンハウス</span></li>
											<?php endif; ?>

											<?php if (get_field('visit_on')) : ?>
												<li><span>見学予約可</span></li>
											<?php endif; ?>

										</ul>

									<?php endif; ?>

									<table class="table_tr">
										<tbody>
											<?php if (is_object_in_term($post->ID, 'property_bukken', 'jissekitax')) : ?>
											<?php elseif (is_object_in_term($post->ID, 'property_bukken', 'contracted')) : ?>
											<?php else : ?>

												<?php $price = get_field('price');
												if ($price) : ?>
													<tr>
														<th>価格</th>
														<td>
															<?php if (get_post_meta($post->ID, 'price', true) == '10000') : ?>
																--
															<?php else : ?>
																<?php echo $price; ?>万円
															<?php endif; ?>
														</td>
													</tr>
												<?php endif; ?>

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
