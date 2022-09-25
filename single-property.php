<?php get_header(); ?>
<div class="page-mv page-mv_detail-page">
	<div class="img-wrap">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/single/mv-bg_property_single.png" alt="物件詳細">
	</div><!--/.img-wrap-->
</div><!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

		<section class="single-wrap_property01 entry-content bg_wh bg_wh04 cf" itemprop="articleBody">

	    <div class="container800">

				<p class="cat-label_property01">

					<?php
						$terms = get_the_terms($post->ID, 'property_area');
						if ( $terms ) {
							echo $terms[0]->name;
						}
					?>

					<?php
						$terms = get_the_terms($post->ID, 'property_cat');
						if ( $terms ) {
							echo $terms[0]->name;
						}
					?>

				</p>

	      <h1 class="property-name" itemprop="headline" rel="bookmark">
	        <?php the_title(); ?>
	      </h1>

				<p class="text_price01">
					価格
					<span class="price">
						<?php if(is_object_in_term($post->ID, 'property_bukken','jissekitax')): ?>
							--
						<?php elseif(is_object_in_term($post->ID, 'property_bukken','contracted')): ?>
							--
						<?php elseif(get_post_meta($post->ID,'price',true) == '10000'): ?>
							--
						<?php else: ?>
							<?php the_field('price'); ?>
						<?php endif; ?>
					</span>
					万円
				</p>

				<p class="text_madori01">
					間取り：<?php the_field('madori'); ?>
				</p>

				<?php $slider = get_field('slider'); if( $slider ): ?>
					<div class="slider-wrap_property">
						<?php echo do_shortcode($slider); ?>
					</div><!--/.slider-wrap_property-->
				<?php endif; ?>

				<?php $zenkei3d = get_field('zenkei3d'); if( $zenkei3d ): ?>
					<a href="<?php echo $zenkei3d; ?>" class="link-btn01 link-btn_icon link-btn_3d" target="_blank">
						<span>バーチャルオープンハウスで見る</span>
					</a>
				<?php endif; ?>

				<div class="content-wrap01">
					<?php the_content();?>
				</div><!--/.content-wrap01-->

			</div><!--/.container800-->

			<?php get_template_part('parts/link-btn-section01');?>

			<div class="container1040">
				<h2 class="heading_line01">
		      <span>物件概要</span>
		    </h2>

				<div class="property-info01">
					<div class="row">
						<div class="col-1">
							<table class="table_type01">
								<tbody>
									<tr>
										<th>物件名</th>
										<td>
											<?php the_title(); ?>
										</td>
									</tr>

									<?php $address = get_field('address'); if( $address ): ?>
										<tr>
											<th>住所</th>
											<td>
												<?php $postno = get_field('postno'); if( $postno ): ?>
													〒<?php echo $postno; ?><br />
												<?php endif; ?>

												<?php echo $address; ?>

												<a href="#map" class="link-btn01">地図を見る</a>
											</td>
										</tr>
									<?php endif; ?>

									<?php $price = get_field('price'); if( $price ): ?>
										<tr>
											<th>価格</th>
											<td>
												<?php if(get_post_meta($post->ID,'price',true) == '10000'): ?>
													--
												<?php else: ?>
													<?php echo $price; ?>万円
												<?php endif; ?>
											</td>
										</tr>
									<?php endif; ?>

									<tr>
										<th>間取り</th>
										<td>
											<?php the_field('madori'); ?>

											<?php $madoriimg = get_field('madoriimg'); if( $madoriimg ): ?>
												<a href="<?php echo $madoriimg; ?>" class="fancybox link-btn01">間取りを見る</a>
											<?php endif; ?>
										</td>
									</tr>

									<?php $tochimen = get_field('tochimen'); if( $tochimen ): ?>
										<tr>
											<th>土地面積</th>
											<td>
												<?php echo $tochimen; ?>m<sup>2</sup>
											</td>
										</tr>
									<?php endif; ?>

									<?php $tatemen = get_field('tatemen'); if( $tatemen ): ?>
										<tr>
											<th>建物面積・専有面積</th>
											<td>
												<?php echo $tatemen; ?>m<sup>2</sup>
											</td>
										</tr>
									<?php endif; ?>

									<?php $parking = get_field('parking'); if( $parking ): ?>
										<tr>
											<th>駐車場</th>
											<td>
												<?php echo $parking; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $finish = get_field('finish'); if( $finish ): ?>
										<tr>
											<th>完成時期（築年月）</th>
											<td>
												<?php echo $finish; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $transaction = get_field('transaction'); if( $transaction ): ?>
										<tr>
											<th>取引形態</th>
											<td>
												<?php echo $transaction; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $lot = get_field('lot'); if( $lot ): ?>
										<tr>
											<th>販売戸数</th>
											<td>
												<?php echo $lot; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $totallot = get_field('totallot'); if( $totallot ): ?>
										<tr>
											<th>総戸数</th>
											<td>
												<?php echo $totallot; ?>
											</td>
										</tr>
									<?php endif; ?>

								</tbody>
							</table>
						</div><!--/.col-1-->

						<div class="col-1">
							<div class="wrap_va-m">
								<div class="inner">
									<div class="img-wrap eyecatch pc">
										<?php if (has_post_thumbnail()) : ?>
							        <?php the_post_thumbnail('full'); ?>
										<?php else: ?>
											<img src="<?php the_field('thumbsp'); ?>" alt="<?php the_title(); ?>">
							      <?php endif; ?>
									</div><!--/.img-wrap-->

									<div class="img-wrap eyecatch sp">
										<img src="<?php the_field('thumbsp'); ?>" alt="<?php the_title(); ?>">
									</div><!--/.img-wrap-->
								</div><!--/.inner-->
							</div><!--/.wrap_va-m-->
						</div><!--/.col-1-->
					</div><!--/.row-->
				</div><!--/.property-info01-->

				<h2 id="map" class="heading_line01">
		      <span>周辺環境</span>
		    </h2>

				<div class="property-info02">
					<div class="row">

						<?php $traffic = get_field('traffic'); if( $traffic ): ?>

							<div class="col-1">
								<div class="info-box info-box_traffic">
									<h3 class="heading_brd-b02">交通</h3>

									<?php echo $traffic; ?>
								</div><!--/.info-box-->
							</div><!--/.col-1-->

						<?php endif; ?>

						<?php $life = get_field('life'); if( $life ): ?>

							<div class="col-1">
								<div class="info-box info-box_life">
									<h3 class="heading_brd-b02">生活</h3>

									<?php echo $life; ?>
								</div><!--/.info-box-->
							</div><!--/.col-1-->

						<?php endif; ?>

					</div><!--/.row-->

					<?php $googlemap = get_field('googlemap'); if( $googlemap ): ?>

						<div class="map-wrap">
							<?php echo $googlemap; ?>
						</div><!--/.map-wrap-->

					<?php endif; ?>

				</div><!--/.property-info02-->
			</div><!--/.container1040-->

			<?php get_template_part('parts/link-btn-section01');?>

			<div class="container1040">

				<?php if(get_field('setubidisplay')): ?>

					<h2 class="heading_line01">
						<span>設備情報</span>
					</h2>

					<div class="property-info01">
						<div class="info-box info-box_facility">
							<h3 class="heading_brd-b02">設備</h3>

							<table class="table_type01">
								<tbody>

									<?php $chara = get_field('chara'); if( $chara ): ?>
										<tr>
											<th>特徴</th>
											<td>
												<?php echo $chara; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $kitchen = get_field('kitchen'); if( $kitchen ): ?>
										<tr>
											<th>キッチン</th>
											<td>
												<?php echo $kitchen; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $toilet = get_field('toilet'); if( $toilet ): ?>
										<tr>
											<th>トイレ</th>
											<td>
												<?php echo $toilet; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $bath = get_field('bath'); if( $bath ): ?>
										<tr>
											<th>バス</th>
											<td>
												<?php echo $bath; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $interior = get_field('interior'); if( $interior ): ?>
										<tr>
											<th>室内設備</th>
											<td>
												<?php echo $interior; ?>
											</td>
										</tr>
									<?php endif; ?>

									<?php $other = get_field('other'); if( $other ): ?>
										<tr>
											<th>その他</th>
											<td>
												<?php echo $other; ?>
											</td>
										</tr>
									<?php endif; ?>

								</tbody>
							</table>
						</div><!--/.info-box-->
					</div><!--/.property-info01-->

				<?php endif; ?>

				<?php $acf_samebukken = get_field('samebukken'); if( $acf_samebukken ): ?>

					<div class="property-section-wrap01">
						<h3 class="heading_brd-b02">
							<?php the_title(); ?>
							の別区画の物件
						</h3>

						<ul class="list_property-section list_col3_flex">

							<?php foreach( $acf_samebukken as $post): ?>
							<?php setup_postdata($post); ?>

								<li>
									<a class="box" href="<?php the_permalink(); ?>">

										<div class="img-wrap">
											<?php if (has_post_thumbnail()) : ?>
												<?php the_post_thumbnail('full'); ?>
											<?php else: ?>
												<img src="<?php the_field('thumbsp'); ?>" alt="<?php the_title(); ?>">
											<?php endif; ?>
										</div><!--/.img-wrap-->

										<div class="text-wrap">
											<p class="text_info01">

												<?php $gono = get_field('gono'); if( $gono ): ?>
													<span class="label label_gono">
														<?php echo $gono; ?>
													</span>
												<?php endif; ?>

												<span class="label label_cat">
													<?php
														$terms = get_the_terms($post->ID, 'property_cat');
														if ( $terms ) {
															echo $terms[0]->name;
														}
													?>
												</span>
											</p>

											<table class="table_tr">
												<tbody>

													<?php if(is_object_in_term($post->ID, 'property_bukken','jissekitax')): ?>
													<?php elseif(is_object_in_term($post->ID, 'property_bukken','contracted')): ?>
													<?php else: ?>

														<?php $price = get_field('price'); if( $price ): ?>
															<tr>
																<th>価格</th>
																<td>
																	<?php if(get_post_meta($post->ID,'price',true) == '10000'): ?>
																		--
																	<?php else: ?>
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

													<?php $tochimen = get_field('tochimen'); if( $tochimen ): ?>
														<tr>
															<th>土地面積</th>
															<td>
																<?php echo $tochimen; ?>m<sup>2</sup>
															</td>
														</tr>
													<?php endif; ?>

												</tbody>
											</table>
										</div><!--/.text-wrap-->
									</a>
								</li>

							<?php endforeach; ?>

						</ul>

						<?php wp_reset_postdata(); ?>

					</div><!--/.property-section-wrap01-->

				<?php endif; ?>

				<?php if(get_field('kukakudisp')): ?>

					<div class="property-section-wrap02">
						<h3 class="heading_brd-b02">区画図</h3>

						<?php $kukakuimg = get_field('kukakuimg'); if( $kukakuimg ): ?>
							<div class="img-wrap">
								<img src="<?php echo $kukakuimg; ?>" alt="区画図">
							</div><!--/.img-wrap-->
						<?php endif; ?>

						<?php $kukakumsg = get_field('kukakumsg'); if( $kukakumsg ): ?>
							<div class="content-wrap">
								<?php echo $kukakumsg; ?>
							</div><!--/.content-wrap-->
						<?php endif; ?>

					</div><!--/.property-section-wrap01-->

				<?php endif; ?>

				<?php if(get_field('luludiadisp')): ?>

				<?php endif; ?>

			</div><!--/.container1040-->

			<?php get_template_part('parts/link-btn-section01');?>

			<div class="container1040">
				<h2 class="heading_line01">
					<span>近隣の物件</span>
				</h2>

				<ul class="list_col3_flex list_property">

					<?php
						global $post;
				  	$term = array_shift(get_the_terms($post->ID, 'property_area')); //←ここが追加
				  	$args = array(
							'numberposts' => 3,
							'post_type' => 'property',
							'taxonomy' => 'property_area',
							'term' => $term->slug,
							'orderby' => 'rand',
							'post__not_in' => array($post->ID),
							'tax_query' => array(
								array(
									'taxonomy' => 'property_bukken',
									'field' => 'slug',
									'terms' => 'jissekitax',
									'operator' => 'NOT IN',
								),
							),
						);
					?>
					<?php $myPosts = get_posts($args); if($myPosts) : ?>
					<?php foreach($myPosts as $post) : setup_postdata($post); ?>

						<li>

							<a class="box" href="<?php the_permalink() ?>">

								<div class="img-wrap">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('full'); ?>
									<?php else: ?>
										<img src="<?php the_field('thumbsp'); ?>" alt="<?php the_title(); ?>">
									<?php endif; ?>
								</div><!--/.img-wrap-->

								<div class="text-wrap">

									<p class="cat-name">

										<?php
											$terms = get_the_terms($post->ID, 'property_cat');
											if ( $terms ) {
												echo $terms[0]->name;
											}
										?>

									</p>

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

									<?php if(is_object_in_term($post->ID, 'property_bukken','jissekitax')): ?>
									<?php elseif(is_object_in_term($post->ID, 'property_bukken','contracted')): ?>
									<?php else: ?>

										<p class="text_price01">
											価格
											<span class="price">
												<?php if(get_post_meta($post->ID,'price',true) == '10000'): ?>
													--
												<?php else: ?>
													<?php the_field('price'); ?>
												<?php endif; ?>
											</span>
											万円
										</p>

									<?php endif; ?>

									<?php if( get_field('op_on') or get_field('visit_on')): ?>

										<ul class="label-list">

											<?php if(get_field('op_on')): ?>
												<li><span>オープンハウス</span></li>
											<?php endif; ?>

											<?php if(get_field('visit_on')): ?>
												<li><span>見学予約可</span></li>
											<?php endif; ?>

										</ul>

									<?php endif; ?>

									<table class="table_tr">
										<tbody>
											<?php $opdatetime = get_field('opdatetime'); if( $opdatetime ): ?>
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

											<?php $tochimen = get_field('tochimen'); if( $tochimen ): ?>
												<tr>
													<th>土地面積</th>
													<td>
														<?php echo $tochimen; ?>m<sup>2</sup>
													</td>
												</tr>
											<?php endif; ?>

										</tbody>
									</table>

								</div><!--/.text-wrap-->

							</a>

						</li>

					<?php endforeach; ?>
					<?php endif; wp_reset_postdata(); ?>

				</ul>

				<div class="post-linkbtn-wrap">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>property" class="link-btn01">一覧へ戻る</a>
	      </div><!--/.post-linkbtn-wrap-->

			</div><!--/.container1040-->
	  </section>

	</article>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
