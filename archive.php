<?php get_header(); ?>

<div class="page-mv">

	<?php if(has_post_thumbnail(42)): ?>
		<div class="img-wrap">
			<img src="<?php echo get_the_post_thumbnail_url(42,'full'); ?>" alt="お知らせ">
		</div><!--/.img-wrap-->
	<?php endif; ?>

	<div class="text-wrap">
		<img class="bg-illust" src="<?php echo get_template_directory_uri(); ?>/library/images/page/mv-flower.svg" alt="背景イラスト">

		<h1 class="ttl">

			<?php if( is_category() ) : ?>
				<?php if(category_description()):?>
					<span class="sub">
						<?php echo category_description(); ?>
					</span>
				<?php endif;?>
			<?php elseif( is_tag() ) : ?>
				<?php if(tag_description()):?>
					<span class="sub">
						<?php echo tag_description(); ?>
					</span>
				<?php endif;?>
			<?php else: ?>
				<?php $mv_sub = get_field('mv_sub',42); if( $mv_sub ): ?>
					<span class="sub">
						<?php echo $mv_sub; ?>
					</span>
				<?php endif; ?>
			<?php endif; ?>

			<?php if( is_category() ) : ?>
				<?php single_cat_title(); ?>
			<?php elseif( is_tag() ) : ?>
				<?php $term_name = single_term_title( '', false ); echo $term_name;?>
			<?php else: ?>
				<?php
					$page_id = 42;
					$mes = get_page($page_id);
				?>
				<?php
					echo $mes->post_title
				?>
			<?php endif; ?>
			
		</h1>
	</div><!--/.text-wrap-->
</div><!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<section class="article-section01 bg_wh bg_wh04 cf" itemprop="articleBody">

		<div class="container1040">

			<ul class="post-list list_col3">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<li class="fadein btt">

	          <a class="box" href="<?php the_permalink() ?>">

	            <div class="img-wrap">
	              <?php if (has_post_thumbnail()) : ?>
	                <?php the_post_thumbnail('large'); ?>
	              <?php else : ?>
	                <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/no-img.png" alt="フラワーホーム">
	              <?php endif ; ?>
	            </div><!--/.img-wrap-->

	            <div class="text-wrap">

	              <p class="post-date">
	                <?php the_time('Y.m.d'); ?>
	              </p>

	              <h3 class="ttl">
	                <?php
	    							if(mb_strlen($post->post_title, 'UTF-8')>28) {
	    								$title= mb_substr($post->post_title, 0, 28, 'UTF-8');
	    								echo $title.'…';
	    							} else{
	    								echo $post->post_title;
	    							}
	    						?>
	              </h3>

								<?php
					        $this_categories = get_the_category();
					        if ( $this_categories ) {
					          $this_category_color = get_field( 'bgcolor', 'category_' . $this_categories[0]->term_id );
					          $this_category_name  = $this_categories[0]->name;
					          echo '<p class="category-name" style="' . esc_attr( 'background-color:' . $this_category_color ) . ' !important;">' . esc_html( $this_category_name ) . '</p>';
					        }
					      ?>

	            </div><!--/.text-wrap-->

	          </a>

	        </li>

				<?php endwhile; ?>
				<?php endif; ?>

			</ul>

			<?php flowerhome_page_navi(); ?>

		</div><!--/.container1040-->

	</section>

</main>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
