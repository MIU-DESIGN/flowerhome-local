<?php get_header(); ?>
<div class="page-mv page-mv_detail-page">
	<div class="img-wrap">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/single/mv-bg_voice_single.png" alt="お客様の声">
	</div><!--/.img-wrap-->
</div><!--/.page-mv-->

<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

		<section class="entry-content bg_wh bg_wh04 cf" itemprop="articleBody">

	    <div class="container800">

	      <h1 class="entry-title single-title" itemprop="headline" rel="bookmark">
	        <?php the_title(); ?>
	      </h1>

	      <?php if (has_post_thumbnail()) : ?>
	        <div class="eyecatch">
	          <?php the_post_thumbnail('full'); ?>
	        </div><!--/.eyecatch-->
	      <?php endif ; ?>

				<?php if( have_rows('interview') ): ?>

					<ul class="list_interview">

							<?php while( have_rows('interview') ): the_row(); ?>

								<li>

									<?php $question = get_sub_field('question'); ?>
									<?php if(empty($question)):?>
									<?php else:?>
										<p class="question">
											<?php the_sub_field('question'); ?>
										</p>
									<?php endif;?>

									<?php $answer = get_sub_field('answer'); ?>
									<?php if(empty($answer)):?>
									<?php else:?>
										<p class="answer">
											<?php the_sub_field('answer'); ?>
										</p>
									<?php endif;?>

								</li>

							<?php endwhile; ?>

						</ul>

				<?php endif; ?>

				<div class="content-wrap_voice">
					<?php the_content();?>
				</div><!--/.content-wrap_voice-->

	      <div class="post-linkbtn-wrap">
	        <div class="btn-wrap btn-wrap_prev">
	          <?php if (get_previous_post()):?>
	            <div class="link-btn01 btn_prev">
	              <?php previous_post_link('%link',''); ?>
	            </div><!--/.link-btn-->
	          <?php endif; ?>
	        </div><!--/.btn-wrap-->

	        <div class="btn-wrap btn-wrap_back">
	          <a href="<?php echo esc_url( home_url( '/' ) ); ?>voice" class="link-btn01">一覧へ戻る</a>
	        </div><!--/.btn-wrap-->

	        <div class="btn-wrap btn-wrap_next">
	          <?php if (get_next_post()):?>
	            <div class="link-btn01 btn_next">
	              <?php next_post_link('%link',''); ?>
	            </div><!--/.link-btn-->
	          <?php endif; ?>
	        </div><!--/.btn-wrap-->
	      </div><!--/.post-linkbtn-wrap-->

	    </div><!--/.container800-->
	  </section>

	</article>

</main>

<section class="bg_pk bg_pk01 link-btn-section01">
	<div class="container1040">
		<ul class="list_col3">
			<li>
				<a href="<?php echo home_url(); ?>/search/" class="link-btn01">物件を検索する</a>
			</li>

			<li>
				<a href="<?php echo home_url(); ?>/lulu/" class="link-btn01">ルルーディアシリーズの特徴</a>
			</li>

			<li>
				<a href="<?php echo home_url(); ?>/openhouse/" class="link-btn01">オープンハウス</a>
			</li>
		</ul>
	</div><!--/.container1040-->
</section>

<?php custom_breadcrumb(); ?>

<?php get_footer(); ?>
