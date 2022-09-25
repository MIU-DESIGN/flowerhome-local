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

	<section class="article-section01 bg_wh bg_wh04 cf" itemprop="articleBody">

		<div class="container1040">
	    <h2 class="heading_line01 heading_icon01 heading_icon_search fadein btt">
				<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_search_red.svg" alt="アイコン">
	      <span>一括検索</span>
	    </h2>

	    <div class="search-wrap01 fadein btt">
	      <div class="row">
	        <div class="col-1 order-1">
						<div class="wrap_va-m">
	            <div class="inner">
								<div class="wrap_search">
			            <?php echo do_shortcode( '[searchandfilter post_types="property" fields="property_area" types="," headings="市区町村" all_items_labels="選択してください" submit_label="この条件で検索する" hierarchical="1,"]' ); ?>

			            <?php echo do_shortcode('[widget id="number_of_results_widget-2"]'); ?>
			          </div><!--/.wrap_search-->
	            </div><!--/.inner-->
	          </div><!--/.wrap_va-m-->
	        </div><!--/.col-1-->

	        <div class="col-1 order-2">
						<div class="wrap_area">
							<p class="heading"><span class="c-red">エリア</span>から物件を選ぶ</p>

							<ul class="list_col2">
								<li class="hiroshima">
									<a class="link-btn01" href="<?php echo home_url(); ?>/property_area/hiroshima/">広　島</a>
								</li>
								<li class="fukuyamashi">
									<a class="link-btn01" href="<?php echo home_url(); ?>/property_area/fukuyama/">福　山</a>
								</li>
								<li class="okayama">
									<a class="link-btn01" href="<?php echo home_url(); ?>/property_area/okayama/">岡　山</a>
								</li>
								<li class="yamaguchi">
									<a class="link-btn01" href="<?php echo home_url(); ?>/property_area/yamaguchi/">山　口</a>
								</li>
							</ul>
						</div><!--/.wrap_area-->
	        </div><!--/.col-1-->
	      </div><!--/.row-->
	    </div><!--/.search-wrap01-->
	  </div><!--/.container1040-->

		<div class="container600">
			<div class="heading-box01 search-section01 fadein btt">
				<p class="ttl">
					<span>
						エリアで絞り込む
						<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_search.svg" alt="アイコン">
					</span>
				</p>

				<div class="text-wrap">

					<?php
						$taxonomy_terms = get_terms('property_area');
						if(!empty($taxonomy_terms)&&!is_wp_error($taxonomy_terms)){
							echo '<ul>';
							foreach($taxonomy_terms as $taxonomy_term):
					?>
						<li><a href="<?php echo get_term_link($taxonomy_term); ?>" class="<?php if($taxonomy_term->slug === $term){ echo 'current'; } ?>"><?php echo $taxonomy_term->name; ?></a></li>
					<?php
						endforeach;
						echo '</ul>';
						}
					?>

				</div><!--/.text-area-->
			</div><!--/.heading-box-->
		</div><!--/.container600-->

	</section>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
