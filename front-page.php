<?php get_header(); ?>

<section class="mv">
  <div class="mv-inner">
    <div class="mv-btn-wrap">
      <p class="ttl fadein ltr">
        <img class="mv-flower mv-flower01" src="<?php echo get_template_directory_uri(); ?>/library/images/top/mv-flower01.svg" alt="背景イラスト">
        <img class="mv-flower mv-flower02" src="<?php echo get_template_directory_uri(); ?>/library/images/top/mv-flower02.svg" alt="背景イラスト">
        新しい暮らしが、花開く
      </p>

      <div class="fadein fadein02 ltr">
        <a class="btn" href="<?php echo home_url(); ?>/purchase/">
          <span>不動産を売りたい方はこちら</span>

          <img class="check" src="<?php echo get_template_directory_uri(); ?>/library/images/top/mv-btn-after.svg" alt="不動産を売りたい方はこちら">
        </a>
      </div>
      <!--/.fadein-->
    </div>
    <!--/.mv-btn-wrap-->
  </div>
  <!--/.mv-inner-->

  <p class="scroll-down">SCROLL</p>

</section>

<!-- <style>
@media screen and (max-width: 767px) {
.luludia--wrap {
	padding:50px 0;
}
.logo--more--wrap,  .text--area--wrap{
	display:flex;
	justify-content:start;
	background-color:#fff;
	width:100%;
	align-items:center;
}

	
.logo--more--wrap .logo--wrap  {
	max-width:100px; 
	width:20vw;
}
.logo--more--wrap .more--wrap {
	width:auto;
	padding-left:15px;
}
.logo--more--wrap .more--wrap span {
	display:inline-block;
	border:2px solid #000;
	padding:0 10px;
	color:#000;
	text-decoration:none;
	font-weight:700;
}

.cover--wrap {
	text-decoration:none !important;
}	

.cover--wrap .more--wrap p {
	font-size:3vw;
	color:#000;
}	
	
}
	
/**/
	

@media screen and (min-width: 768px) {
.luludia--wrap {
	padding:50px 0;
}
	
.logo--more--wrap,  .text--area--wrap{
	display:flex;
	justify-content:start;
	background-color:#fff;
	width:100%;
/* 	align-items:center; */
}
/* .text--area--wrap{
	align-items:top !important;
}
 */
	
.logo--more--wrap .logo--wrap  {
	max-width:100px; 
	width:20vw;
}
.logo--more--wrap .more--wrap {
	width:80vw;
	padding-left:15px;
}
.logo--more--wrap .more--wrap > span {
	display:inline-block;
	border:2px solid #000;
	padding:0 10px;
	color:#000;
	text-decoration:none;
	font-weight:700;
}
.logo--more--wrap .more--wrap > .news--title--wrap br {
display:none;
	}
.cover--wrap .more--wrap p {
	color:#000;
	text-decoration:underline #000;
}	
}

.cover--wrap .more--wrap span {
	background-color:#fff;
	color:#000;
	transition:background-color 0.3s linear, color 0.3s linear;
}
.cover--wrap:hover .more--wrap span {
	background-color:#000;
	color:#fff;
}

	

.luludia--wrap a {
	padding:30px 0;
	border-bottom:2px solid #e6e6e6;
	display:block;
	padding:10px;
	cursor:pointer;
}
	

	
</style>
 -->

<section class="bg_wh">
  <div class="container900">
    <div class="fadein luludia--wrap">
		<a href="https://luludia-select.info" target="_blank" class="cover--wrap"><div class="logo--more--wrap">
			<div class="logo--wrap">
				<img src="https://flowerhome.info/wp/wp-content/uploads/luludia-sq-logo.png" width="100%" alt="LULUDIA">
			</div>
			<div class="more--wrap">
				<span>VIEW MORE</span>
				<div class="news--title--wrap">
					<p>「企画型注文住宅」ルルーディアセレクトはコチラ</p>
				</div>
			</div>
		</div></a>
    </div>
	</div>
</section>



<section class="bg_wh">
  <div class="container900">
    <div class="fadein btt">
      <a class="link-bnr01" href="<?php echo home_url(); ?>/warranty_after-follow/">
        <img class="pc" src="<?php echo get_template_directory_uri(); ?>/library/images/bnr/bnr_af.png" alt="保証・アフターフォローについてはこちら">
        <img class="sp" src="<?php echo get_template_directory_uri(); ?>/library/images/bnr/bnr_af_sp.png" alt="保証・アフターフォローについてはこちら">
      </a>
    </div>
  </div>
</section>

<section class="bg_wh bg_wh01">
  <div class="container1040">
    <h2 class="heading_line01 fadein btt">
      <span>物件検索</span>
    </h2>

    <div class="search-wrap01 fadein btt">
      <div class="row">
        <div class="col-1 order-1">
          <div class="wrap_va-m">
            <div class="inner">
              <div class="wrap_search">
                <?php echo do_shortcode('[searchandfilter post_types="property" fields="property_area" types="," headings="市区町村" all_items_labels="選択してください" submit_label="この条件で検索する" hierarchical="1,"]'); ?>

                <?php echo do_shortcode('[widget id="number_of_results_widget-2"]'); ?>
              </div>
              <!--/.wrap_search-->
            </div>
            <!--/.inner-->
          </div>
          <!--/.wrap_va-m-->
        </div>
        <!--/.col-1-->

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
          </div>
          <!--/.wrap_area-->
        </div>
        <!--/.col-1-->
      </div>
      <!--/.row-->
    </div>
    <!--/.search-wrap01-->
  </div>
  <!--/.container1040-->
</section>

<section class="bg_wh bg_wh08">
  <div class="container600">
    <h2 class="heading_line01 fadein btt">
      <span>新着物件</span>
    </h2>
  </div>
  <!--/.container600-->

  <div class="property-slide-wrap property-slide-wrap01 slide-wrap fadein btt">
    <div class="swiper-container">
      <ul class="swiper-wrapper list_property">

        <?php
        query_posts(
          array(
            'posts_per_page'   => 10,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_type' => 'property',
            'post_status' => 'publish',
            'paged' => $paged,
            'tax_query' => array(
              array(
                'taxonomy' => 'property_bukken',
                'field' => 'slug',
                'terms' => 'jissekitax',
                'operator' => 'NOT IN',
              ),
            ),
          )
        );
        if (have_posts()) : while (have_posts()) : the_post();
        ?>

            <li class="swiper-slide">

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
            <!--/.swiper-slide-->

        <?php endwhile;
        endif; ?>

      </ul>
      <!--/.swiper-wrapper-->
    </div>
    <!--/.swiper-container-->

    <div class="slide-button-prev prev_property"></div>

    <div class="slide-button-next next_property"></div>

    <div class="swiper-pagination swiper-pagination_property"></div>
  </div>
  <!--/.slide-wrap-->

  <?php wp_reset_query(); ?>
</section>

<div class="movie">
    <h2 class="heading_line01 fadein btt scrollin">
      <span>CM</span>
    </h2>

    <video id="video" style="width: 100%;" controls webkit-playsinline playsinline ><!--muted-->
        <source src="<?php echo get_template_directory_uri();?>/library/images/top/cm.mp4" type="video/mp4">
    </video>
</div>
<style>
	.movie{
		text-align: center;
		width: 700px;
		margin: 50px auto 0;
	}
	@media screen and (max-width: 768px) {
		.movie{
			width: 90%;
		}
	}
</style>

<section class="bg_wh bg_wh02">
  <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/bg-illust_flower01.svg" alt="背景イラスト" class="bg-illust bg-illust_feeling01">

  <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/bg-illust_flower02.svg" alt="背景イラスト" class="bg-illust bg-illust_feeling02">

  <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/bg-illust_flower02.svg" alt="背景イラスト" class="bg-illust bg-illust_feeling03">

  <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/bg-illust_flower03.svg" alt="背景イラスト" class="bg-illust bg-illust_feeling04">

  <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/bg-illust_flower02.svg" alt="背景イラスト" class="bg-illust bg-illust_feeling05">

  <div class="container1040">
    <div class="section_feeling01 fadein btt">
      <div class="img-wrap img-wrap_feeling01">
        <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/img_feeling01.png" alt="子育て世代が暮らしやすい家を" class="heading-icon icon_search">
      </div>
      <!--/.img-wrap-->

      <div class="section-inner">
        <p class="section-label">家に込める想い</p>

        <h2 class="heading_large01">
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_home.svg" alt="アイコン" class="heading-icon icon_home">

          <span>子育て世代が<br class="sp">暮らしやすい家を</span>
        </h2>

        <div class="text-wrap">
          <p class="desc">フラワーホームは、子育て世代が暮らしやすさと、心地よさを感じられる家を提供したいと考えています。その思いから生まれたのが、ルルーディアシリーズです。これまで、年間200世帯以上のお客様に、"新しい暮らし"を提供してきました。お客様の生活を快適にする多種多様な間取り。家族の成長に合わせた活躍をする豊富な収納とサンルーム。そして、充実したアフターサポートがお客様の安心をお守りします。</p>

          <h3 class="heading01">これからも、<br class="sp">お客様の新しい暮らしに<br />
            花を咲かせるお手伝いを<br class="sp">続けていきます</h3>

          <a href="<?php echo home_url(); ?>/company/" class="link-btn01">家に込める想い</a>
        </div>
        <!--/.text-wrap-->
      </div>
      <!--/.section-inner-->

      <div class="img-wrap img-wrap_feeling02">
        <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/img_feeling02.png" alt="子育て世代が暮らしやすい家を" class="heading-icon icon_search">
      </div>
      <!--/.img-wrap-->

      <a href="<?php echo home_url(); ?>/lulu/" class="link-btn01 link-btn_feeling01">フラワーホームの家を見る</a>

    </div>
    <!--/.section_feeling01-->
  </div>
  <!--/.container1040-->
</section>

<section class="img-section_top01">
  <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/bg-illust_flower04.svg" alt="背景イラスト" class="bg-illust bg-illust01">

  <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/bg-illust_flower02.svg" alt="背景イラスト" class="bg-illust bg-illust02">

  <div class="section-inner fadein btt">
    <div class="img-wrap img-wrap_left">
      <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/section-img01.png" alt="イメージ写真">
    </div>
    <!--/.img-wrap-->

    <div class="img-wrap img-wrap_right">
      <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/section-img02.png" alt="イメージ写真">
    </div>
    <!--/.img-wrap-->
  </div>
  <!--/.section-inner-->
</section>

<section class="bg_wh bg_wh03">
  <div class="container600">
    <h2 class="heading_line01 fadein btt">
      <span>ルルーディアシリーズの<br class="sp">特徴</span>
    </h2>

    <p class="logo-wrap_lulu01 img-wrap fadein btt">
      <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/logo_lulu.png" alt="ルルーディアシリーズ">
    </p>
  </div>
  <!--/.container600-->

  <ul class="feature-list_lulu01">
	<!-- secure -->
    <li class="fadein btt">
      <div class="feature-wrap">
        <div class="inner">
          <div class="text-wrap">
            <div class="num-wrap">
              <p class="num">01</p>

              <p class="text">SECURITY PACK</p>
            </div>
            <!--/.num-wrap-->

            <div class="text-inner">
              <h3 class="ttl">HESTAスマートホームの防犯パッケージ</h3>

              <p class="desc">スマート家電による防犯パッケージが標準装備になりました。<br>
				  高いコストパフォーマンスで、強固なセキュリティを実現。<br>
				  フラワーホームの防犯パッケージがあなたの安心をお守りします。</p>

              <a href="<?php echo home_url(); ?>/security" class="link-btn_arrow01">
                防犯パッケージ<br class="sp">について詳しく見る
                <span class="arrow"></span>
              </a>
            </div>
            <!--/.text-inner-->
          </div>
          <!--/.text-wrap-->

          <div class="img-wrap">
            <img src="https://flowerhome.info/wp/wp-content/uploads/security-top-tmb-1.png" alt="防犯パッケージ">
          </div>
          <!--/.img-wrap-->
        </div>
        <!--/.inner-->
      </div>
      <!--/.feature-wrap-->
    </li>
	  <li class="fadein btt">
      <div class="feature-wrap">
        <div class="inner">
          <div class="text-wrap">
            <div class="num-wrap">
              <p class="num">02</p>

              <p class="text">FLOOR</p>
            </div>
            <!--/.num-wrap-->

            <div class="text-inner">
              <h3 class="ttl">多種多様な間取り</h3>

              <p class="desc">家選びをするときのポイントは立地や価格、そしてなんと言っても「間取り」ではないでしょうか。<br />
                広島県・岡山県・山口県で年間200戸超えの供給実績から様々な土地情報が集まります。<br />
                その中から厳選した土地の、方角や形状に合った間取りをご提案しております。<br />
                子育て世代の意見を取り入れ、当社ならではのより住みやすい間取りをお届けします。</p>

              <a href="<?php echo home_url(); ?>/lulu/#point01" class="link-btn_arrow01">
                多種多様な間取り<br class="sp">について詳しく見る
                <span class="arrow"></span>
              </a>
            </div>
            <!--/.text-inner-->
          </div>
          <!--/.text-wrap-->

          <div class="img-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/img_feature01.png" alt="多種多様な間取り">
          </div>
          <!--/.img-wrap-->
        </div>
        <!--/.inner-->
      </div>
      <!--/.feature-wrap-->
    </li>

    <li class="fadein btt">
      <div class="feature-wrap">
        <div class="inner">
          <div class="text-wrap">
            <div class="num-wrap">
              <p class="num">03</p>

              <p class="text">STORAGE AND SOLARIUM</p>
            </div>
            <!--/.num-wrap-->

            <div class="text-inner">
              <h3 class="ttl">豊富な収納・サンルーム</h3>

              <p class="desc">お子様の誕生や成長などに伴い、生活用品だけでなく思い出の品や記念品など"もの"が増えていきますよね。<br />
                それでもすっきりと、快適な心地よい暮らしは実現させたい。<br />
                そんな願いに応えるため、ルルーディアシリーズは必要な、そしてあったら便利な場所に、広い収納をご用意しております。<br />
                "片付け上手になる家"のご提案です。</p>

              <a href="<?php echo home_url(); ?>/lulu/#point02" class="link-btn_arrow01">
                収納・サンルーム<br class="sp">について詳しく見る
                <span class="arrow"></span>
              </a>
            </div>
            <!--/.text-inner-->
          </div>
          <!--/.text-wrap-->

          <div class="img-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/img_feature02.png" alt="豊富な収納・サンルーム">
          </div>
          <!--/.img-wrap-->
        </div>
        <!--/.inner-->
      </div>
      <!--/.feature-wrap-->
    </li>

    <li class="fadein btt">
      <div class="feature-wrap">
        <div class="inner">
          <div class="text-wrap">
            <div class="num-wrap">
              <p class="num">04</p>

              <p class="text">RESISTANCE</p>
            </div>
            <!--/.num-wrap-->

            <div class="text-inner">
              <h3 class="ttl">制震・耐震</h3>

              <p class="desc">世界有数の地震多発国日本で、家を建てる時避けて通れないのが地震への備えです。<br />
                フラワーホームの家は地盤や土台だけでなく、柱にも地震対策を行っています。<br />
                家は耐震性を備えています。しかし大きく揺れるとヒビ等の損傷が発生し、<br />
                更に限界を超える大きな地震が発生すると倒壊してしまいます。<br />
                そこで大切なのは、地震発生時の揺れを減らすことです。<br />
                揺れを減らすのが制震材の役目です。<br />
                フラワーホームの家は、地震の揺れを最大88％軽減するブレースリーK型を採用し、<br />
                標準仕様にすることで皆様の大切な暮らしを守ります。</p>

              <a href="<?php echo home_url(); ?>/warranty_after-follow/" class="link-btn_arrow01">
                制震・耐震<br class="sp">について詳しく見る
                <span class="arrow"></span>
              </a>
            </div>
            <!--/.text-inner-->
          </div>
          <!--/.text-wrap-->

          <div class="img-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/img_feature03.png" alt="安心の品質">
          </div>
          <!--/.img-wrap-->
        </div>
        <!--/.inner-->
      </div>
      <!--/.feature-wrap-->
    </li>

    <li class="fadein btt">
      <div class="feature-wrap">
        <div class="inner">
          <div class="text-wrap">
            <div class="num-wrap">
              <p class="num">05</p>

              <p class="text">QUALITY</p>
            </div>
            <!--/.num-wrap-->

            <div class="text-inner">
              <h3 class="ttl">安心の品質</h3>

              <p class="desc">家は建てて終わりではなく、住んでからが始まりです。<br />
                ルルーディアは10年間のアフター保証と住宅瑕疵担保保険付き。<br />
                日々のちょっとした不具合にも365日対応しておりますので、安心して暮らせる住まいをお約束いたします。</p>

              <a href="<?php echo home_url(); ?>/warranty_after-follow/" class="link-btn_arrow01">
                保証とアフターサポート<br class="sp">について詳しく見る
                <span class="arrow"></span>
              </a>
            </div>
            <!--/.text-inner-->
          </div>
          <!--/.text-wrap-->

          <div class="img-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/library/images/top/img_feature03.png" alt="安心の品質">
          </div>
          <!--/.img-wrap-->
        </div>
        <!--/.inner-->
      </div>
      <!--/.feature-wrap-->
    </li>
	
</ul>

  <div class="container600">
    <div class="fadein btt">
      <a href="<?php echo home_url(); ?>/search/" class="link-btn01">ルルーディアシリーズの<br class="sp">物件を探す</a>
    </div>
    <!--/.fadein-->
  </div>
  <!--/.container600-->

</section>

<section class="section_oh01">
  <div class="container940">
    <h2 class="heading_large01 fadein btt">
      <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_info.svg" alt="アイコン" class="heading-icon icon_info">

      <span>オープンハウス情報</span>
    </h2>

    <ul class="list_col2 list_property list_openhouse fadein btt">

      <?php $args = array(
        'posts_per_page'   => 4,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'property',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'property_opdate',
            'field' => 'slug',
            'terms' => 'all',
          )
        ),
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
      ?>

          <li>

            <a class="box" href="<?php the_permalink() ?>">

              <div class="row">
                <div class="col-1">
                  <div class="img-wrap">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('full'); ?>
                    <?php else : ?>
                      <img src="<?php the_field('thumbsp'); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                  </div>
                  <!--/.img-wrap-->
                </div>
                <!--/.col-1-->

                <div class="col-2">
                  <div class="text-wrap">

                    <?php
                    $terms = get_the_terms($post->ID, 'property_opdate');
                    if ($terms) {
                      echo '<ul class="oh-date">';
                      foreach ($terms as $term) {
                        echo '<li>' . $term->name . '</li>';
                      }
                      echo '</ul>';
                    }
                    ?>

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

                  </div>
                  <!--/.text-wrap-->
                </div>
                <!--/.col-2-->
              </div>
              <!--/.row-->

            </a>

          </li>

        <?php endwhile; ?>
      <?php endif; ?>

    </ul>

    <?php wp_reset_postdata(); ?>

    <div class="fadein btt">
      <a href="<?php echo home_url(); ?>/openhouse/" class="link-btn01">一覧を見る</a>
    </div>
    <!--/.fadein-->
  </div>
  <!--/.container940-->
</section>

<section class="blog-section bg_wh bg_wh01">
  <div class="container1040">
    <h2 class="heading_line01 fadein btt">
      <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/icon_blog.svg" alt="アイコン" class="heading-icon icon_blog">

      <span>ブログ</span>
    </h2>

    <ul class="post-list">

      <?php
      $args = array(
        'posts_per_page' => 3,
      );
      $posts = get_posts($args);
      foreach ($posts as $post) :
        setup_postdata($post);
      ?>

        <li class="fadein btt">

          <a class="box" href="<?php the_permalink() ?>">

            <div class="img-wrap">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/library/images/common/no-img.png" alt="フラワーホーム">
              <?php endif; ?>
            </div>
            <!--/.img-wrap-->

            <div class="text-wrap">

              <p class="post-date">
                <?php the_time('Y.m.d'); ?>
              </p>

              <h3 class="ttl">
                <?php
                if (mb_strlen($post->post_title, 'UTF-8') > 28) {
                  $title = mb_substr($post->post_title, 0, 28, 'UTF-8');
                  echo $title . '…';
                } else {
                  echo $post->post_title;
                }
                ?>
              </h3>

            </div>
            <!--/.text-wrap-->

          </a>

        </li>

      <?php
      endforeach;
      wp_reset_postdata();
      ?>

    </ul>

    <div class="fadein btt">
      <a href="<?php echo home_url(); ?>/news/" class="link-btn01">一覧を見る</a>
    </div>
    <!--/.fadein-->
  </div>
  <!--/.container1040-->
</section>

<section class="cta-section01 fadein btt">
  <div class="inner">
    <div class="container600">
      <a href="<?php echo home_url(); ?>/contact/" class="link-btn01">まずはお気軽にお問い合わせ</a>
    </div>
    <!--/.container600-->
  </div>
  <!--/.inner-->
</section>

<?php get_footer(); ?>
