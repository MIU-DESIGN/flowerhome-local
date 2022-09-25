<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

  <section class="entry-content bg_wh bg_wh04 cf" itemprop="articleBody">

    <div class="container700">

      <p class="post-date_single">
        <?php echo get_the_date('Y.m.d'); ?>
      </p>

      <?php
        $this_categories = get_the_category();
        if ( $this_categories ) {
          $this_category_color = get_field( 'bgcolor', 'category_' . $this_categories[0]->term_id );
          $this_category_name  = $this_categories[0]->name;
          echo '<p class="category-name" style="' . esc_attr( 'background-color:' . $this_category_color ) . ' !important;">' . esc_html( $this_category_name ) . '</p>';
        }
      ?>

      <h1 class="entry-title single-title" itemprop="headline" rel="bookmark">
        <?php the_title(); ?>
      </h1>

      <?php if (has_post_thumbnail()) : ?>
        <div class="eyecatch">
          <?php the_post_thumbnail('full'); ?>
        </div><!--/.eyecatch-->
      <?php endif ; ?>

      <?php
        the_content();

        wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'flowerhometheme' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
        ) );
      ?>

      <div class="post-linkbtn-wrap">
        <div class="btn-wrap btn-wrap_prev">
          <?php if (get_previous_post()):?>
            <div class="link-btn01 btn_prev">
              <?php previous_post_link('%link',''); ?>
            </div><!--/.link-btn-->
          <?php endif; ?>
        </div><!--/.btn-wrap-->

        <div class="btn-wrap btn-wrap_back">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="link-btn01">一覧へ戻る</a>
        </div><!--/.btn-wrap-->

        <div class="btn-wrap btn-wrap_next">
          <?php if (get_next_post()):?>
            <div class="link-btn01 btn_next">
              <?php next_post_link('%link',''); ?>
            </div><!--/.link-btn-->
          <?php endif; ?>
        </div><!--/.btn-wrap-->
      </div><!--/.post-linkbtn-wrap-->

    </div><!--/.container700-->
  </section>

</article>
