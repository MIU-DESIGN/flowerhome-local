<?php get_header(); ?>

<div class="page-mv">

	<div class="img-wrap">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-bg_voice.png" alt="お客様の声">
	</div><!--/.img-wrap-->

	<div class="text-wrap">
		<img class="bg-illust" src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-flower.svg" alt="背景イラスト">

		<h1 class="ttl">
			<span class="sub">Voice / Interview</span>
			お客様の声/インタビュー
		</h1>
	</div><!--/.text-wrap-->
</div><!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<section class="article-section01 bg_wh bg_wh04 cf" itemprop="articleBody">

		<div class="container1040">

			<p style="font-size:1.375rem; font-weight:500;" class="ta-c">準備中</p>

			<div style="display:none !important;">

			<h2 class="heading_line01 fadein btt">
	      <span>お客様の声</span>
	    </h2>

				<ul class="list_col2 list_voice">

					<?php $args = array(
							'posts_per_page'   => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'post_type' => 'voice',
							'post_status' => 'publish',
							'tax_query' => array(
								array(
									'taxonomy' => 'voice_cat',
									'field' => 'slug',
									'terms' => 'voice'
								)
							),
						);
						$the_query = new WP_Query($args);
						if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();
					?>

						<li class="fadein btt">

							<a class="box" href="<?php the_permalink() ?>">

								<div class="text-wrap">

									<strong class="ttl">
										<?php
											if(mb_strlen($post->post_title, 'UTF-8')>28) {
												$title= mb_substr($post->post_title, 0, 28, 'UTF-8');
												echo $title.'…';
											} else{
												echo $post->post_title;
											}
										?>
									</strong>

									<?php $excerpt = get_field('excerpt'); if( $excerpt ): ?>
										<p class="excerpt">
											<?php echo $excerpt; ?>
										</p>
									<?php endif; ?>

									<p class="btn">詳細へ</p>

								</div><!--/.text-wrap-->

								<?php if (has_post_thumbnail()) : ?>
					        <div class="img-wrap">
					          <?php the_post_thumbnail('full'); ?>
					        </div><!--/.img-wrap-->
								<?php endif ; ?>

							</a>

						</li>

					<?php endwhile; ?>
					<?php endif; ?>

				</ul>

				<?php wp_reset_postdata(); ?>

				<h2 class="heading_line01 fadein btt mt-100">
		      <span>インタビュー</span>
		    </h2>

				<ul class="list_col2 list_voice">

					<?php $args = array(
							'posts_per_page'   => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'post_type' => 'voice',
							'post_status' => 'publish',
							'tax_query' => array(
								array(
									'taxonomy' => 'voice_cat',
									'field' => 'slug',
									'terms' => 'interview'
								)
							),
						);
						$the_query = new WP_Query($args);
						if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();
					?>

						<li class="fadein btt">

							<a class="box" href="<?php the_permalink() ?>">

								<div class="text-wrap">

									<strong class="ttl">
										<?php
											if(mb_strlen($post->post_title, 'UTF-8')>28) {
												$title= mb_substr($post->post_title, 0, 28, 'UTF-8');
												echo $title.'…';
											} else{
												echo $post->post_title;
											}
										?>
									</strong>

									<?php $excerpt = get_field('excerpt'); if( $excerpt ): ?>
										<p class="excerpt">
											<?php echo $excerpt; ?>
										</p>
									<?php endif; ?>

									<p class="btn">詳細へ</p>

								</div><!--/.text-wrap-->

								<?php if (has_post_thumbnail()) : ?>
					        <div class="img-wrap">
					          <?php the_post_thumbnail('full'); ?>
					        </div><!--/.img-wrap-->
								<?php endif ; ?>

							</a>

						</li>

					<?php endwhile; ?>
					<?php endif; ?>

				</ul>

				<?php wp_reset_postdata(); ?>

			</div><!--/公開後に削除-->

		</div><!--/.container1040-->

	</section>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
