<?php
require_once('library/flowerhome.php');

function flowerhome_ahoy()
{

  add_editor_style(get_stylesheet_directory_uri() . '/library/css/editor-style.css');

  load_theme_textdomain('flowerhometheme', get_template_directory() . '/library/translation');

  add_action('init', 'flowerhome_head_cleanup');

  add_filter('wp_title', 'rw_title', 10, 3);

  add_filter('the_generator', 'flowerhome_rss_version');

  add_filter('wp_head', 'flowerhome_remove_wp_widget_recent_comments_style', 1);

  add_action('wp_head', 'flowerhome_remove_recent_comments_style', 1);

  add_filter('gallery_style', 'flowerhome_gallery_style');


  add_action('wp_enqueue_scripts', 'flowerhome_scripts_and_styles', 999);



  flowerhome_theme_support();

  add_action('widgets_init', 'flowerhome_register_sidebars');

  add_filter('the_content', 'flowerhome_filter_ptags_on_images');

  add_filter('excerpt_more', 'flowerhome_excerpt_more');
}

add_action('after_setup_theme', 'flowerhome_ahoy');


/************* OEMBED SIZE OPTIONS *************/

if (!isset($content_width)) {
  $content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size('flowerhome-thumb-600', 600, 150, true);
add_image_size('flowerhome-thumb-300', 300, 100, true);

add_filter('image_size_names_choose', 'flowerhome_custom_image_sizes');

function flowerhome_custom_image_sizes($sizes)
{
  return array_merge($sizes, array(
    'flowerhome-thumb-600' => __('600px by 150px'),
    'flowerhome-thumb-300' => __('300px by 100px'),
  ));
}

/************* THEME CUSTOMIZE *********************/

function flowerhome_theme_customizer($wp_customize)
{
}

add_action('customize_register', 'flowerhome_theme_customizer');

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function flowerhome_register_sidebars()
{
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __('Sidebar 1', 'flowerhometheme'),
    'description' => __('The first (primary) sidebar.', 'flowerhometheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
}


/************* COMMENT LAYOUT *********************/

// Comment Layout
function flowerhome_comments($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article class="cf">
      <header class="comment-author vcard">
        <?php
        $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />

        <?php printf(__('<cite class="fn">%1$s</cite> %2$s', 'flowerhometheme'), get_comment_author_link(), edit_comment_link(__('(Edit)', 'flowerhometheme'), '  ', '')) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php comment_time(__('F jS, Y', 'flowerhometheme')); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e('Your comment is awaiting moderation.', 'flowerhometheme') ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>

    <?php
  }

  function flowerhome_fonts()
  {
    wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  }

  add_action('wp_enqueue_scripts', 'flowerhome_fonts');

  //CSSを自動更新
  function theme_name_scripts()
  {
    wp_enqueue_style('flowerhome-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css?' . date('YmdHi'), array());
  }
  add_action('wp_enqueue_scripts', 'theme_name_scripts');

  //グローバルナビでメニュー項目の概要を表示できるようにする
  function prefix_nav_description($item_output, $item, $depth, $args)
  {
    if (!empty($item->description)) {
      $item_output = str_replace('">' . $args->link_before . $item->title, '">' . $args->link_before . '<strong>' . $item->title . '</strong>' . '<span class="menu-item-description">' . $item->description . '</span>', $item_output);
    }
    return $item_output;
  }
  add_filter('walker_nav_menu_start_el', 'prefix_nav_description', 10, 4);

  //特定プラグインの更新通知を非表示
  add_filter('site_option__site_transient_update_plugins', 'MyPlugin_hide_update_notice');
  function MyPlugin_hide_update_notice($data)
  {
    $plugin_name = 'advanced-custom-fields-pro/acf.php';
    if (isset($data->response[$plugin_name])) {
      unset($data->response[$plugin_name]);
    }
    return $data;
  }

  // 固定ページでbodyにスラッグ名のクラスを付与
  add_filter('body_class', 'add_page_slug_class_name');
  function add_page_slug_class_name($classes)
  {
    if (is_page()) {
      $page = get_post(get_the_ID());
      $classes[] = $page->post_name;
    }
    return $classes;
  }

  //固定ページでビジュアルエディタを利用できないようにする
  function disable_visual_editor_in_page()
  {
    global $typenow;
    if ($typenow == 'page') add_filter('user_can_richedit', 'disable_visual_editor_filter');
  }
  function disable_visual_editor_filter()
  {
    return false;
  }
  add_action('load-post.php', 'disable_visual_editor_in_page');
  add_action('load-post-new.php', 'disable_visual_editor_in_page');

  // 固定ページのみ自動整形機能を無効化
  function disable_page_wpautop()
  {
    if (is_page()) remove_filter('the_content', 'wpautop');
  }
  add_action('wp', 'disable_page_wpautop');

  // パンくずリストを生成
  if (!function_exists('custom_breadcrumb')) {
    function custom_breadcrumb()
    {

      // トップページでは何も出力しないように
      if (is_front_page()) return false;

      //そのページのWPオブジェクトを取得
      $wp_obj = get_queried_object();

      echo '<div id="breadcrumb">';

      echo '<div class="container1040">' .  //id名などは任意で
        '<ul>' .
        '<li>' .
        '<a href="' . esc_url(home_url()) . '"><span>HOME</span></a>' .
        '</li>';

      if (is_attachment()) {

        /**
         * 添付ファイルページ ( $wp_obj : WP_Post )
         * ※ 添付ファイルページでは is_single() も true になるので先に分岐
         */
        $post_title = apply_filters('the_title', $wp_obj->post_title);
        echo '<li><span>' . esc_html($post_title) . '</span></li>';
      } elseif (is_single()) {

        /**
         * 投稿ページ ( $wp_obj : WP_Post )
         */
        $post_id    = $wp_obj->ID;
        $post_type  = $wp_obj->post_type;
        $post_title = apply_filters('the_title', $wp_obj->post_title);

        // カスタム投稿タイプかどうか
        if ($post_type !== 'post') {

          $the_tax = "";  //そのサイトに合わせて投稿タイプごとに分岐させて明示的に指定してもよい

          // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
          $tax_array = get_object_taxonomies($post_type, 'names');
          foreach ($tax_array as $tax_name) {
            if ($tax_name !== 'post_format') {
              $the_tax = $tax_name;
              break;
            }
          }

          $post_type_link = esc_url(get_post_type_archive_link($post_type));
          $post_type_label = esc_html(get_post_type_object($post_type)->label);

          //カスタム投稿タイプ名の表示
          echo '<li>' .
            '<a href="' . $post_type_link . '">' .
            '<span>' . $post_type_label . '</span>' .
            '</a>' .
            '</li>';
        } else {

          $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示

        }

        // 投稿に紐づくタームを全て取得
        $terms = get_the_terms($post_id, $the_tax);

        // タクソノミーが紐づいていれば表示
        if ($terms !== false) {

          $child_terms  = array();  // 子を持たないタームだけを集める配列
          $parents_list = array();  // 子を持つタームだけを集める配列

          //全タームの親IDを取得
          foreach ($terms as $term) {
            if ($term->parent !== 0) {
              $parents_list[] = $term->parent;
            }
          }

          //親リストに含まれないタームのみ取得
          foreach ($terms as $term) {
            if (!in_array($term->term_id, $parents_list)) {
              $child_terms[] = $term;
            }
          }

          // 最下層のターム配列から一つだけ取得
          $term = $child_terms[0];

          if ($term->parent !== 0) {

            // 親タームのIDリストを取得
            $parent_array = array_reverse(get_ancestors($term->term_id, $the_tax));

            foreach ($parent_array as $parent_id) {
              $parent_term = get_term($parent_id, $the_tax);
              $parent_link = esc_url(get_term_link($parent_id, $the_tax));
              $parent_name = esc_html($parent_term->name);
              echo '<li>' .
                '<a href="' . $parent_link . '">' .
                '<span>' . $parent_name . '</span>' .
                '</a>' .
                '</li>';
            }
          }

          $term_link = esc_url(get_term_link($term->term_id, $the_tax));
          $term_name = esc_html($term->name);
          // 最下層のタームを表示
          echo '<li>' .
            '<a href="' . $term_link . '">' .
            '<span>' . $term_name . '</span>' .
            '</a>' .
            '</li>';
        }

        // 投稿自身の表示
        echo '<li><span>' . esc_html(strip_tags($post_title)) . '</span></li>';
      } elseif (is_page() || is_home()) {

        /**
         * 固定ページ ( $wp_obj : WP_Post )
         */
        $page_id    = $wp_obj->ID;
        $page_title = apply_filters('the_title', $wp_obj->post_title);

        // 親ページがあれば順番に表示
        if ($wp_obj->post_parent !== 0) {
          $parent_array = array_reverse(get_post_ancestors($page_id));
          foreach ($parent_array as $parent_id) {
            $parent_link = esc_url(get_permalink($parent_id));
            $parent_name = esc_html(get_the_title($parent_id));
            echo '<li>' .
              '<a href="' . $parent_link . '">' .
              '<span>' . $parent_name . '</span>' .
              '</a>' .
              '</li>';
          }
        }
        // 投稿自身の表示
        echo '<li><span>' . esc_html(strip_tags($page_title)) . '</span></li>';
      } elseif (is_post_type_archive()) {

        /**
         * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
         */
        echo '<li><span>' . esc_html($wp_obj->label) . '</span></li>';
      } elseif (is_date()) {

        /**
         * 日付アーカイブ ( $wp_obj : null )
         */
        $year  = get_query_var('year');
        $month = get_query_var('monthnum');
        $day   = get_query_var('day');

        if ($day !== 0) {
          //日別アーカイブ
          echo '<li>' .
            '<a href="' . esc_url(get_year_link($year)) . '"><span>' . esc_html($year) . '年</span></a>' .
            '</li>' .
            '<li>' .
            '<a href="' . esc_url(get_month_link($year, $month)) . '"><span>' . esc_html($month) . '月</span></a>' .
            '</li>' .
            '<li>' .
            '<span>' . esc_html($day) . '日</span>' .
            '</li>';
        } elseif ($month !== 0) {
          //月別アーカイブ
          echo '<li>' .
            '<a href="' . esc_url(get_year_link($year)) . '"><span>' . esc_html($year) . '年</span></a>' .
            '</li>' .
            '<li>' .
            '<span>' . esc_html($month) . '月</span>' .
            '</li>';
        } else {
          //年別アーカイブ
          echo '<li><span>' . esc_html($year) . '年</span></li>';
        }
      } elseif (is_author()) {

        /**
         * 投稿者アーカイブ ( $wp_obj : WP_User )
         */
        echo '<li><span>' . esc_html($wp_obj->display_name) . ' の執筆記事</span></li>';
      } elseif (is_archive()) {

        /**
         * タームアーカイブ ( $wp_obj : WP_Term )
         */
        $term_id   = $wp_obj->term_id;
        $term_name = $wp_obj->name;
        $tax_name  = $wp_obj->taxonomy;

        /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */

        // 親ページがあれば順番に表示
        if ($wp_obj->parent !== 0) {

          $parent_array = array_reverse(get_ancestors($term_id, $tax_name));
          foreach ($parent_array as $parent_id) {
            $parent_term = get_term($parent_id, $tax_name);
            $parent_link = esc_url(get_term_link($parent_id, $tax_name));
            $parent_name = esc_html($parent_term->name);
            echo '<li>' .
              '<a href="' . $parent_link . '">' .
              '<span>' . $parent_name . '</span>' .
              '</a>' .
              '</li>';
          }
        }

        // ターム自身の表示
        echo '<li>' .
          '<span>' . esc_html($term_name) . '</span>' .
          '</li>';
      } elseif (is_search()) {

        /**
         * 検索結果ページ
         */
        echo '<li><span>「' . esc_html(get_search_query()) . '」で検索した結果</span></li>';
      } elseif (is_404()) {

        /**
         * 404ページ
         */
        echo '<li><span>お探しの記事は見つかりませんでした。</span></li>';
      } else {

        /**
         * その他のページ（無いと思うけど一応）
         */
        echo '<li><span>' . esc_html(get_the_title()) . '</span></li>';
      }

      echo '</ul>';  // 冒頭に合わせた閉じタグ
      echo '</div></div>';  // 冒頭に合わせた閉じタグ

    }
  }

  // カスタム投稿タイプ「物件一覧」を追加する
  function create_post_type_property()
  {
    $Supports = [
      'title', 'editor', 'thumbnail'
    ];
    register_post_type(
      'property',
      array(
        'label' => '物件一覧',
        'labels' => array(
          'all_items' => '物件一覧',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'show_in_rest' => true,
        'supports' => $Supports
      )
    );

    register_taxonomy(
      'property_cat',
      'property',
      array(
        'label' => __('カテゴリー'),
        'singular_label' => 'カテゴリー',
        'rewrite' => array('slug' => 'property_cat'),
        'labels' => array(
          'all_items' => 'カテゴリー一覧',
          'add_new_item' => 'カテゴリーを追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true
      )
    );

    register_taxonomy(
      'property_area',
      'property',
      array(
        'label' => __('エリア'),
        'singular_label' => 'エリア',
        'rewrite' => array('slug' => 'property_area'),
        'labels' => array(
          'all_items' => 'エリア一覧',
          'add_new_item' => 'エリアを追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true
      )
    );

    register_taxonomy(
      'property_municipalities',
      'property',
      array(
        'label' => __('市区町村'),
        'singular_label' => '市区町村',
        'rewrite' => array('slug' => 'property_municipalities'),
        'labels' => array(
          'all_items' => '市区町村一覧',
          'add_new_item' => '市区町村を追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true
      )
    );

    register_taxonomy(
      'property_payment',
      'property',
      array(
        'label' => __('月々の支払い'),
        'singular_label' => '月々の支払い',
        'rewrite' => array('slug' => 'property_payment'),
        'labels' => array(
          'all_items' => '月々の支払い一覧',
          'add_new_item' => '月々の支払いを追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true
      )
    );

    register_taxonomy(
      'property_bukken',
      'property',
      array(
        'label' => __('物件詳細フラグ'),
        'singular_label' => '物件詳細フラグ',
        'rewrite' => array('slug' => 'property_bukken'),
        'labels' => array(
          'all_items' => '物件詳細フラグ一覧',
          'add_new_item' => '物件詳細フラグを追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true
      )
    );

    //「販売終了」の物件をメインループから除外
    add_action('pre_get_posts', 'my_pre_get_posts');
    function my_pre_get_posts($query)
    {
      if (is_admin() || !$query->is_main_query()) return;
      if ($query->is_post_type_archive('property')) {
        $tax_query = array(
          array(
            'taxonomy' => 'property_bukken',
            'terms' => array('jissekitax'),
            'field' => 'slug',
            'operator' => 'NOT IN',
          )
        );
        $query->set('tax_query', $tax_query);
      } elseif ($query->is_tax('property_area')) {
        $tax_query = array(
          array(
            'taxonomy' => 'property_bukken',
            'terms' => array('jissekitax'),
            'field' => 'slug',
            'operator' => 'NOT IN',
          )
        );
        $query->set('tax_query', $tax_query);
      }
    }

    register_taxonomy(
      'property_opdate',
      'property',
      array(
        'label' => __('オープンハウス日程'),
        'singular_label' => 'オープンハウス日程',
        'rewrite' => array('slug' => 'property_opdate'),
        'labels' => array(
          'all_items' => '日程一覧',
          'add_new_item' => '日程を追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true
      )
    );
  }
  add_action('init', 'create_post_type_property');

  // カスタム投稿タイプ「お客様の声」を追加する
  function create_post_type_voice()
  {
    $Supports = [
      'title', 'editor', 'thumbnail'
    ];
    register_post_type(
      'voice',
      array(
        'label' => 'お客様の声',
        'labels' => array(
          'all_items' => 'お客様の声一覧',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 6,
        'show_in_rest' => true,
        'supports' => $Supports
      )
    );

    register_taxonomy(
      'voice_cat',
      'voice',
      array(
        'label' => __('お客様の声のカテゴリー'),
        'singular_label' => 'お客様の声のカテゴリー',
        'rewrite' => array('slug' => 'voice_cat'),
        'labels' => array(
          'all_items' => 'お客様の声のカテゴリー一覧',
          'add_new_item' => 'お客様の声のカテゴリーを追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true
      )
    );
  }
  add_action('init', 'create_post_type_voice');

  //問い合わせフォーム用 物件名セレクトボックス
  function dynamic_field_values($tag, $unused)
  {

    if ($tag['name'] != 'property1')
      return $tag;

    $args = array(
      'numberposts'   => -1,
      'post_type'     => 'property',
      'orderby'       => 'menu_order',
      'order'         => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'property_bukken',
          'field' => 'slug',
          'terms' => array('jissekitax', 'contracted'),
          'operator' => 'NOT IN',
        ),
      ),
    );

    $custom_posts = get_posts($args);

    if (!$custom_posts)
      return $tag;

    foreach ($custom_posts as $custom_post) {

      $tag['raw_values'][] = $custom_post->post_title;
      $tag['values'][] = $custom_post->post_title;
      $tag['labels'][] = $custom_post->post_title;
    }

    return $tag;
  }

  add_filter('wpcf7_form_tag', 'dynamic_field_values', 10, 2);

  // WP Number of Results
  function _wnr_tax_query_custom($wpq_param_arr)
  {
    if (!isset($wpq_param_arr['post_type'], $wpq_param_arr['tax_query'])) {
      return $wpq_param_arr;
    }
    // propertyのみ
    if ($wpq_param_arr['post_type'] !== 'property') {
      return $wpq_param_arr;
    }

    $tax_query = $wpq_param_arr['tax_query'];
    if (!is_array($tax_query)) {
      return $wpq_param_arr;
    }
    foreach ($tax_query as $key => $value) {
      if ($key === 'relation' || !is_array($value)) {
        continue;
      }

      if (isset($value['terms'])) {
        if (empty($value['terms']) && (!isset($value['operator']) || $value['operator'] === 'IN')) {
          unset($tax_query[$key]);
          continue;
        }

        // WNR 複数選択への対応
        if (is_string($value['terms'])) {
          $tax_query[$key]['terms'] = explode(",", $value['terms']);
        }
      } else {
        if (is_array($value)) {
          foreach ($value as $sub_key => $sub_value) {
            if (!is_array($sub_value)) {
              continue;
            }
            if (isset($sub_value['terms'])) {
              if (empty($sub_value['terms']) && (!isset($sub_value['operator']) || $sub_value['operator'] === 'IN')) {
                unset($tax_query[$key][$sub_key]);
                continue;
              }

              // WNR 複数選択への対応
              if (is_string($sub_value['terms'])) {
                $tax_query[$key][$sub_key]['terms'] = explode(",", $sub_value['terms']);
              }
            }
          }
          if (isset($tax_query[$key]['relation']) && count($tax_query[$key]) === 1) {
            unset($tax_query[$key]);
            continue;
          }
        }
      }
    }
    $wpq_param_arr['tax_query'] = $tax_query;

    return $wpq_param_arr;
  }
  add_filter('wp_number_of_results_query', '_wnr_tax_query_custom');

  //管理画面にソート機能を設置
  function my_add_filter1()
  {
    global $post_type;
    if ('property' == $post_type) {
    ?>
      <select name="property_cat">
        <option value="">種別一覧</option>

        <?php
        $terms = get_terms('property_cat');
        foreach ($terms as $term) { ?>
          <option value="<?php echo $term->slug; ?>" <?php if ($_GET['property_cat'] == $term->slug) {
                                                        print 'selected';
                                                      } ?>><?php echo $term->name; ?></option>

        <?php
        }
        ?>
      </select>
    <?php
    }
  }
  add_action('restrict_manage_posts', 'my_add_filter1');

  function my_add_filter2()
  {
    global $post_type;
    if ('property' == $post_type) {
    ?>
      <select name="property_bukken">
        <option value="">物件詳細</option>

        <?php
        $terms = get_terms('property_bukken');
        foreach ($terms as $term) { ?>
          <option value="<?php echo $term->slug; ?>" <?php if ($_GET['property_bukken'] == $term->slug) {
                                                        print 'selected';
                                                      } ?>><?php echo $term->name; ?></option>

        <?php
        }
        ?>
      </select>
    <?php
    }
  }
  add_action('restrict_manage_posts', 'my_add_filter2');

  function my_add_filter3()
  {
    global $post_type;
    if ('property' == $post_type) {
    ?>
      <select name="property_area">
        <option value="">エリア</option>

        <?php
        $terms = get_terms('property_area');
        foreach ($terms as $term) { ?>
          <option value="<?php echo $term->slug; ?>" <?php if ($_GET['property_area'] == $term->slug) {
                                                        print 'selected';
                                                      } ?>><?php echo $term->name; ?></option>

        <?php
        }
        ?>
      </select>
  <?php
    }
  }
  add_action('restrict_manage_posts', 'my_add_filter3');

  /* DON'T DELETE THIS CLOSING TAG */ ?>
